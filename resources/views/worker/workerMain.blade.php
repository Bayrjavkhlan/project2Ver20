@extends('master')
@section('title', 'Library')

@section('content')

@if ($name == null)
    <h1>Worker Main Please login!!!</h1>
@else
    <h1>Worker Main Logged in {{ $name }} !!!</h1>
@endif

@endsection
