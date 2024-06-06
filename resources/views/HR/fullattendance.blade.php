@extends('HR.master')
@section('content')
<h3 class="i-name">Full Attendance</h3>
@if (count($attendances)>0)
<table class="leave">
    <thead>
        <tr>
        <th width="60px">Attendance Id</th>
        <th>Name</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($attendances as $attendance )
         <tr>
            <td>{{$attendance->id}}</td>
            <td>{{$attendance->employee->fname}} {{$attendance->employee->lname}}</td>
            <td>{{$attendance->attendance_date}}</td>
            <td>{{$attendance->status}}</td>
        </tr>
        @endforeach
    </tbody>

 </table>



@else

<h1 class="nopending">No Rejected Leave Requests</h1>

@endif




@endsection
