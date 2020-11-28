<?php

namespace App\Http\Controllers;

use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Events\SendNotification;
use App\Events\SubmitRequestMail;
use App\Exports\WorkOrdersExport;
use App\Http\Requests\SafetyPatrolStore;
use App\Notification;
use App\SafetyPatrol;
use App\SafetyPatrolCategory;
use App\StatusWorkOrder;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SafetyPatrolController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $per_page = $request->per_page ?? 10;

        $data = $this->findAll($request);
        $data = $request->filled('search') ? $this->search($request, $data) : $data;
        $safetyPatrols = $data->paginate($per_page);
        return view('pages.safety_patrol.index', \compact('safetyPatrols', 'notifications'));
    }

    public function findOne($request)
    {
        $safetyPatrol = SafetyPatrol::select();
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->filled($key)) {
                $safetyPatrol = $safetyPatrol->where([$key => $value]);
            }
        }

        return $safetyPatrol->first();
    }

    public function findAll($request)
    {
        if (!auth()->user()->hasRole(['user'])) {
            $request->request->add(['user_id' => auth()->user()->id]);
        }

        $safetyPatrols = SafetyPatrol::select();
        foreach ($request->except(['search', '_method', '_token']) as $key => $value) {
            if ($request->filled($key)) {
                $safetyPatrols = $safetyPatrols->orWhere([$key => $value]);
            }
        }
        return $safetyPatrols;
    }

    public function search($request, $data)
    {
        $safetyPatrols = $data;
        $safetyPatrols = $request->user_id ? $safetyPatrols->where(['user_id' => $request->user_id]) : $safetyPatrols;
        foreach (['code', 'title', 'description', 'location', 'pic_name', 'operator', 'worked_at'] as $key) {
            $safetyPatrols = $safetyPatrols->orWhere($key, 'like', '%' . $request->search . '%');
        }
        return $safetyPatrols;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SafetyPatrolCategory::all();
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.safety_patrol.create', \compact('categories', 'notifications'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SafetyPatrolStore $request)
    {
        $validated = $request->validated();

        try {
            $status = StatusWorkOrder::where(['name' => 'Draft'])->first();
            $request->request->add(['user_id' => auth()->user()->id]);
            $request->request->add(['status_id' => $status->id]);
            $safetyPatrol = SafetyPatrol::create($request->all());
            $safetyPatrol->update(['code' => 'SFP/' . $safetyPatrol->id . date('/Y/m/d')]);

            //Memanggil Event ModelWasCreated
            event(new ModelWasCreated($safetyPatrol, 'The request safety patrol just added'));

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
                    $safetyPatrol->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
                }
            }

            return redirect()->route('safety-patrol.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SafetyPatrol  $safetyPatrol
     * @return \Illuminate\Http\Response
     */
    public function show(SafetyPatrol $safetyPatrol)
    {
        if (!$safetyPatrol) {
            return \abort(404);
        }

        if (!auth()->user()->hasRole(['user'])) {
            if ($safetyPatrol->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $statusWorkOrders = StatusWorkOrder::all();
        $progress = $safetyPatrol->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $safetyPatrol->attachments()->where(['status_type' => 'Closed'])->get();
        return view('pages.safety_patrol.detail', compact('safetyPatrol', 'statusWorkOrders', 'notifications', 'progress', 'closed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SafetyPatrol  $safetyPatrol
     * @return \Illuminate\Http\Response
     */
    public function edit(SafetyPatrol $safetyPatrol)
    {
        if (!auth()->user()->can('edit safety patrols')) {
            return \abort(403);
        }

        if (!$safetyPatrol) {
            return \abort(404);
        }

        if (!auth()->user()->hasRole(['user'])) {
            if ($safetyPatrol->status->name !== 'Draft') {
                return abort(403);
            }
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $categories = SafetyPatrolCategory::all();
        $statusWorkOrders = StatusWorkOrder::all();
        $progress = $safetyPatrol->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $safetyPatrol->attachments()->where(['status_type' => 'Closed'])->get();

        return \view('pages.safety_patrol.edit', compact('progress', 'closed', 'safetyPatrol', 'statusWorkOrders', 'categories', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SafetyPatrol  $safetyPatrol
     * @return \Illuminate\Http\Response
     */
    public function update(SafetyPatrolUpdate $request, SafetyPatrol $safetyPatrol)
    {
        if (!auth()->user()->can('edit safety patrols')) {
            return \abort(403);
        }

        if (!$safetyPatrol) {
            return \abort(404);
        }

        if ($request->hasfile('files')) {

            if ((count($request->file('files')) + count($safetyPatrol->files)) > 3) {
                redirect()->back()->withErrors(['erros' => ['File not allow more than 3 files!']]);
            }

            foreach ($request->file('files') as $file) {
                $name = Str::random(40) . '.' . $file->extension();
                $path = date('Y/m/d/') . $name;
                Storage::disk('local')->putFileAs('files', new File($file), $path);
                $safetyPatrol->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
            }
        }

        try {
            //Memanggil Event ModelWasUpdated
            event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol just updated'));
            $safetyPatrol->update($request->input());

            return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SafetyPatrol  $safetyPatrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(SafetyPatrol $safetyPatrol)
    {
        if (!auth()->user()->can('delete safety patrols')) {
            return \abort(403);
        }

        if (!$safetyPatrol) {
            return \abort(404);
        }

        try {
            //Memanggil Event ModelWasDeleted
            event(new ModelWasDeleted($safetyPatrol, 'The request safety patrol just deleted'));

            $safetyPatrol->delete();
            return redirect()->route('safety-patrol.index')->with('success', 'Delete Successfully');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $safetyPatrols = ($this->findAll($request))->get();
        return Excel::download(new WorkOrdersExport($safetyPatrols), 'work_orders.xlsx');
    }

    public function draft(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        $status = StatusWorkOrder::where(['name' => 'Draft'])->orWhere(['name' => 'draft'])->first();
        if (!auth()->user()->hasRole(['user'])) {
            if ($safetyPatrol->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $safetyPatrol->status_id = $status->id;
        $safetyPatrol->save();

        event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function open(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        $status = StatusWorkOrder::where(['name' => 'Open'])->orWhere(['name' => 'open'])->first();
        if (!auth()->user()->hasRole(['user'])) {
            if ($safetyPatrol->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $safetyPatrol->status_id = $status->id;
        $safetyPatrol->save();

        event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        $safetyPatrol->url = route('safety-patrol.update', $safetyPatrol->id);
        event(new SubmitRequestMail($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        event(new SendNotification($safetyPatrol));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function approved(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        $status = StatusWorkOrder::where(['name' => 'Approved'])->orWhere(['name' => 'approved'])->first();
        if (!auth()->user()->hasRole(['user'])) {
            if ($safetyPatrol->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $safetyPatrol->status_id = $status->id;
        $safetyPatrol->operator = $request->operator;
        $safetyPatrol->worked_at = strtotime($request->worked_at);
        $safetyPatrol->save();

        event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function on_progress(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        $status = StatusWorkOrder::where(['name' => 'On Progress'])->orWhere(['name' => 'on progress'])->first();
        if (!auth()->user()->hasRole(['user'])) {
            return abort(403);
        }

        $safetyPatrol->status_id = $status->id;
        $safetyPatrol->save();

        event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function attachmentProgress(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);

        if (!auth()->user()->hasRole(['user'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $safetyPatrol->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('attachments') . '/' . $path, 'status_type' => 'On Progress']);
        }

        event(new ModelWasUpdated($safetyPatrol, 'The attachment work order On Progress'));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function closed(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        $status = StatusWorkOrder::where(['name' => 'Closed'])->orWhere(['name' => 'closed'])->first();
        if (auth()->user()->hasRole(['user'])) {
            return abort(403);
        }

        $safetyPatrol->status_id = $status->id;
        $safetyPatrol->save();

        event(new ModelWasUpdated($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        $safetyPatrol->url = route('safety-patrol.update', $safetyPatrol->id);
        event(new SubmitRequestMail($safetyPatrol, 'The request safety patrol change status to ' . $status->name));
        event(new SendNotification($safetyPatrol));

        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function attachmentClosed(Request $request, $id)
    {
        $safetyPatrol = SafetyPatrol::find($id);

        if (!auth()->user()->hasRole(['user'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $safetyPatrol->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('attachments') . '/' . $path, 'status_type' => 'Closed']);
        }

        event(new ModelWasUpdated($safetyPatrol, 'The attachment work order Closed'));
        return redirect()->route('safety-patrol.index')->with('success', 'Update Successfully');
    }

    public function removeFile($id, $idFile = null)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        if (!$safetyPatrol) {
            return abort(404);
        }

        if ($idFile) {
            $file = $safetyPatrol->files()->where(['id' => $idFile])->first();
            Storage::delete('files/' . $file->path);
            $safetyPatrol->files()->where(['id' => $idFile])->delete();
        } else {
            foreach ($safetyPatrol->attachments as $value) {
                Storage::delete('files/' . $value->path);
            }
            $safetyPatrol->files()->delete();
        }
        return redirect()->back()->with('success', 'Delete file successfully');
    }

    public function removeAttachment($id, $idFile = null)
    {
        $safetyPatrol = SafetyPatrol::find($id);
        if (!$safetyPatrol) {
            return abort(404);
        }

        if ($idFile) {
            $attachment = $safetyPatrol->attachments()->where(['id' => $idFile])->first();
            Storage::delete('attachments/' . $attachment->path);
            $safetyPatrol->attachments()->where(['id' => $idFile])->delete();
        } else {
            foreach ($safetyPatrol->attachments as $value) {
                Storage::delete('attachments/' . $value->path);
            }
            $safetyPatrol->attachments()->delete();
        }
        return redirect()->route('safety-patrol.index')->with('success', 'Delete Successfully');
    }
}
