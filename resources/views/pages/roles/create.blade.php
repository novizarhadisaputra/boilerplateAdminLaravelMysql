@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Roles</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('roles.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="card-header">
                    <h4>Add Role</h4>
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
                        <input type="text" class="form-control" name="name" placeholder="super admin or admin or guest"
                            required="">
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
