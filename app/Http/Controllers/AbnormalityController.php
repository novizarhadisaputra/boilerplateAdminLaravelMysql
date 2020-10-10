<?php

namespace App\Http\Controllers;

use App\Abnormality;
use App\Department;
use App\Events\ModelWasCreated;
use App\Http\Requests\AbnormalityStore;
use App\StatusAbnormality;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AbnormalityController extends Controller
{

    public function index()
    {
        $per_page = $request->per_page ?? 10;
        $abnormalities = Abnormality::with('user')->paginate($per_page);
        return view('pages.abnormality.index', \compact('abnormalities'));
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
        return view('pages.abnormality.create', \compact('roles', 'departments'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbnormalityStore $request)
    {
        $validated = $request->validated();

        try {
            $status = StatusAbnormality::where(['name' => 'Draft'])->first();
            $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['status_id' => $status->id]);

            $abnormality = Abnormality::create($request->all());

            //Memanggil Event ModelWasCreated
            event(new ModelWasCreated($abnormality, 'The model abnormality just added a new line'));

            if ($request->hasfile('files')) {
                $validator = Validator::make($request->all(), [
                    'files' => 'required',
                    'files.*' => 'mimes:png,jpeg,jpg,pdf']);

                foreach ($request->file('files') as $file) {
                    $name = Str::random(40) . time() . '.' . $file->extension();
                    Storage::disk('local')->putFileAs('files', new File($file), $name);
                    $abnormality->files()->create(['name' => $name, 'ext' => $file->extension(), 'original' => public_path('files') . '/' . $name]);
                }
            }

            return redirect()->route('abnormality.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function show(Abnormality $abnormality)
    {
        if (!$abnormality) {
            return \abort(404);
        }
        return view('pages.abnormality.detail', compact('abnormality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function edit(Abnormality $abnormality)
    {
        if (!$abnormality) {
            return \abort(404);
        }

        $status_abnormalities = StatusAbnormality::all();
        return \view('pages.abnormality.edit', compact('abnormality', 'status_abnormalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abnormality $abnormality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abnormality $abnormality)
    {
        //
    }
}
