@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Roles</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('roles.update', $role->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Edit Role</h4>
                    <div class="card-header-action">
                        <a href={{ route('roles.index') }} class="btn btn-info">Back to List Role</a>
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
                        <label>Role Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}" required="">
                        <div class="invalid-feedback">

                        </div>
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
