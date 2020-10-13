<?php

namespace App\Http\Controllers;

use App\Abnormality;
use App\Http\Requests\DashboardRequest;
use App\Log;
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
        $total_users = User::whereHas('roles', function(Builder $query) {
            $query->where('name', 'user');
        })->count();
        $total_abnormalities = Abnormality::count();
        $total_work_orders = WorkOrder::count();
        $logs = Log::all();
        return view('home', compact('total_users', 'total_abnormalities', 'total_work_orders', 'logs'));
    }
}
