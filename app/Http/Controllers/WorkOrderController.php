<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Http\Requests\WorkOrderStore;
use App\StatusWorkOrder;
use App\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ?? 10;

        if (\checkRole('user')) {
            $request->request->add(['user_id' => auth()->user()->id]);
        }
        $workOrders = ($this->findAll($request))->paginate($per_page);
        return view('pages.work_orders.index', \compact('workOrders'));
    }

    public function findOne($request)
    {
        $workOrder = WorkOrder::select();
        foreach ($request as $key => $value) {
            if ($request->filled($key)) {
                $workOrder->where([$key => $value]);
            }
        }
        return $workOrder->first();
    }

    public function findAll($request)
    {
        $workOrders = WorkOrder::select();
        foreach ($request as $key => $value) {
            if ($request->filled($key)) {
                $workOrders->where([$key => $value]);
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
        return view('pages.work_orders.create', \compact('categories'));

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

        if ($workOrder->user_id !== auth()->user()->id) {
            return abort(403);
        }


        return view('pages.work_orders.detail', compact('workOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        checkPermission('edit workOrder');

        if (!$workOrder) {
            return \abort(404);
        }

        $status_abnormalities = StatusWorkOrder::all();
        return \view('pages.work_orders.edit', compact('workOrder', 'status_abnormalities'));
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
        checkPermission('delete workOrder');

        if (!$workOrder) {
            return \abort(404);
        }
        //Memanggil Event ModelWasDeleted
        event(new ModelWasDeleted($workOrder, 'The request work order just deleted'));

        $workOrder->delete();
        return redirect()->route('work-order.index')->with('success', 'Delete Successfully');
    }

    public function export(Request $request)
    {
        $workOrders = ($this->findAll($request))->get();
        return Excel::download(new AbnormalitiesExport($workOrders), 'work_orders.xlsx');
    }
}
