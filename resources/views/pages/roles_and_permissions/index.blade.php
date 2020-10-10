@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Roles And Permissionss</h1>
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
                <h4>List Roles And Permissions</h4>
                <div class="card-header-action">
                    <a href={{ route('roles-and-permissions.create') }} class="btn btn-success">Add Roles And Permissions</a>
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
                                <th width="15%">Roles</th>
                                <th>Permissions</th>
                                <th>Member</th>

                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach ($item->permissions as $permission)
                                    <div class="badge badge-primary form-group">{{ $permission->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->users as $user)
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-5.png') }}"
                                        class="rounded-circle" data-toggle="tooltip" title=""
                                        data-original-title="{{ $user->name }}" width="35">
                                    @endforeach
                                </td>
                                <td>
                                    <a href={{ route('roles-and-permissions.edit', $item->id) }} class="btn btn-warning"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href={{ route('roles-and-permissions.show', $item->id) }} class="btn btn-info"
                                        data-toggle="tooltip" title="" data-original-title="Detail">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <a href="{{ route('roles-and-permissions.destroy', $item->id) }}" data-name="{{$item->name}}" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-original-title="Remove" class="btn btn-danger btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {{-- <a href="{{ route('roles-and-permissions.destroy', $item->id) }}" data-toggle="tooltip" title=""
                                        data-original-title="Remove" class="btn btn-danger" onclick="event.preventDefault();
                                            document.getElementById('delete-{{ $loop->iteration }}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <form id="delete-{{ $loop->iteration }}"
                                        action="{{ route('roles-and-permissions.destroy', $item->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE');
                                    </form> --}}
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
