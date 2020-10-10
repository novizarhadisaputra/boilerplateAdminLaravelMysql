@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Permissions</h1>
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
                <h4>List Permissions</h4>
                <div class="card-header-action">
                    <a href={{ route('permissions.create') }} class="btn btn-success">Add Permission</a>
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
                                <th>Permission Name</th>
                                <th>Members</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $item)
                            <tr>
                                <td>
                                    {{($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration}}
                                </td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    @foreach ($item->roles as $role)
                                    <div class="badge badge-primary">{{ $role->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href={{ route('permissions.edit', $item->id) }} class="btn btn-warning" data-toggle="tooltip" title=""
                                        data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href="{{ route('permissions.destroy', $item->id) }}" data-name="{{$item->name}}" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-original-title="Remove" class="btn btn-danger btn-delete">
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
                    {!! $permissions->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
