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
            <li class="drophover"><i class="fa-solid fa-chart-pie"></i><a href="{{route('EmployeeDashboard')}}">Dashbord</a><i id="droparrow" class="fa-solid fa-chevron-down"></i>
        </li>
            <li class="drophover"><i class="fa-solid fa-people-group"></i><a href="{{route('EmployeeProject')}}">Projects</a>
                <div class="content">
                    <a href="{{route('leadingprojects')}}" class="dropdown">Leading Projects</a>
                    <a href="{{route('projectmember')}}" class="dropdown">Project Member</a>
                </div>
            </li>
            <li class="drophover"><i class="fa-solid fa-chart-pie"></i><a href="">Leave</a>
                <div class="content">
                    <a href="{{route('EmployeeLeave')}}" class="dropdown">Apply for New Leave</a>
                    <a href="{{route('LeaveHistory')}}" class="dropdown">Leave History</a>
                </div>
            </li>

            <li><i class="fa-solid fa-chart-pie"></i><a href="{{route('Employeeprofile')}}">Profile</a></li>
            <li><i class="fa-solid fa-right-from-bracket"></i><a href="{{route('Employeelogout')}}">Logout</a></li>
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
            <img src="{{asset('storage/images/'.auth()->guard('Employee')->user()->image)}}" alt="">

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
