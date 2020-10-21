<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\SectionStore;
use App\Notification;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
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
        $sections = Section::with('department')->paginate($per_page);

        return view('pages.sections.index', \compact('sections', 'notifications'));
    }

    public function findAll(Request $request)
    {
        $sections = Section::select();
        foreach ($request as $key => $value) {
            if ($request->filled($key)) {
                $sections->where([$key => $value]);
            }
        }
        return $sections->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $departments = Department::all();

        return view('pages.sections.create', compact('departments', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionStore $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        try {
            $role = Section::create($request->all());
            return redirect()->route('sections.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        if (!$section) {
            return \abort(404);
        }
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $departments = Department::all();

        return \view('pages.sections.edit', compact('section', 'departments', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        if (!$section) {
            return \abort(404);
        }
        $validator = [];
        foreach ($request->except(['_token', '_method', 'department_id']) as $key => $value) {
            if ($request->input($key) != $section[$key]) {
                $validator[$key] = 'required|unique:sections';
            }
        }
        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $section->update($request->input());
            return redirect()->route('sections.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if (!$section) {
            return \abort(404);
        }
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Delete Successfully');
    }
}
