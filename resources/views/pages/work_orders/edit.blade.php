@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Abnormalities</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('abnormality.update', $abnormality->id) }}" enctype="multipart/form-data"
                class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Edit Abnormality</h4>
                    <div class="card-header-action">
                        <a href="{{ route('abnormality.index') }}" class="btn btn-info">List Abnormalities</a>
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
                    <div class="form-row">
                        @foreach ($abnormality->files as $item)
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <a href="{{ asset('files/'.$item->path) }}" target="_blank" class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }} {{ $loop->iteration }}</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="form-row" id="files">
                        <div class="form-group col-md-4">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]">
                                <label class="custom-file-label" for="customFile">Replace file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input type="text" value="{{ $abnormality->title }}" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description">{{ $abnormality->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="location">Location</label>
                            <input type="text" value="{{ $abnormality->location }}" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pic_name">PIC Name</label>
                            <input type="text" value="{{ $abnormality->pic_name }}" class="form-control" id="pic_name" name="pic_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pic_name">Status</label>
                            <select name="status_id" class="custom-select" id="">
                                @foreach ($status_abnormalities as $item)
                                <option value="{{ $item->id }}" {{ $item->id === $abnormality->status_id ? 'selected': '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
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
