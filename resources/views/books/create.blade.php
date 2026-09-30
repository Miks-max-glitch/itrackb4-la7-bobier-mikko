@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Create Book</h3>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" value="{{ old('year') }}">
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select">
                        <option value="">Choose a genre</option>
                        <option value="Classical" {{ old('genre') === 'Classical' ? 'selected' : '' }}>Classical</option>
                        <option value="Mystery" {{ old('genre') === 'Mystery' ? 'selected' : '' }}>Mystery</option>
                        <option value="Historical" {{ old('genre') === 'Historical' ? 'selected' : '' }}>Historical</option>
                    </select>
                    @error('genre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>
@endsection