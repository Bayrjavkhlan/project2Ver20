@extends('master')

@section('title', 'Login')

@section('content')
    <h1>Нэвтрэх</h1>
    <form action="login" method="post">
        @csrf
        Майл хаяг: <input type="text" name="email"><br>
        @error('email')
            <p>{{$message}}</p>
        @enderror
        Нууц үг: <input type="text" name="password"><br>
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <input type="submit" value="Нэвтрэх" name="submit">
    </form>
@endsection
