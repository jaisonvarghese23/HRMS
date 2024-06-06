
@extends('HR.master')
@section('title') Dashboard
@endsection
@section('content')



        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <a href="{{route('department')}}"><div class="val-box">
                <i class="fa-solid fa-building"></i>
                <div>
                    <h3>{{$deptcount}}</h3>
                    <span>Departments</span>
                </div>
            </div></a>
            <a href="{{route('designation')}}"><div class="val-box">
                <i class="fa-brands fa-dropbox"></i>
                <div>
                    <h3>{{$desgcount}}</h3>
                    <span>Designations</span>

                </div>
            </div>
        </a>
            <div class="val-box">
                <i class="fa fa-users"></i>
                <div>
                    <h3>{{$employee_count}}</h3>
                    <span>Employees</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fa-solid fa-globe"></i>
                <div>
                    <h3>{{$pendingleavecount}}</h3>
                    <span>Leave Requests</span>
                </div>
            </div>
        </div>
        <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Name</td>
                            <td>Title</td>
                            <td>Status</td>
                            <td>Department</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)


                        <tr>
                            <td >
                                <img src="{{asset('storage/images/'.$employee->image)}}" alt="">
                                </td>
                                <td>
                                  <span class="head">{{$employee->fname}} {{$employee->lname}}</span>  <br>
                                   <span class="role">{{$employee->email}}</span>
                            </td>
                            <td>
                                <span class="head">{{$employee->role}}</span>   <br>
                              <span class="role"> Web dev</span>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>{{$employee->department}}</p></td>
                            <td class="edit"><a href="{{route('viewEmployee',$employee->id)}}">View</a></td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>

        </div>

        </secton>


@endsection
