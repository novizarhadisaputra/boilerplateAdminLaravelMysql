<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->title = 'Management Users';
    }

    public function index()
    {
        $per_page = $request->per_page ?? 10;
        $users = User::paginate($per_page);
        return view('pages.users.index', \compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('pages.users.create', \compact('roles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        try {
            $user = User::create($request->all());
            $user->assignRole($request->roles);
            return redirect()->route('users.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('pages.users.detail', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!$user) {
            return \abort(404);
        }
        $roles = Role::all();
        $departments = Department::all();
        $sections = Section::all();
        return \view('pages.users.edit', compact('user', 'roles', 'departments', 'sections'));
    }

    public function profile($id)
    {
        if (!$user = User::find($id)) {
            return \abort(404);
        }
        $roles = Role::all();
        $departments = Department::all();
        $sections = Section::all();

        return \view('pages.users.edit', compact('user', 'roles', 'departments', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $validated = $request->validated();

        if (!$user) {
            return \abort(404);
        }

        $validator = [];
        foreach ($request->except(['_token', '_method', 'roles']) as $key => $value) {
            if ($request->input($key) != $user[$key] && $request->name != '' && Hash::check($request->password, $user->password)) {
                $validator[$key] = 'required|unique:users';
            }
        }

        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        try {
            $user->syncRoles($request->roles);
            $user->update($request->input());
            return redirect()->route('users.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return \abort(404);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Delete Successfully');
    }
}
