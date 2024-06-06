<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hrms Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body class="login">
  <form action="{{route('dologin')}}" method="POST">
    @csrf

    <div class="container">
        <i id="avatar" class="fa-solid fa-user-tie"></i>
        @if (@session()->has('message'))
        <p>{{session()->get('message')}}!</p>
        @endif

        <div class="unamebox">
            <i class="fa-solid fa-user-tie"></i>
            <input type="text" name="uname" placeholder="User Name">

        </div>
        <div class="unamebox">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password">

        </div>

        <input type="submit" value="Login">

    </form>
    </div>


</body>
</html>
