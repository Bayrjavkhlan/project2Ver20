@extends('master')
@section('title', 'SearchBook')

@section('content')
<br>
<form action="{{ route('search.books') }}" method="GET">
    @csrf
    <label for="search">Ном Хайх</label>
    <input type="search" name="search" id="search">
    <button type="submit">Хайх</button>
</form>
<br><br>
<hr>

<div>
    <h2>Search Results for "{{ $searchQuery }}"</h2>
    <ul>
        @forelse ($filteredBooks as $book)
            <a href="{{ route('book.details', ['id' => $book->id]) }}">
                <li>
                    <strong>Нэр:</strong> {{ $book->title }} <br>
                    <strong>Зохиолч:</strong> {{ $book->author }} <br>
                    <br>
                </li>
            </a>
        @empty
            <p>No books found for "{{ $searchQuery }}"</p>
        @endforelse
    </ul>
</div>
@endsection
