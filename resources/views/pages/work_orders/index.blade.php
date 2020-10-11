@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Work Orders</h1>
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
                <h4>List Work Orders</h4>
                <div class="card-header-action">
                    <a href={{ route('work-order.exports.excel') }} class="btn btn-primary"><i class="far fa-file-excel"></i>  Export</a>
                    <a href={{ route('work-order.create') }} class="btn btn-success">Add Work Order</a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">

                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">
                                    #
                                </th>
                                <th width="30%">Title</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workOrders as $item)
                            <tr>
                                <td>
                                    {{($workOrders->currentPage() - 1) * $workOrders->perPage() + $loop->iteration}}
                                </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->user->name }} </td>
                                <td><a class="btn btn-sm btn-primary" href="#">{{ $item->status->name }}</a></td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <a href={{ route('work-order.show', $item->id) }} class="btn btn-info" data-toggle="tooltip" title=""
                                        data-original-title="Detail">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    @can('edit abnormality')
                                    <a href={{ route('work-order.edit', $item->id) }} class="btn btn-warning" data-toggle="tooltip" title=""
                                        data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    @endcan
                                    @can('delete abnormality')
                                    <a href="{{ route('work-order.destroy', $item->id) }}" data-name="{{$item->title}}" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-original-title="Remove" class="btn btn-danger btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $workOrders->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
