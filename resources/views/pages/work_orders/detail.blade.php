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
                    <div class="card-header">
                        <h4>Detail Work Order</h4>
                        <div class="card-header-action">
                            <a href="{{ route('work-order.index') }}" class="btn btn-info">List Work Orders</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            @foreach ($workOrder->files as $item)
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
                                <input type="text" value="{{ $workOrder->title }}" class="form-control" id="title"
                                    name="title">
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
                                <input type="text" value="{{ $workOrder->location }}" class="form-control" id="location"
                                    name="location">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pic_name">PIC Name</label>
                                <input type="text" value="{{ $workOrder->pic_name }}" class="form-control" id="pic_name"
                                    name="pic_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="category_id">Category</label>
                                <input type="text" value="{{ $workOrder->category_id }}" class="form-control" id="category_id"
                                    name="category_id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status_id">Status</label>
                                <input type="text" value="{{ $workOrder->status->name }}" class="form-control" id="status_id"
                                    name="status_id">
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
                            <a href="#" class="btn btn-info">{{ $workOrder->status->name }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($workOrder->logs as $item)
                            <li class="media">
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
