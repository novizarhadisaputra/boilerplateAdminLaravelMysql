<?php

namespace App\Http\Controllers;

use App\Abnormality;
use App\Http\Requests\DashboardRequest;
use App\Log;
use App\Notification;
use App\StatusAbnormality;
use App\StatusWorkOrder;
use App\User;
use App\WorkOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        $total_users = User::whereHas('roles', function(Builder $query) {
            $query->whereNotIn('name', ['super admin', 'admin']);
        })->count();

        $total_abnormalities = Abnormality::count();
        $total_work_orders = WorkOrder::count();

        $per_page = $request->per_page ?? 5;
        $logs = Log::orderBy('created_at', 'desc')->paginate($per_page);

        $statusAbnormalities = StatusAbnormality::whereIn('name', ['Outstanding', 'Closed'])->get();
        $statusWorkOrders = StatusWorkOrder::whereIn('name', ['Outstanding', 'Closed'])->get();

        return view('home', compact('total_users', 'total_abnormalities', 'total_work_orders', 'logs', 'statusAbnormalities', 'statusWorkOrders', 'notifications'));
    }
}
