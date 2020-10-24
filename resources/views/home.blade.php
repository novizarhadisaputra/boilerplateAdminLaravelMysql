@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Welcome {{ Auth::user()->name }} !</h1>
    </div>

    <div class="section-body">
        @if (auth()->user()->hasRole(['super admin', 'admin']))
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Users</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_users }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Abnormalities</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_abnormalities }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Work Orders</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_work_orders }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Request</h4>
                        </div>
                        <div class="card-body">
                            {{  $total_abnormalities + $total_work_orders }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Abnormalities</h4>
                        <div class="card-header-action">
                            <select name="filterChart" class="custom-select" id="filterChartAbnormality">
                               @for ($i = 0; $i < 5; $i++)
                               <option value="{{ $current_year - $i }}">{{ ($current_year - $i) }}</option>

                               @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-body" id="cardAbnormalityPie">
                        <canvas id="abnormalityPie" height="182"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Work Orders</h4>
                        <div class="card-header-action">
                            <select name="filterChart" class="custom-select" id="filterChartWorkOrder">
                                @for ($i = 0; $i < 5; $i++)
                                <option value="{{ $current_year - $i }}">{{ ($current_year - $i) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-body" id="cardWorkOrderPie">
                        <canvas id="workOrderPie" height="182"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($logs as $item)
                            <li class="media">
                                <img class="mr-3 rounded-circle" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    alt="avatar" width="50">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{ $item->created_at }}</div>
                                    <div class="media-title">{{ $item->user->name }}</div>
                                    <span class="text-small text-muted">{{ $item->action }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-6 offset-md-3">
            <img class="col-md-12" src="{{ asset('assets/img/icon-dashboard.png') }}" alt="">
        </div>
        @endif
    </div>
</section>
@endsection
