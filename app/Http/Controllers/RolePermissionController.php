<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolePermissionStore;
use App\Notification;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->title = 'Management Roles and Permissions';
    }

    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        if(!auth()->user()->hasPermissionTo('management menu')) {
            abort(403);
        }

        $per_page = $request->per_page ?? 10;
        $roles = Role::with('permissions')->paginate($per_page);

        return view('pages.roles_and_permissions.index', \compact('roles', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.roles_and_permissions.create', \compact('roles', 'permissions', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        try {
            $role = Role::find($request->role);
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles-and-permissions.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        if (!$role = Role::find($id)) {
            return \abort(404);
        }
        $roles = Role::all();
        $permissions = Permission::all();

        return \view('pages.roles_and_permissions.edit', compact('role', 'roles', 'permissions', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$role = Role::find($id)) {
            return \abort(404);
        }
        try {
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles-and-permissions.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$role = Role::find($id)) {
            return \abort(404);
        }
        $role->delete();
        return redirect()->route('roles-and-permissions.index')->with('success', 'Delete Successfully');
    }
}
