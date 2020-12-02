<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStore;
use App\Notification;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function index(Request $request)
    {
        $per_page = $request->per_page ?? 10;
        $notifications = Notification::orderBy('created_at', 'desc')->paginate($per_page);

        $setting = Setting::first();
        if(!$setting) {
            $request->request->add(['fromIndex' => true]);
            $request->request->add(['admin_email_notification' => false]);
            $setting = $this->storeFromIndex($request);
        }
        return view('pages.settings.index', \compact('setting' , 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.settings.create', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingStore $request)
    {
        $validated = $request->validated();
        try {
            $setting = Setting::create($request->all());
            return redirect()->route('setting.index')->with('success', 'Add Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function storeFromIndex($request)
    {
        try {
            $setting = Setting::create($request->all());
            return $setting;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        if (!$setting) {
            return \abort(404);
        }

        return \view('pages.settings.edit', compact('setting', 'notifications'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        if (!$setting) {
            return \abort(404);
        }

        return \view('pages.settings.edit', compact('setting', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        if (!$setting) {
            return \abort(404);
        }
        $validator = [];
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if ($request->input($key) != $setting[$key]) {
                $validator[$key] = 'required';
            }
        }
        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $request->merge(['admin_email_notification' => $request->filled('admin_email_notification') ? 1 : 0]);
            $setting->update($request->input());
            return redirect()->route('setting.index')->with('success', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        if (!$setting) {
            return \abort(404);
        }
        $setting->delete();
        return redirect()->route('categories.index')->with('success', 'Delete Successfully');
    }
}
