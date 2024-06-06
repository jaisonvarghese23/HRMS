
@extends('Employee.master')
@section('content')

<h3 class="i-name">Employee Dashboard</h3>

        <div class="values">

            <a><div class="val-box">
                <i class="fa fa-users"></i>
                <div>
                    <h3>{{$leadingprojectCount}}</h3>
                    <span>Leading Projects</span>

                </div>
            </div>
        </a>
            <div class="val-box">
                <i class="fa fa-users"></i>
                <div>
                    <h3>{{$pmember}}</h3>
                    <span>project Member</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fa fa-users"></i>
                <div>
                    <h3>{{$leavecount}}</h3>
                    <span>This Month Leave</span>
                </div>
            </div>
            <a><div class="val-box">
                <i class="fa fa-users"></i>
                <div>
                    <h3>{{auth()->guard('Employee')->user()->department}}</h3>
                    <span>Department</span>
                </div>
            </div></a>
        </div>


        </secton>


@endsection

