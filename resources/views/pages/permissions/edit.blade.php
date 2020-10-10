@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Permissions</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Edit Permission</h4>
                    <div class="card-header-action">
                        <a href={{ route('permissions.index') }} class="btn btn-info">Back to List Permission</a>
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
                        <label>Permission Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $permission->name }}" required="">
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
