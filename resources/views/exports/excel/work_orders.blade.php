<table>
    <tbody>
        <tr>
            <td colspan="7" style="text-align: center">Request Work Order</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: start">Total Records :</td>
            <td style="text-align: end"> {{ $workOrders->count() }} </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td width="10"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                No</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Code</td>
            <td width="25"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Created At</td>
            <td width="50"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Name
                / Username</td>
            <td width="50"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Title</td>
            <td width="50"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Description</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Category</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Location</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Opeator</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Status</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Worked At</td>
        </tr>
        @foreach($workOrders as $workOrder)
        <tr>
            <td style="text-align: left;">{{ $loop->iteration }}</td>
            <td>{{ $workOrder->code }}</td>
            <td>{{ $workOrder->created_at }}</td>
            <td>{{ $workOrder->user->name .' / '. $workOrder->user->username }}</td>
            <td>{{ $workOrder->title }}</td>
            <td>{{ $workOrder->description }}</td>
            <td>{{ $workOrder->category->name }}</td>
            <td>{{ $workOrder->location }}</td>
            <td>{{ $workOrder->operator }}</td>
            <td>{{ $workOrder->status->name }}</td>
            <td>{{ $workOrder->worked_at }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
