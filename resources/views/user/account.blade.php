@extends('master')
@section('title', 'Account')

@section('content')
<h2>Account</h2>

@if ($acc)
    <p><strong>Account ID:</strong> {{ $acc->id }}</p>
    <p><strong>Үлдэгдэл:</strong> {{ $acc->balance }}</p>
    <p><strong>Торгууль:</strong> {{ $acc->penalty }}</p>
@else
    <p>Аккаунт олдсонгүй?</p>
@endif

@endsection
