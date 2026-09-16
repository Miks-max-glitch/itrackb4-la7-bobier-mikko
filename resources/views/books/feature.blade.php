@extends('layouts.app')

@section('title', $book['title'])

@section('content')

    <h2>
        {{ $book['title'] }}
    </h2>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
        </tr>
            <tr>
                <td>
                    <a href="{{ route('books.show', $book['id']) }}">{{ $book['id'] }}</a>
                </td>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['author'] }}</td>
                <td>{{ $book['year'] }}</td>
                <td>{{ $book['genre'] }}</td>
            </tr>
    </table>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>

@endsection

