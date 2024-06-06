<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HRMS @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
</head>
<body>
    <section id="menu">

        <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="">
                <h2>HRMS</h2>
                <i id="close" class="fa fa-close"></i>
        </div>
        <div class="items">
            <li class="drophover"><i class="fa-solid fa-chart-pie"></i><a href="{{route('Dashboard')}}">Dashbord</a><i id="droparrow" class="fa-solid fa-chevron-down"></i>
            <div class="content">
                <a href="{{route('department')}}" class="dropdown">Departments</a>
                <a href="{{route('designation')}}" class="dropdown">Designations</a>
            </div>
        </li>
            <li><i class="fa-solid fa-people-group"></i><a href="{{route('Recruitment')}}">Recruitment</a></li>
            <li class="drophover"><i class="fa-solid fa-list-check"></i><a href="">Projects</a>
                <div class="content">
                    <a href="{{route('createProject')}}" class="dropdown">Create New Project</a>
                    <a href="{{route('projects')}}" class="dropdown">Completed Projects</a>
                    <a href="{{route('runningProjects')}}" class="dropdown">Running Projects</a>
                </div>
            </li>
            <li class="drophover"><i class="fa-solid fa-person-through-window"></i><a href="{{route('HrLeave')}}">Leave</a>
                <div class="content">
                    <a href="{{route('HrLeave')}}" class="dropdown">Leave Requests</a>
                    <a href="{{route('approvedLeaves')}}" class="dropdown">Approved Leaves</a>
                    <a href="{{route('rejectedLeaves')}}" class="dropdown">Rejected Leaves</a>
                </div>
            </li>
            <li  class="drophover"><i class="fa-solid fa-clipboard-user"></i><a href="{{route('attendance')}}">Attendance</a>
                <div class="content">
                    <a href="{{route('FullAttendance')}}" class="dropdown">Full Attendance</a>
                </div>
            </li>
            <li><i class="fa-solid fa-address-card"></i><a href="{{route('profile')}}">Profile</a></li>
            <li><i class="fa-solid fa-right-from-bracket"></i><a href="{{route('logout')}}">Logout</a></li>
        </div>
</section>
<secton id="interface">

    <div class="navigation">
        <div class="n1">
            <div>
                <i id="menu-btn" class="fa fa-bars"></i>
            </div>
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="profile">
            <i class="fa fa-bell"></i>
            <img src="{{asset('storage/images/'.auth()->user()->image)}}" alt="">

        </div>
    </div>
    @yield('content')
    <script>
        $('#menu-btn').click(function(){

            $('#menu').toggleClass("active");
        })
        $('#close').click(function(){

    $('#menu').toggleClass("active");
    })
    </script>

</body>
</html>
