<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Events\SubmitRequestMail;
use App\Exports\WorkOrdersExport;
use App\Http\Requests\WorkOrderStore;
use App\Http\Requests\WorkOrderUpdate;
use App\Notification;
use App\StatusWorkOrder;
use App\WorkOrder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkOrderController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $per_page = $request->per_page ?? 10;

        if (\auth()->user()->hasRole('user')) {
            $request->request->add(['user_id' => auth()->user()->id]);
        }

        $workOrders = ($this->findAll($request))->paginate($per_page);
        return view('pages.work_orders.index', \compact('workOrders', 'notifications'));
    }

    public function findOne($request)
    {
        $workOrder = WorkOrder::select();
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->filled($key)) {
                $workOrder = $workOrder->where([$key => $value]);
            }
        }
        return $workOrder->first();
    }

    public function findAll($request)
    {
        $workOrders = WorkOrder::select();
        foreach ($request->input() as $key => $value) {
            if ($request->filled($key)) {
                $workOrders = $workOrders->where([$key => $value]);
            }
        }
        return $workOrders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.work_orders.create', \compact('categories', 'notifications'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkOrderStore $request)
    {
        $validated = $request->validated();

        try {
            $status = StatusWorkOrder::where(['name' => 'Draft'])->first();
            $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['status_id' => $status->id]);

            $workOrder = WorkOrder::create($request->all());

            //Memanggil Event ModelWasCreated
            event(new ModelWasCreated($workOrder, 'The request work order just added'));

            if ($request->hasfile('files')) {
                $validator = Validator::make($request->all(), [
                    'files' => 'required',
                    'files.*' => 'mimes:png,jpeg,jpg,pdf']);

                if (count($request->file('files')) > 3) {
                    redirect()->back()->withErrors(['erros' => ['File not allow more than 3 files!']]);
                }

                foreach ($request->file('files') as $file) {
                    $name = Str::random(40) . '.' . $file->extension();
                    $path = date('Y/m/d/') . $name;
                    Storage::disk('local')->putFileAs('files', new File($file), $path);
                    $workOrder->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
                }
            }

            return redirect()->route('work-order.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        if (!$workOrder) {
            return \abort(404);
        }

        if (auth()->user()->hasRole('user')) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $statusWorkOrders = StatusWorkOrder::all();

        return view('pages.work_orders.detail', compact('workOrder', 'statusWorkOrders', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        if (!auth()->user()->can('edit work orders')) {
            return \abort(403);
        }

        if (!$workOrder) {
            return \abort(404);
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $statusWorkOrders = StatusWorkOrder::all();

        return \view('pages.work_orders.edit', compact('workOrder', 'statusWorkOrders', 'categories', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(WorkOrderUpdate $request, WorkOrder $workOrder)
    {
        if (!auth()->user()->can('edit work orders')) {
            return \abort(403);
        }

        if (!$workOrder) {
            return \abort(404);
        }

        if ($request->hasfile('files')) {
            foreach ($workOrder->files as $tmp) {
                Storage::delete('files/' . $tmp->path);
                $workOrder->files()->where(['id' => $tmp->id])->delete();
            }
            $validator = Validator::make($request->all(), [
                'files' => 'required',
                'files.*' => 'mimes:png,jpeg,jpg,pdf']);

            if (count($request->file('files')) > 3) {
                redirect()->back()->withErrors(['erros' => ['File not allow more than 3 files!']]);
            }

            foreach ($request->file('files') as $file) {
                $name = Str::random(40) . '.' . $file->extension();
                $path = date('Y/m/d/') . $name;
                Storage::disk('local')->putFileAs('files', new File($file), $path);
                $workOrder->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
            }
        }

        try {
            $status = StatusWorkOrder::where(['id' => $request->status_id])->first();
            if ($workOrder->status_id !== $status->id) {
                if ($status->name === 'Open' || $status->name === 'open' || $status->name === 'Closed' || $status->name === 'closed') {
                    $workOrder->update($request->input());
                    $workOrder->url = route('work-order.update', $workOrder->id);
                    event(new SubmitRequestMail($workOrder, 'The request work order change status to '.$status->name));
                }
                event(new ModelWasUpdated($workOrder, 'The request work order change status to '.$status->name));
            } else {
                //Memanggil Event ModelWasUpdated
                event(new ModelWasUpdated($workOrder, 'The request work order just updated'));
                $workOrder->update($request->input());
            }
            $workOrder->update($request->input());
            return redirect()->route('work-order.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        if (!auth()->user()->can('delete work orders')) {
            return \abort(403);
        }

        if (!$workOrder) {
            return \abort(404);
        }

        try {
            //Memanggil Event ModelWasDeleted
            event(new ModelWasDeleted($workOrder, 'The request work order just deleted'));

            $workOrder->delete();
            return redirect()->route('work-order.index')->with('success', 'Delete Successfully');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $workOrders = ($this->findAll($request))->get();
        return Excel::download(new WorkOrdersExport($workOrders), 'work_orders.xlsx');
    }

    public function open(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $request->request->add(['id' => $workOrder->id]);
        $workOrder = $this->findOne($request);

        $status = StatusWorkOrder::where(['name' => 'Open'])->orWhere(['name' => 'open'])->first();
        if (auth()->user()->hasRole('user')) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        if ($workOrder->status->name === 'Draft' || $workOrder->status->name === 'draft') {
            $workOrder->status_id = $status->id;
            $workOrder->save();

            event(new ModelWasUpdated($workOrder, 'The request work order change status to '.$status->name));
            $workOrder->url = route('work-order.update', $workOrder->id);
            event(new SubmitRequestMail($workOrder, 'The request work order change status to '.$status->name));
        }

        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }
}
