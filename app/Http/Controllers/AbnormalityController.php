<?php

namespace App\Http\Controllers;

use App\Abnormality;
use App\Events\ModelWasCreated;
use App\Events\ModelWasDeleted;
use App\Events\ModelWasUpdated;
use App\Events\SendNotification;
use App\Events\SubmitRequestMail;
use App\Exports\AbnormalitiesExport;
use App\Http\Requests\AbnormalityStore;
use App\Http\Requests\AbnormalityUpdate;
use App\Notification;
use App\StatusAbnormality;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AbnormalityController extends Controller
{

    public function index(Request $request)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $per_page = $request->per_page ?? 10;

        $data = $this->findAll($request);
        $data = $request->filled('search') ? $this->search($request, $data) : $data;
        $abnormalities = $data->paginate($per_page);
        return view('pages.abnormality.index', \compact('abnormalities', 'notifications'));
    }

    public function findOne($request)
    {
        $abnormality = Abnormality::select();
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->filled($key)) {
                $abnormality = $abnormality->where([$key => $value]);
            }
        }
        return $abnormality->first();
    }

    public function findAll($request)
    {
        if (\auth()->user()->hasRole('user')) {
            $request->request->add(['user_id' => auth()->user()->id]);
        }

        $abnormalities = Abnormality::select();
        foreach ($request->except(['search', '_method', '_token']) as $key => $value) {
            if ($request->filled($key)) {
                $abnormalities = $abnormalities->where([$key => $value]);
            }
        }
        return $abnormalities;
    }

    public function search($request, $data)
    {
        $abnormalities = $data;
        $abnormalities = $request->user_id ? $abnormalities->where(['user_id' => $request->user_id]) : $abnormalities;
        foreach (['code', 'title', 'description', 'location', 'pic_name', 'operator', 'worked_at'] as $key) {
            $abnormalities = $abnormalities->orWhere($key, 'like', '%' . $request->search . '%');
        }
        return $abnormalities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.abnormality.create', compact('notifications'));

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
            $abnormality->update(['code' => 'ABN/' . $abnormality->id . date('/Y/m/d')]);

            //Memanggil Event ModelWasCreated
            event(new ModelWasCreated($abnormality, 'The request abnormality just added'));

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
                    $abnormality->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
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

        if ($abnormality->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $progress = $abnormality->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $abnormality->attachments()->where(['status_type' => 'Closed'])->get();

        return view('pages.abnormality.detail', compact('abnormality', 'closed', 'progress', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function edit(Abnormality $abnormality)
    {
        if (!auth()->user()->can('edit abnormality')) {
            return \abort(403);
        }

        if (!$abnormality) {
            return \abort(404);
        }

        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $status_abnormalities = StatusAbnormality::all();
        $progress = $abnormality->attachments()->where(['status_type' => 'On Progress'])->get();
        $closed = $abnormality->attachments()->where(['status_type' => 'Closed'])->get();

        return \view('pages.abnormality.edit', compact('abnormality', 'closed', 'progress', 'status_abnormalities', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function update(AbnormalityUpdate $request, Abnormality $abnormality)
    {
        if (!auth()->user()->can('edit abnormality')) {
            return \abort(403);
        }

        if (!$abnormality) {
            return \abort(404);
        }

        if ($request->hasfile('files')) {

            foreach ($abnormality->files as $tmp) {
                Storage::delete('files/' . $tmp->path);
                $abnormality->files()->where(['id' => $tmp->id])->delete();
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
                $abnormality->files()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('files') . '/' . $path]);
            }
        }

        try {
            $status = StatusAbnormality::where(['id' => $request->status_id])->first();
            if ($abnormality->status_id !== $status->id) {
                if ($status->name === 'Open' || $status->name === 'open' || $status->name === 'Closed' || $status->name === 'closed') {
                    $abnormality->update($request->input());
                    $abnormality->url = route('abnormality.update', $abnormality->id);
                    event(new SubmitRequestMail($abnormality, 'The request abnormality change status to ' . $status->name));
                    event(new SendNotification($abnormality));
                }
                event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
            } else {
                //Memanggil Event ModelWasUpdated
                event(new ModelWasUpdated($abnormality, 'The request abnormality just updated'));
                $abnormality->update($request->input());
            }
            return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abnormality  $abnormality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abnormality $abnormality)
    {
        if (!auth()->user()->can('delete abnormality')) {
            return \abort(403);
        }

        if (!$abnormality) {
            return \abort(404);
        }

        try {
            //Memanggil Event ModelWasDeleted
            event(new ModelWasDeleted($abnormality, 'The request abnormality just deleted'));

            $abnormality->delete();
            return redirect()->route('abnormality.index')->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function export(Request $request)
    {
        try {
            $abnormalities = ($this->findAll($request))->get();
            return Excel::download(new AbnormalitiesExport($abnormalities), 'abnomalities.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function draft(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);
        $status = StatusAbnormality::where(['name' => 'Draft'])->orWhere(['name' => 'draft'])->first();
        if ($abnormality->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $abnormality->status_id = $status->id;
        $abnormality->save();

        //Memanggil Event ModelWasUpdated
        event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function open(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);
        $request->request->add(['id' => $abnormality->id]);
        $abnormality = $this->findOne($request);

        $status = StatusAbnormality::where(['name' => 'Open'])->orWhere(['name' => 'open'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            if ($abnormality->user_id !== auth()->user()->id) {
                return abort(403);
            }
        }

        $abnormality->status_id = $status->id;
        $abnormality->save();

        //Memanggil Event ModelWasUpdated
        event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
        $abnormality->url = route('abnormality.update', $abnormality->id);
        event(new SubmitRequestMail($abnormality, 'The request abnormality change status to ' . $status->name));
        event(new SendNotification($abnormality));

        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function approved(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);
        $status = StatusAbnormality::where(['name' => 'Approved'])->orWhere(['name' => 'approved'])->first();
        if ($abnormality->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $abnormality->status_id = $status->id;
        $abnormality->operator = $request->operator;
        $abnormality->worked_at = strtotime($request->worked_at);
        $abnormality->save();

        //Memanggil Event ModelWasUpdated
        event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function on_progress(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);
        $status = StatusAbnormality::where(['name' => 'On Progress'])->orWhere(['name' => 'on_progress'])->first();
        if ($abnormality->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $abnormality->status_id = $status->id;
        $abnormality->save();

        //Memanggil Event ModelWasUpdated
        event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function attachmentProgress(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $abnormality->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('attachments') . '/' . $path, 'status_type' => 'On Progress']);
        }

        event(new ModelWasUpdated($abnormality, 'The attachment abnormality On Progress'));
        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function closed(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);
        $request->request->add(['id' => $abnormality->id]);
        $abnormality = $this->findOne($request);

        $status = StatusAbnormality::where(['name' => 'Closed'])->orWhere(['name' => 'closed'])->first();
        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        $abnormality->status_id = $status->id;
        $abnormality->save();

        //Memanggil Event ModelWasUpdated
        event(new ModelWasUpdated($abnormality, 'The request abnormality change status to ' . $status->name));
        $abnormality->url = route('abnormality.update', $abnormality->id);
        event(new SubmitRequestMail($abnormality, 'The request abnormality change status to ' . $status->name));
        event(new SendNotification($abnormality));

        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }

    public function attachmentClosed(Request $request, $id)
    {
        $abnormality = Abnormality::find($id);

        if (!auth()->user()->hasRole(['super admin', 'admin'])) {
            return abort(403);
        }

        foreach ($request->file('files') as $file) {
            $name = Str::random(40) . '.' . $file->extension();
            $path = date('Y/m/d/') . $name;
            Storage::disk('local')->putFileAs('attachments', new File($file), $path);
            $abnormality->attachments()->create(['name' => $name, 'ext' => $file->extension(), 'path' => $path, 'original' => public_path('attachments') . '/' . $path, 'status_type' => 'Closed']);
        }

        event(new ModelWasUpdated($abnormality, 'The attachment abnormality Closed'));
        return redirect()->route('abnormality.index')->with('success', 'Update Successfully');
    }
}
