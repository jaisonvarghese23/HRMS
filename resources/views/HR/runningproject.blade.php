@extends('HR.master')
@section('content')
<h3 class="i-name">Running Projects</h3>

<div class="projects">

    <table>

    <thead>
        <tr>
            <td>Project Title </td>
            <td>Domain</td>
            <td>Status</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>

            @foreach ($projects as $project )
            <tr>
                <td>{{$project->pname}}</td>
                <td>{{$project->Domain}}</td>
                <td>{{$project->status}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>

            <td><a href=""><i id="edit" class="fa-solid fa-pen-to-square"></i></a><a href=""><i  id="delete" class="fa-solid fa-trash"></i></a></td>
        </tr>
            @endforeach



    </tbody>


    </table>



</div>


@endsection
