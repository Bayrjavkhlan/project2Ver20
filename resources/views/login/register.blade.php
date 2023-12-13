@extends('../master')
@section('title', 'Register')

@section('content')
<h1>Бүртгэл үүсгэх</h1>
<form action="register" method="post">
    @csrf
    Хэрэглэгчийн нэр: <input type="text" name="Uname" value="{{ old('Uname') }}"><br>
    @error('Uname')
        <p>{{$message}}</p>
    @enderror
    Майл хаяг: <input type="text" name="email" value="{{ old('email') }}"><br>
    @error('email')
        <p>{{$message}}</p>
    @enderror
    Нууц үг: <input type="password" name="password"><br>
    @error('password')
        <p>{{$message}}</p>
    @enderror
    Нууц үг давтах: <input type="password" name="password_confirmation"><br>
    {{-- @error('password_confirmation')
        <p>{{$message}}</p>
    @enderror --}}
    <input type="submit" value="Үүсгэх" name="submit">
</form>
@endsection
