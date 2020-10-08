@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Status Abnormality</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('status-abnormality.update', $status_abnormality->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Add Status Abnormality</h4>
                    <div class="card-header-action">
                        <a href={{ route('status-abnormality.index') }} class="btn btn-info">Back to List Status Abnormality</a>
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
                        <label>Status Abnormality Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $status_abnormality->name }}" required="">
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
