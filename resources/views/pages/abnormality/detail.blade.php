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
                    <div class="card-header">
                        <h4>Detail Abnormality</h4>
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
                        <div class="form-row" id="files">
                            @foreach ($abnormality->files as $item)
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <a href="{{ asset('files/'.$item->path) }}" target="_blank" class="btn btn-sm btn-primary">File
                                        {{ strtoupper($item->ext) }} {{ $loop->iteration }}</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Title</label>
                                <input type="text" value="{{ $abnormality->title }}" class="form-control" id="title"
                                    name="title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description"
                                    id="description">{{ $abnormality->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="location">Location</label>
                                <input type="text" value="{{ $abnormality->location }}" class="form-control"
                                    id="location" name="location">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pic_name">PIC Name</label>
                                <input type="text" value="{{ $abnormality->pic_name }}" class="form-control"
                                    id="pic_name" name="pic_name">
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
                            <a href="#" class="btn btn-info">{{ $abnormality->status->name }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($abnormality->logs as $item)
                            <li class="media">
                                <img class="mr-3 rounded-circle" src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="avatar" width="50">
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
