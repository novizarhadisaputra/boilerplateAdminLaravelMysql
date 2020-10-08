@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Categories</h1>
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
                <h4>List Categories</h4>
                <div class="card-header-action">
                    <a href={{ route('categories.create') }} class="btn btn-success">Add Category</a>
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
                                <th>Categories Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>
                                    {{($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration}}
                                </td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    <a href={{ route('categories.edit', $item->id) }} class="btn btn-warning" data-toggle="tooltip" title=""
                                        data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <a href="{{ route('categories.destroy', $item->id) }}" data-toggle="tooltip" title=""
                                    data-original-title="Remove" class="btn btn-danger" onclick="event.preventDefault();
                                            document.getElementById('delete-{{ $loop->iteration }}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <form id="delete-{{ $loop->iteration }}" action="{{ route('categories.destroy', $item->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE');
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
