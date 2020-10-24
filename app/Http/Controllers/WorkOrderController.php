<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Events\SendNotification;
use App\Events\SubmitRequestMail;
use App\Exports\WorkOrdersExport;
use App\Http\Requests\WorkOrderStore;
use App\Http\Requests\WorkOrderUpdate;
use App\Notification;
use App\StatusWorkOrder;
use App\WorkOrder;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class WorkOrderController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $per_page = $request->per_page ?? 10;

        $data = $this->findAll($request);
        $data = $request->filled('search') ? $this->search($request, $data) : $data;
        $workOrders = $data->paginate($per_page);
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
        if (\auth()->user()->hasRole('user')) {
            $request->request->add(['user_id' => auth()->user()->id]);
        }

        $workOrders = WorkOrder::select();
        foreach ($request->except(['search', '_method', '_token']) as $key => $value) {
            if ($request->filled($key)) {
                $workOrders = $workOrders->orWhere([$key => $value]);
            }
        }
        return $workOrders;
    }

    public function search($request, $data)
    {
        $workOrders = $data;
        $workOrders = $request->user_id ? $workOrders->where(['user_id' => $request->user_id]) : $workOrders;
        foreach (['code', 'title', 'description', 'location', 'pic_name', 'operator', 'worked_at'] as $key) {
            $workOrders = $workOrders->orWhere($key, 'like', '%' . $request->search . '%');
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
            $workOrder->update(['code' => 'WO/' . $workOrder->id . date('/Y/m/d')]);

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

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $statusWorkOrders = StatusWorkOrder::all();
        $progress = $workOrder->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $workOrder->attachments()->where(['status_type' => 'Closed'])->get();
        return view('pages.work_orders.detail', compact('workOrder', 'statusWorkOrders', 'notifications', 'progress', 'closed'));
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

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($workOrder->status->name != 'Draft') {
                return abort(403);
            }
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $statusWorkOrders = StatusWorkOrder::all();
        $progress = $workOrder->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $workOrder->attachments()->where(['status_type' => 'Closed'])->get();

        return \view('pages.work_orders.edit', compact('progress', 'closed', 'workOrder', 'statusWorkOrders', 'categories', 'notifications'));
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
            //Memanggil Event ModelWasUpdated
            event(new ModelWasUpdated($workOrder, 'The request work order just updated'));
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

    public function draft(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $status = StatusWorkOrder::where(['name' => 'Draft'])->orWhere(['name' => 'draft'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $workOrder->status_id = $status->id;
        $workOrder->save();

        event(new ModelWasUpdated($workOrder, 'The request work order change status to ' . $status->name));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function open(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $status = StatusWorkOrder::where(['name' => 'Open'])->orWhere(['name' => 'open'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $workOrder->status_id = $status->id;
        $workOrder->save();

        event(new ModelWasUpdated($workOrder, 'The request work order change status to ' . $status->name));
        $workOrder->url = route('work-order.update', $workOrder->id);
        event(new SubmitRequestMail($workOrder, 'The request work order change status to ' . $status->name));
        event(new SendNotification($workOrder));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function approved(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $status = StatusWorkOrder::where(['name' => 'Approved'])->orWhere(['name' => 'approved'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($workOrder->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $workOrder->status_id = $status->id;
        $workOrder->operator = $request->operator;
        $workOrder->worked_at = strtotime($request->worked_at);
        $workOrder->save();

        event(new ModelWasUpdated($workOrder, 'The request work order change status to ' . $status->name));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function on_progress(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $status = StatusWorkOrder::where(['name' => 'On Progress'])->orWhere(['name' => 'on progress'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        $workOrder->status_id = $status->id;
        $workOrder->save();

        event(new ModelWasUpdated($workOrder, 'The request work order change status to ' . $status->name));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function attachmentProgress(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $workOrder->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path, 'status_type' => 'On Progress']);
        }

        event(new ModelWasUpdated($workOrder, 'The attachment work order On Progress'));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function closed(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);
        $status = StatusWorkOrder::where(['name' => 'Closed'])->orWhere(['name' => 'closed'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        $workOrder->status_id = $status->id;
        $workOrder->save();

        event(new ModelWasUpdated($workOrder, 'The request work order change status to ' . $status->name));
        $workOrder->url = route('work-order.update', $workOrder->id);
        event(new SubmitRequestMail($workOrder, 'The request work order change status to ' . $status->name));
        event(new SendNotification($workOrder));

        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }

    public function attachmentClosed(Request $request, $id)
    {
        $workOrder = WorkOrder::find($id);

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $workOrder->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path, 'status_type' => 'Closed']);
        }

        event(new ModelWasUpdated($workOrder, 'The attachment work order Closed'));
        return redirect()->route('work-order.index')->with('success', 'Update Successfully');
    }
}
