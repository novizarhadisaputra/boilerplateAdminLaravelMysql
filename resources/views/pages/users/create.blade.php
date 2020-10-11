@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
    </div>

    <div class="section-body">
        {{-- <div class="card">
            <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="card-header">
                    <h4>Add User</h4>
                    <div class="card-header-action">
                        <a href={{ route('users.index') }} class="btn btn-info">Back to List User</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('errors'))
                    @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{$err}}
                    </div>
                    @endforeach
                    @endif
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your name"
                            required="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                        <select class="custom-select" name="department_id">
                            @foreach ($departments as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Section Name</label>
                        <select class="custom-select" name="section_id">
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div> --}}
        <div class="card">
            <form method="POST" action="{{ route('users.store') }}" class="needs-validation"
                novalidate="">
                @csrf
                <div class="card-header">
                    <h4>Add User</h4>
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
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>NPK</label>
                            <input type="text" class="form-control" name="npk"
                                value="" required="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value=""
                                required="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username"
                                value="" required="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value=""
                                required="">
                            <div class="invalid-feedback">
                                Please fill in the email
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="******************">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Password  Confirm</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="******************">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Department</label>
                            <select name="department_id" id="department_id" class="custom-select">
                                @foreach ($departments as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Section</label>
                            <select name="section_id" id="section_id" class="custom-select">
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
</section>
@endsection
