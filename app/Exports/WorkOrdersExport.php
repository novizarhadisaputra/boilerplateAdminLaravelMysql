<?php

namespace App\Exports;

use App\WorkOrder;
use Maatwebsite\Excel\Concerns\FromCollection;

class WorkOrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WorkOrder::all();
    }
}
