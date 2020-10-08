@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Status Work Orders</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="POST" action="{{ route('status-work-order.update', $status_work_order->id) }}" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Add Status Work Order</h4>
                    <div class="card-header-action">
                        <a href={{ route('status-work-order.index') }} class="btn btn-info">Back to List tatus Work Order</a>
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
                    <div class="form-group">
                        <label>Status Work Order Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $status_work_order->name }}" required="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
