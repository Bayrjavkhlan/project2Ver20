@extends('master')
@section('title', 'Book Details')

@section('content')
    @if(count($bookDetails) == 0)
        <h2>Одоогоор Түрээслэх боломжтой ном алга байна.</h2>
    @else
        <h2>Номны дэлгэрэнгүй мэдээлэл:</h2>
        @foreach ($bookDetails as $bookDetail)
            <div>
                <strong>ID:</strong> {{ $bookDetail->id }} <br>
                <strong>ISBN:</strong> {{ $bookDetail->isbn }} <br>
                <strong>Нэр:</strong> {{ $bookDetail->title }} <br>
                <strong>Зохиолч:</strong> {{ $bookDetail->author }} <br>
                <strong>Ерөнхий:</strong> {{ $bookDetail->description }} <br>
                <strong>Tөрөл:</strong> {{ $bookDetail->type }} <br>
                <strong>Tоо ширхэг:</strong> {{ $bookDetail->total_quantity }} <br>
                <strong>Төлөв:</strong> {{ $bookDetail->status }} <br>
                <a href="{{ $bookDetail->id }}"><button>Түрээслэх</button></a> 
                {{-- <strong>Extend Status:</strong> {{ $bookDetail->extend_status }} <br> --}}
                {{-- <strong>Created at:</strong> {{ $bookDetail->created_at }} <br> --}}
                {{-- <strong>Updated at:</strong> {{ $bookDetail->updated_at }} <br> --}}
                <hr>
            </div>
        @endforeach
    @endif
@endsection
