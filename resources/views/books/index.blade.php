@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                            {{ $loop->iteration }}
                        </a>
                    </td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.filter', ['genre' => $book['genre']]) }}">
                            {{ $book['genre'] }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Books Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection