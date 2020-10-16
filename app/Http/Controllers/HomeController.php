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

        $total_users = User::whereHas('roles', function (Builder $query) {
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

    public function ajaxDataAbnormality(Request $request)
    {
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
            $abnormalities = $abnormalities - whereHas('user', function ($query) use ($department) {
                $query->where('department_id', $department);
            });
        }
        $abnormalities = $abnormalities->get();
        return $abnormalities;
    }

    public function ajaxDataWorkOrder(Request $request)
    {
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
            $workOrders = $workOrders - whereHas('user', function ($query) use ($department) {
                $query->where('department_id', $department);
            });
        }
        $workOrders = $workOrders->get();
        return $workOrders;
    }
}
