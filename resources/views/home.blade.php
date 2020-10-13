@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Welcome {{ Auth::user()->name }} !</h1>
    </div>

    <div class="section-body">
        @if (auth()->user()->hasRole(['super admin', 'admin']))

        @else
        <div class="col-md-6 offset-md-3">
            <img class="col-md-12" src="{{ asset('assets/img/icon-dashboard.png') }}" alt="">
        </div>
        @endif
    </div>
</section>
@endsection
