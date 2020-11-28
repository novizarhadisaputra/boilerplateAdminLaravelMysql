@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Work Orders</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('safety-patrol.store') }}" enctype="multipart/form-data"
                class="needs-validation" novalidate="">
                @csrf
                <div class="card-header">
                    <h4>Add Work Order</h4>
                    <div class="card-header-action">
                        <a href="{{ route('safety-patrol.index') }}" class="btn btn-info">List Work Orders</a>
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button class="btn btn-success" id="addFile">Add File</button>
                        </div>
                    </div>
                    <div class="form-row" id="files">
                        <div class="form-group col-md">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="input-group-text btn-danger btn-remove-file" id="inputGroupFileAddon">x</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file-input" name="files[]" id="inputGroupFile"
                                        aria-describedby="inputGroupFileAddon">
                                    <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="safety_category_id">Category</label>
                            <select type="text" class="form-control custom-select" id="safety_category_id" name="safety_category_id">
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pic_name">PIC Name</label>
                            <input type="text" class="form-control" id="pic_name" name="pic_name">
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
