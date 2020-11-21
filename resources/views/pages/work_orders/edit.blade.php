@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Work Orders</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="card">
                    <form method="POST" action="{{ route('work-order.update', $workOrder->id) }}"
                        enctype="multipart/form-data" class="needs-validation" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Work Order</h4>
                            <div class="card-header-action">
                                <a href="{{ route('work-order.index') }}" class="btn btn-info">List Work Orders</a>
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
                            @if (!count($closed))
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-success" id="addFile">Add File</button>
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                @foreach ($workOrder->files as $item)
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <a href="{{ asset('files/'.$item->path) }}" target="_blank"
                                            class="btn btn-sm btn-secondary">File {{ strtoupper($item->ext) }}
                                            {{ $loop->iteration }}
                                        </a><a
                                            href="{{ route('work-order.file.remove', ['id' => $workOrder->id, 'idFile' => $item->id]) }}"
                                            data-button-label="Delete" data-method="DELETE" data-csrf={{csrf_token()}}
                                            data-identity={{ $item->id }} data-toggle="modal"
                                            data-wording="Are you sure delete File {{ strtoupper($item->ext) .' '.$loop->iteration }}"
                                            data-title="Remove File" class="btn btn-sm btn-danger btn-modal">
                                            x
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            @if (!count($closed))
                            <div class="form-row" id="files">
                                <div class="form-group col-md">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text btn-danger btn-remove-file"
                                                id="inputGroupFileAddon">x</button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input file-input" name="files[]"
                                                id="inputGroupFile" aria-describedby="inputGroupFileAddon">
                                            <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ $workOrder->title }}" class="form-control" id="title"
                                        name="title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="category_id">Category</label>
                                    <select type="text" class="form-control custom-select" id="category_id"
                                        name="category_id">
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" name="description"
                                        id="description">{{ $workOrder->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="location">Location</label>
                                    <input type="text" value="{{ $workOrder->location }}" class="form-control"
                                        id="location" name="location">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="pic_name">PIC Name</label>
                                    <input type="text" value="{{ $workOrder->pic_name }}" class="form-control"
                                        id="pic_name" name="pic_name">
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
                @if ($workOrder->status->name === 'On Progress' || $workOrder->status->name === 'Closed')
                <div class="card form-group">
                    <div class="card-header">
                        <h4>Attachment On Progress</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate=""
                            action="{{ route('work-order.attachment.on_progress', $workOrder->id) }}">
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
                                        <a href="{{ asset('attachments/'.$item->path) }}" target="_blank"
                                            class="btn btn-sm btn-secondary">File {{ strtoupper($item->ext) }}
                                            {{ $loop->iteration }}
                                        </a><a
                                            href="{{ route('work-order.attachment.remove', ['id' => $workOrder->id, 'idAttachment' => $item->id]) }}"
                                            data-button-label="Delete" data-method="DELETE" data-csrf={{csrf_token()}}
                                            data-identity={{ $item->id }} data-toggle="modal"
                                            data-wording="Are you sure delete File {{ strtoupper($item->ext) .' '.$loop->iteration }}"
                                            data-title="Remove File" class="btn btn-sm btn-danger btn-modal">
                                            x
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(!count($closed))
                            <div class="form-row" id="attachments">
                                <div class="form-group col-md-6">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input attachment" id="customFile"
                                            accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]"
                                            required>
                                        <label class="custom-file-label" for="customFile">Choose File</label>
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
                @if($workOrder->status->name === 'Closed')
                <div class="card">
                    <div class="card-header">
                        <h4>Attachment Closed</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate=""
                            action="{{ route('work-order.attachment.closed', $workOrder->id) }}">
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
                                        <a href="{{ asset('attachments/'.$item->path) }}" target="_blank"
                                            class="btn btn-sm btn-secondary">File {{ strtoupper($item->ext) }}
                                            {{ $loop->iteration }}
                                        </a><a
                                            href="{{ route('work-order.attachment.remove', ['id' => $workOrder->id, 'idAttachment' => $item->id]) }}"
                                            data-button-label="Delete" data-method="DELETE" data-csrf={{csrf_token()}}
                                            data-identity={{ $item->id }} data-toggle="modal"
                                            data-wording="Are you sure delete File {{ strtoupper($item->ext) .' '.$loop->iteration }}"
                                            data-title="Remove File" class="btn btn-sm btn-danger btn-modal">
                                            x
                                        </a>
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
                                        <label class="custom-file-label" for="customFile">Choose File</label>
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
