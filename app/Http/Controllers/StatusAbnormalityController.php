<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusAbnormalityStore;
use App\Notification;
use App\StatusAbnormality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusAbnormalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        $per_page = $request->per_page ?? 10;
        $status_abnormality = StatusAbnormality::paginate($per_page);

        return view('pages.status_abnormality.index', \compact('status_abnormality', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::all();

        return view('pages.status_abnormality.create', \compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusAbnormalityStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        try {
            $status_abnormality = StatusAbnormality::create($request->all());
            return redirect()->route('status-abnormality.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  StatusAbnormality $status_abnormality
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAbnormality $status_abnormality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  StatusAbnormality $status_abnormality
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAbnormality $status_abnormality)
    {
        if (!$status_abnormality) {
            return \abort(404);
        }

        $notifications = Notification::all();

        return \view('pages.status_abnormality.edit', compact('status_abnormality', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  StatusAbnormality $status_abnormality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusAbnormality $status_abnormality)
    {
        if (!$status_abnormality) {
            return \abort(404);
        }
        $validator = [];
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->input($key) != $status_abnormality[$key]) {
                $validator[$key] = 'required|unique:status_abnormalities';
            }
        }
        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $status_abnormality->update($request->input());
            return redirect()->route('status-abnormality.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  StatusAbnormality $status_abnormality
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAbnormality $status_abnormality)
    {
        if (!$status_abnormality) {
            return \abort(404);
        }
        $status_abnormality->delete();
        return redirect()->route('status-abnormality.index')->with('success', 'Delete Successfully');
    }
}
