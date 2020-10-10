@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Sections</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('sections.update', $section->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Edit Section</h4>
                    <div class="card-header-action">
                        <a href={{ route('sections.index') }} class="btn btn-info">Back to List Sections</a>
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
                        <label>Section Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $section->name }}" required="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                        <select class="custom-select" name="department_id">
                            @foreach ($departments as $item)
                                <option value="{{$item->id}}" {{ $item->id === $section->department->id ? 'selected':''}}>{{$item->name}}</option>
                            @endforeach
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
