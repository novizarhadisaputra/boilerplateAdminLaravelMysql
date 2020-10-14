<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStore;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        $permissions = Permission::paginate($per_page);

        return view('pages.permissions.index', \compact('permissions', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::all();

        return view('pages.permissions.create', 'notifications');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $request->merge(['guard_name' => 'web']);
        try {
            $permission = Permission::create($request->all());
            return redirect()->route('permissions.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (!$permission) {
            return \abort(404);
        }

        $notifications = Notification::all();

        return \view('pages.permissions.edit', compact('permission', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if (!$permission) {
            return \abort(404);
        }
        $validator = [];
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->input($key) != $permission[$key]) {
                $validator[$key] = 'required|unique:permissions';
            }
        }
        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $permission->update($request->input());
            return redirect()->route('permissions.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (!$permission) {
            return \abort(404);
        }
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Delete Successfully');
    }
}
