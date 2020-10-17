@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Departments</h1>
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
                <h4>List Department</h4>
                <div class="card-header-action">
                    <a href={{ route('departments.create') }} class="btn btn-success">Add Department</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $item)
                            <tr>
                                <td>
                                    {{($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration}}
                                </td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    <a href={{ route('departments.edit', $item->id) }} class="btn btn-warning" data-toggle="tooltip" title=""
                                        data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href="{{ route('departments.destroy', $item->id) }}" data-button-label="Delete" data-method="DELETE" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-wording="Are you sure delete {{ $item->name }}" data-title="Remove Department" class="btn btn-danger btn-modal">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $departments->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
