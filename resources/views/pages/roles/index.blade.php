@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Roles</h1>
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
                <h4>List Roles</h4>
                <div class="card-header-action">
                    <a href={{ route('roles.create') }} class="btn btn-success">Add Role</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">
                                    #
                                </th>
                                <th width="15%">Role Name</th>
                                <th>Members</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                            <tr>
                                <td>
                                    {{($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration}}
                                </td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    @foreach ($item->users as $user)
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-5.png') }}"
                                        class="rounded-circle" data-toggle="tooltip" title=""
                                        data-original-title="{{ $user->name }}" width="35">
                                    @endforeach
                                </td>
                                <td>
                                    <a href={{ route('roles.edit', $item->id) }} class="btn btn-warning"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href="{{ route('roles.destroy', $item->id) }}" data-button-label="Delete" data-method="DELETE" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-wording="Are you sure delete {{ $item->name }}" data-title="Remove Role" class="btn btn-danger btn-modal">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {{-- <form id="delete-{{ $loop->iteration }}"
                                    action="{{ route('roles.destroy', $item->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE');
                                    </form> --}}
                                    <!-- Modal -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
