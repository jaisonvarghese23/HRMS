@extends('HR.master')
@section('title') Leave
@endsection
@section('content')
<h3 class="i-name">Rejected Leaves</h3>
@if (count($rejectedLeaves)>0)
<table class="leave">
    <thead>
        <tr>
        <th>Name</th>
        <th>No of Days</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Leave Type</th>
        <th>Applied Date</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($rejectedLeaves as $requestLeave )
         <tr>
            <td>{{$requestLeave->user->fname}} {{$requestLeave->user->lname}}</td>
            <td>{{$requestLeave->days}}</td>
            <td>{{$requestLeave->fromdate}}</td>
            <td>{{$requestLeave->todate}}</td>
            <td>{{$requestLeave->leave_type}}</td>
            <td >{{$requestLeave->created_at}}</td>
        </tr>
        @endforeach
    </tbody>

 </table>



@else

<h1 class="nopending">No Rejected Leave Requests</h1>

@endif



@endsection
