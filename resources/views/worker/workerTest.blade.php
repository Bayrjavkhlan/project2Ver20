@extends('master')
@section('title', 'workertest')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')

@if ($session == null)
    <h1>Worker Test Please login!!!</h1>
@else
    <h1>Worker Test Logged in {{ $session }} !!!</h1>
@endif
@endsection
