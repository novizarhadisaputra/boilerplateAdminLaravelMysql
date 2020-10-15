<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusWorkOrderStore;
use App\Notification;
use App\StatusWorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusWorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $per_page = $request->per_page ?? 10;
        $status_work_order = StatusWorkOrder::paginate($per_page);

        return view('pages.status_work_order.index', \compact('status_work_order', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.status_work_order.create', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusWorkOrderStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        try {
            $status_work_order = StatusWorkOrder::create($request->all());
            return redirect()->route('status-work-order.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  StatusWorkOrder $status_work_order
     * @return \Illuminate\Http\Response
     */
    public function show(StatusWorkOrder $status_work_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  StatusWorkOrder $status_work_order
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusWorkOrder $status_work_order)
    {
        if (!$status_work_order) {
            return \abort(404);
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return \view('pages.status_work_order.edit', compact('status_work_order', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  StatusWorkOrder $status_work_order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusWorkOrder $status_work_order)
    {
        if (!$status_work_order) {
            return \abort(404);
        }
        $validator = [];
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->input($key) != $status_work_order[$key]) {
                $validator[$key] = 'required|unique:status_work_orders';
            }
        }
        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $status_work_order->update($request->input());
            return redirect()->route('status-work-order.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  StatusWorkOrder $status_work_order
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusWorkOrder $status_work_order)
    {
        if (!$status_work_order) {
            return \abort(404);
        }
        $status_work_order->delete();
        return redirect()->route('status-work-order.index')->with('success', 'Delete Successfully');
    }
}
