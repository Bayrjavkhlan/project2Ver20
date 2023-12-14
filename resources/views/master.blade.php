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
    <br>
    <a href="{{url('workerMain')}}">workerMain</a>
    <a href="{{url('workerTest')}}">workerTest</a>
    <a href="{{url('logout')}}">logout</a>
    <br>
    <a href="{{url('user-info')}}">User info</a>
    <a href="{{url('account')}}">Account </a>
    <a href="{{url('searchBook')}}">Search </a>
</div>

@yield('content')

<div>
    &copy; All right reserved.
</div>
{{-- footer end --}}
    </body>
</html>
