@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Abnormalities</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
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
                                <div class="form-group col-md-6">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input file-input" id="customFile" accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]">
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
                            @if(!count($closed))
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                @if ($abnormality->status->name === 'On Progress' || $abnormality->status->name === 'Closed')
                <div class="card form-group">
                    <div class="card-header">
                        <h4>Attachment On Progress</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate=""
                            action="{{ route('abnormality.attachment.on_progress', $abnormality->id) }}">
                            @csrf

                            @if(!count($closed))
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" id="addAttachment">Add File</button>
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                @foreach ($progress as $item)
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <a href="{{ asset('files/'.$item->path) }}" target="_blank"
                                            class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }}
                                            {{ $loop->iteration }}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(!count($closed))
                            <div class="form-row" id="attachments">
                                <div class="form-group col-md-6">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input attachment" id="customFile"
                                            accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]" required>
                                        <label class="custom-file-label" for="customFile">Replace file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                @endif
                @if($abnormality->status->name === 'Closed')
                <div class="card">
                    <div class="card-header">
                        <h4>Attachment Closed</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate=""
                            action="{{ route('abnormality.attachment.closed', $abnormality->id) }}">
                            @csrf

                            @if(!count($closed))
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" id="addAttachmentClosed">Add File</button>
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                @foreach ($closed as $item)
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <a href="{{ asset('files/'.$item->path) }}" target="_blank"
                                            class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }}
                                            {{ $loop->iteration }}</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            @if(!count($closed))
                            <div class="form-row" id="attachmentsClosed">
                                <div class="form-group col-md-6">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input attachment-closed" id="customFile"
                                            accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]">
                                        <label class="custom-file-label" for="customFile">Replace file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
