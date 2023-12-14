@extends('master')
@section('title', 'Library')

@section('content')


<div>
    <h2>Ном:</h2>
    <ul>
        @foreach ($bookMains as $bookMain)
        <a href="{{ route('book.details', ['id' => $bookMain->id]) }}">
            <li>
                <strong>Нэр:</strong> {{ $bookMain->title }} <br>
                <strong>Зохиолч:</strong> {{ $bookMain->author }} <br>
                <br>
            </li>
        </a>
        @endforeach
    </ul>
</div>


@endsection
