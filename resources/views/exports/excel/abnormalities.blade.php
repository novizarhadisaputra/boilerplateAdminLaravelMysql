<table>
    <tbody>
        <tr>
            <td colspan="6" style="text-align: center">Request Abnormality</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: start">Total Records :</td>
            <td style="text-align: end"> {{ $abnormalities->count() }} </td>
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
                Location</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Opeator</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Worked At</td>
            <td width="20"
                style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #e80607; color:#ffffff;">
                Status</td>

        </tr>
        @foreach($abnormalities as $abnormality)
        <tr>
            <td style="text-align: left;">{{ $loop->iteration }}</td>
            <td>{{ $abnormality->code }}</td>
            <td>{{ $abnormality->created_at }}</td>
            <td>{{ $abnormality->user->name .' / '. $abnormality->user->username }}</td>
            <td>{{ $abnormality->title }}</td>
            <td>{{ $abnormality->description }}</td>
            <td>{{ $abnormality->location }}</td>
            <td>{{ $abnormality->operator }}</td>
            <td>{{ $abnormality->worked_at }}</td>
            <td>{{ $abnormality->status->name }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
