@extends('master')
@section('title', 'User Info')

@section('content')

<div>
    <h2>Хэрэглэгчийн мэдээлэл</h2>

    @if ($result->isEmpty())
        <p>Хэрэглэгчийн мэдээлэл олдсонгүй?</p>
    @else
        <p><strong>ID:</strong> {{ $result[0]->id }}</p>
        <p><strong>Нэр:</strong> {{ $result[0]->name }}</p>
        <p><strong>Майл хаяг:</strong> {{ $result[0]->email }}</p>
        <p><strong>Аккаунь ID:</strong> {{ $result[0]->accountid }}</p>
        <p><strong>Эхний нэр:</strong> {{ $result[0]->firstname }}</p>
        <p><strong>Сүүлйин нэр:</strong> {{ $result[0]->lastname }}</p>
        <p><strong>хаяг:</strong> {{ $result[0]->address }}</p>
        <p><strong>Утас:</strong> {{ $result[0]->phoneNumber }}</p>
        <p><strong>Регистрийн дугаар:</strong> {{ $result[0]->register }}</p>
    @endif

</div>

@endsection
