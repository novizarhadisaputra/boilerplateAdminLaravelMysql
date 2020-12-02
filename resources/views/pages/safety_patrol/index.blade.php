@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Safety Patrols</h1>
    </div>

    <div class="section-body">
        @if (Session::has('success'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>List Safety Patrols</h4>
                <div class="card-header-action">
                    <a href={{ route('safety-patrol.exports.excel') }} class="btn btn-primary"><i
                            class="far fa-file-excel"></i> Export</a>
                    <a href={{ route('safety-patrol.create') }} class="btn btn-success">Add Safety Patrol</a>
                </div>
            </div>
            <div class="card-body">
                <div class="float-right form-group">
                    <form action="{{ route('safety-patrol.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    #
                                </th>
                                <th width="25%">Code</th>
                                <th width="25%">Title</th>
                                <th width="10%">Status</th>
                                <th width="10%">Created At</th>
                                <th width="20%">Action</th>
                                <th width="20%">Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($safetyPatrols as $item)

                            @php
                                if($item->status->name === 'Draft') {
                                    $color = "btn-info";
                                } else if($item->status->name === 'Open') {
                                    $color = "btn-info";
                                } else if($item->status->name === 'Approved') {
                                    $color = "btn-info";
                                } else if($item->status->name === 'On Progress') {
                                    $color = "btn-warning";
                                } else if($item->status->name === 'Closed') {
                                    $color = "btn-success";
                                }
                            @endphp
                            <tr>
                                <td>
                                    {{($safetyPatrols->currentPage() - 1) * $safetyPatrols->perPage() + $loop->iteration}}
                                </td>
                                {{-- <td> {{ $item->user->name }} </td> --}}
                                <td> {{ $item->code }} </td>
                                <td> {{ $item->title }} </td>
                                <td><a class="btn btn-sm {{ $color }}" href="#">{{ $item->status->name }}</a></td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <a href={{ route('safety-patrol.show', $item->id) }} class="btn btn-info"
                                        data-toggle="tooltip" title="" data-original-title="Detail">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    @if (auth()->user()->hasRole(['super admin', 'admin']))
                                    @can('edit safety patrols')
                                    <a href={{ route('safety-patrol.edit', $item->id) }} class="btn btn-warning"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    @endcan
                                    @else
                                    @if ($item->status->name == 'Draft')
                                    @can('edit safety patrols')
                                    <a href={{ route('safety-patrol.edit', $item->id) }} class="btn btn-warning"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    @endcan
                                    @endif
                                    @endif

                                    @can('delete safety patrols')
                                    <a href="{{ route('safety-patrol.destroy', $item->id) }}" data-button-label="Delete"
                                        data-method="DELETE" data-csrf={{csrf_token()}} data-identity={{ $item->id }}
                                        data-toggle="modal" data-wording="Are you sure delete {{ $item->title }}"
                                        data-title="Remove Safety Patrol" class="btn btn-danger btn-modal">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @if (auth()->user()->hasRole(['super admin', 'admin']) && $item->status_before != '' && $item->status_before != null && $item->status->name != 'Closed')

                                    <a href="{{ route('safety-patrol.status.'. $item->status_before, $item->id) }}"
                                        data-button-label="Update" data-method="POST" data-csrf={{csrf_token()}}
                                        data-identity={{ $item->id }} data-toggle="modal"
                                        data-wording="Are you sure change status to {{ $item->before_label }} {{ $item->title }}"
                                        data-title="{{ $item->before_label }} Safety Patrol"
                                        class="btn btn-primary btn-modal">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    @endif

                                    @if ($item->status_after != '' && $item->status_after != null)
                                    <a href="{{ route('safety-patrol.status.'. $item->status_after, $item->id) }}"
                                        data-button-label="Update" data-method="POST" data-csrf={{csrf_token()}}
                                        data-identity={{ $item->id }} data-toggle="modal" data-content-html="@if (!auth()->user()->hasRole(['user']) && $item->status_after == 'approved')
                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='operator'>Operator Name</label>
                                                <input type='text' class='form-control' id='operator' name='operator'>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='work_at'>Worked At</label>
                                                <input type='date' class='form-control' id='worked_at' name='worked_at'>
                                            </div>
                                        </div>
                                        @endif"
                                        data-wording="Are you sure change status to {{ $item->after_label }} {{ $item->title }}"
                                        data-title="{{ $item->after_label }} Safety Patrol"
                                        class="btn btn-success btn-modal">
                                        <i class="fas fa-share-square"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center font-weight-bold">
                                    Data is Empty
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $safetyPatrols->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
