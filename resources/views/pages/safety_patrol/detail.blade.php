@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Work Orders</h1>
    </div>


    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Operator Information</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <div class="media-body">
                                    <div class="float-right text-primary">
                                        {{ $safetyPatrol->worked_at ?? 'No schedule' }}</div>
                                    <div class="media-title">{{ $safetyPatrol->operator ?? 'No operator available' }}</div>
                                    <span
                                        class="text-small text-muted">As Opeator</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($safetyPatrol->status->name === 'On Progress' || $safetyPatrol->status->name === 'Closed')
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Attachment On Progress</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            @foreach ($progress as $item)
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <a href="{{ asset('attachments/'.$item->path) }}" target="_blank"
                                        class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }}
                                        {{ $loop->iteration }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($safetyPatrol->status->name === 'Closed')
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Attachment Closed</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            @foreach ($closed as $item)
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <a href="{{ asset('attachments/'.$item->path) }}" target="_blank"
                                        class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }}
                                        {{ $loop->iteration }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Work Order</h4>
                        <div class="card-header-action">
                            <a href="{{ route('work-order.index') }}" class="btn btn-info">List Work Orders</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            @foreach ($safetyPatrol->files as $item)
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <a href="{{ asset('files/'.$item->path) }}" target="_blank"
                                        class="btn btn-sm btn-primary">File {{ strtoupper($item->ext) }}
                                        {{ $loop->iteration }}</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Title</label>
                                <input type="text" value="{{ $safetyPatrol->title }}" class="form-control" id="title"
                                    name="title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description"
                                    id="description">{{ $safetyPatrol->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="location">Location</label>
                                <input type="text" value="{{ $safetyPatrol->location }}" class="form-control" id="location"
                                    name="location">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pic_name">PIC Name</label>
                                <input type="text" value="{{ $safetyPatrol->pic_name }}" class="form-control" id="pic_name"
                                    name="pic_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="category_id">Category</label>
                                <input type="text" value="{{ $safetyPatrol->category_id }}" class="form-control"
                                    id="category_id" name="category_id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status_id">Status</label>
                                <input type="text" value="{{ $safetyPatrol->status->name }}" class="form-control"
                                    id="status_id" name="status_id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-info">{{ $safetyPatrol->status->name }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($safetyPatrol->logs as $item)
                            <li class="media">
                                <img class="mr-3 rounded-circle" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    alt="avatar" width="50">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{ $item->created_at }}</div>
                                    <div class="media-title">{{ $item->user->name }}</div>
                                    <span class="text-small text-muted">{{ $item->action }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
