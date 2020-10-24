<?php

namespace App\Http\Controllers;

use App\Abnormality;
use App\Log;
use App\Notification;
use App\StatusAbnormality;
use App\StatusWorkOrder;
use App\User;
use App\WorkOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $abnormalities = Abnormality::all();
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        $now = Carbon::now();
        $current_year = $now->year;
        $total_users = User::whereHas('roles', function (Builder $query) {
            $query->whereNotIn('name', ['super admin', 'admin']);
        })->count();

        $total_abnormalities = Abnormality::count();
        $total_work_orders = WorkOrder::count();

        $per_page = $request->per_page ?? 5;
        $logs = Log::orderBy('created_at', 'desc')->paginate($per_page);

        $statusAbnormalities = StatusAbnormality::whereIn('name', ['Outstanding', 'Closed'])->get();
        $statusWorkOrders = StatusWorkOrder::whereIn('name', ['Outstanding', 'Closed'])->get();

        return view('home', compact('current_year', 'total_users', 'total_abnormalities', 'total_work_orders', 'logs', 'statusAbnormalities', 'statusWorkOrders', 'notifications'));
    }

    public function ajaxDataAbnormality(Request $request)
    {
        $now = Carbon::now();

        $abnormalities = Abnormality::select();
        // Filter by Status
        if ($request->filled('status_abnormality')) {
            $condition = $request->status_abnormality === 'Closed' ? ['name', '=', 'Closed'] : ['name', '<>', 'Closed'];
            $status = StatusAbnormality::where([$condition])->pluck('id');
            $abnormalities = $abnormalities->whereIn('status_id', $status);
        }

        // Filter by Department
        if ($request->filled('department')) {
            $department = $request->department;
            $abnormalities = $abnormalities->whereHas('user', function ($query) use ($department) {
                $query->where('department_id', $department);
            });
        }
        if ($request->filled('years')) {
            $abnormalities = $abnormalities->whereRaw('YEAR(created_at) = ?', [$request->years]);
        } else {
            $abnormalities = $abnormalities->whereRaw('YEAR(created_at) <= ? AND YEAR(created_at)', [$now->year, ($now->year - 4)]);
        }

        $abnormalities = $abnormalities->get();
        return $abnormalities;
    }

    public function ajaxDataWorkOrder(Request $request)
    {
        $now = Carbon::now();
        $workOrders = WorkOrder::select();
        // Filter by Status
        if ($request->filled('status_abnormality')) {
            $condition = $request->status_abnormality === 'Closed' ? ['name', '=', 'Closed'] : ['name', '<>', 'Closed'];
            $status = StatusWorkOrder::where([$condition])->pluck('id');
            $workOrders = $workOrders->whereIn('status_id', $status);
        }

        // Filter by Department
        if ($request->filled('department')) {
            $department = $request->department;
            $workOrders = $workOrders->whereHas('user', function ($query) use ($department) {
                $query->where('department_id', $department);
            });
        }

        if ($request->filled('years')) {
            $workOrders = $workOrders->whereRaw('YEAR(created_at) = ?', [$request->years]);
        } else {
            $workOrders = $workOrders->whereRaw('YEAR(created_at) <= ? AND YEAR(created_at)', [$now->year, ($now->year - 4)]);
        }

        $workOrders = $workOrders->get();
        return $workOrders;
    }
}
