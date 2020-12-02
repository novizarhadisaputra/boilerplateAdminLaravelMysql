@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Settings</h1>
    </div>

    <div class="section-body">
        @if (Session::has('success'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form id="setting-form" method="POST" action="{{ route('setting.update', $setting->id) }}">
            @csrf()
            @method('PUT')
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>General Settings</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">General settings such as email, etc
                    </p>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email
                            Notification</label>
                        <div class="col-sm-6 col-md-9 text-left">
                            <label class="custom-switch mt-2 px-0">
                                <input type="checkbox" {{ $setting->admin_email_notification ? 'checked' : '' }} name="admin_email_notification" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
