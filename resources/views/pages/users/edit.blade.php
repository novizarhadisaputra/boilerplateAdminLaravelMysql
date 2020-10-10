@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile {{ $user->name }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href={{ route('users.index') }}>User</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, {{ $user->name }}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img style="height: 100px !important;" alt="image"
                            src="{{ $user->profile_picture ?? asset('assets/img/avatar/avatar-1.png') }}"
                            class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Request Work Orders</div>
                                <div class="profile-widget-item-value">{{ count($user->workorders) }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Request Abnormalities</div>
                                <div class="profile-widget-item-value">{{ count($user->abnormalities) }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ $user->name }} <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> {{ $user->section->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            @if (Session::has('errors'))
                            @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">
                                {{$err}}
                            </div>
                            @endforeach
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Role Name</label>
                                    <select class="form-control select2" name="roles[]" multiple="">
                                        @foreach ($roles as $role)
                                        @foreach ($user->roles as $item)
                                        <option value="{{ $role->id }}" {{ $item->id === $role->id ? 'selected': '' }}>
                                            {{ $role->name }}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ $user->username }}" required="">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        required="">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ $user->username }}" required="">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>NPK</label>
                                    <input type="text" class="form-control" name="npk" value="{{ $user->npk }}"
                                        required="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="******************">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                        required="">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Department</label>
                                    <select name="department_id" id="department_id" class="custom-select">
                                        @foreach ($departments as $item)
                                        <option {{$item->id === $user->department_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Section</label>
                                    <select name="section_id" id="section_id" class="custom-select">
                                        @foreach ($sections as $item)
                                        <option {{$item->id === $user->section_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
