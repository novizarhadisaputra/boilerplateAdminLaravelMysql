@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
    </div>

    <div class="section-body">
        <div class="card">
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
                        <input type="text" class="form-control" name="name" placeholder="Your section name"
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
        </div>
    </div>
</section>
@endsection
