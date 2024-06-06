@extends('Employee.master')
@section('content')

<h3 class="i-name">Leave History</h3>


 <table class="leave">
    <thead>
        <tr>
        <th>start Date</th>
        <th>End Date</th>
        <th>Leave Type</th>
        <th>Status</th>
        <th>Applied Date</th>
        <th>Hr Reason</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($leaves as $leave )
         <tr>
            <td>{{$leave->fromdate}}</td>
            <td>{{$leave->todate}}</td>
            <td>{{$leave->leave_type}}</td>
            <td @if ($leave->status == 'pending')
                class="pending"
                @elseif ($leave->status == 'Approved')
                class="Approved"
                @else
                class = "Rejected"
            @endif>{{$leave->status}}</td>
            <td >{{$leave->created_at}}</td>
            <td>{{$leave->reason}}</td>
        </tr>
        @endforeach
    </tbody>

 </table>





@endsection
