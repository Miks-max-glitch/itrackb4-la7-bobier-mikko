@php
    $isFeature = request()->is('books/feature');
    $isFilter  = request()->is('books/filter*');
    $isBooks   = request()->is('books', 'books/*') && !$isFeature && !$isFilter;
@endphp

<nav class="mb-3">
    <a href="{{ route('books.index') }}"
       class="btn btn-sm {{ $isBooks ? 'btn-primary' : 'btn-secondary' }}">
        All Books
    </a>
    <a href="{{ route('books.feature') }}"
       class="btn btn-sm {{ $isFeature ? 'btn-primary' : 'btn-secondary' }}">
        Featured
    </a>
    <a href="{{ route('books.filter') }}"
       class="btn btn-sm {{ $isFilter ? 'btn-primary' : 'btn-secondary' }}">
        Filter
    </a>
</nav>