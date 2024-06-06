@extends('Employee.master')
@section('content')

<h3 class="i-name">Leading Projects</h3>
<table class="leave">
    <thead>
        <tr>
        <th>Project Name</th>
        <th>Domain</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Percentage</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

        @foreach ($leadingprojects as $leadingproject )
         <tr>
            <td>{{$leadingproject->pname}}</td>
            <td>{{$leadingproject->Domain}}</td>
            <td>{{$leadingproject->start_date}}</td>
            <td>{{$leadingproject->end_date}}</td>
            <td @if ($leadingproject->status == '0')
                class="pending"
                @else
                class = "Approved"
            @endif> @if ($leadingproject->status == '0')
                ongoing
                @else
                Completed
            @endif </td>
            <td >{{$leadingproject->percentage}}</td>
            <td><a class="update" href="{{route('updateprojectstatus',$leadingproject->id)}}">Update Details</a></td>
        </tr>
        @endforeach
    </tbody>

 </table>

@endsection
