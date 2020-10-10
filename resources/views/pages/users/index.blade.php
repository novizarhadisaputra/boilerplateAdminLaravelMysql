@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
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
                <h4>List User</h4>
                <div class="card-header-action">
                    <a href={{ route('users.create') }} class="btn btn-success">Add User</a>
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
                                <th>Username</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->username }}</td>
                                <td> {{ $item->name }} </td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->department->name }} </td>
                                <td>
                                    <a href={{ route('users.edit', $item->id) }} class="btn btn-warning"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href={{ route('users.show', $item->id) }} class="btn btn-info"
                                        data-toggle="tooltip" title="" data-original-title="Detail">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <a href="{{ route('users.destroy', $item->id) }}" data-name="{{$item->name.' / '.$item->username}}" data-csrf={{csrf_token()}} data-identity={{ $item->id }} data-toggle="modal" data-original-title="Remove" class="btn btn-danger btn-delete">
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
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
