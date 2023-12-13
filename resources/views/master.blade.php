<html>
    <head>
            <title>@yield('title') </title>
    </head>
    <body>
{{-- header start --}}
<div>
    <a href="{{url('/')}}">Logo</a>
    <a href="{{url('login')}}">Login</a>
    <a href="{{url('register')}}">Register</a>
    <a href="{{url('workerLogin')}}">workerLogin</a>
    <a href="{{url('workerMain')}}">workerMain</a>
    <br> <br>
</div>

@yield('content')

<div>
    &copy; All right reserved.
</div>
{{-- footer end --}}
    </body>
</html>
