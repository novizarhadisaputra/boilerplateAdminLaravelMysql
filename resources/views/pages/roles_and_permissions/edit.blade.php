@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Roles And Permissionss</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('roles-and-permissions.update', $role->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Add Roles And Permissions</h4>
                    <div class="card-header-action">
                        <a href={{ route('roles-and-permissions.index') }} class="btn btn-info">Back to List Roles And Permissions</a>
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
                        <label>Roles</label>
                        <select class="custom-select" name="role">
                            @foreach ($roles as $item)
                                <option value="{{$item->id}}" {{ $role->id === $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Permissions</label>
                        <select class="js-example-basic-multiple" name="permissions[]" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                                @foreach ($role->permissions as $item)
                                   {{ $permission->id === $item->id ? 'selected' : '' }}
                                @endforeach
                            >{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
