@extends('../master')
@section('title', 'WorkerLogin')

@section('content')
<h1>Ажилчин нэвтрэх хэсэг</h1>
<form action="workerLogin" method="post">
    @csrf
    Майл хаяг: <input type="text" name="email"><br>
    @error('email')
        <p>{{$message}}</p>
    @enderror
    Нууц үг: <input type="text" name="password"><br>
    @error('password')
        <p>{{$message}}</p>
    @enderror
    <input type="submit" value="submit" name="submit">
</form>
@endsection