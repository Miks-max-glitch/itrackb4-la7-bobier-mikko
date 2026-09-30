<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private function books()
    {
        $path = storage_path('app/books.json');

        return json_decode(file_get_contents($path), true);  
        
    }

    private function saveBooks($allBooks)   // <-- parameter must be here
    {
        $path = storage_path('app/books.json');
        file_put_contents($path, json_encode($allBooks, JSON_PRETTY_PRINT));
    }

    public function index(Request $request)
    {
        $genre = $request->query('genre', 'all');
        $year = $request->query('year', 'all');
        
        $allBooks = $this->books();
        $books = [];

        foreach ($allBooks as $book) {
            $matchesGenre = ($genre === 'all' || $book['genre'] === $genre);
            $matchesYear = ($year === 'all' || $book['year'] === $year);
            
            if ($matchesGenre && $matchesYear) {
                $books[] = $book;
            }
        }

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year' => $year,
        ]);
        
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => 'required | max:100',
           'author' => 'required | max:100',
           'year' => 'required |numeric',
           'genre' => 'required|in:Classical,Mystery,Historical',
        ]);
        
        $books = $this->books();

        $newId = empty($books) ? 1 : max(array_column($books, 'id')) + 1;
    
        $validated['id'] = $newId;
        $books[$newId] = $validated;
    
        $this -> saveBooks($books);

        return redirect()
        ->route('books.index')
        ->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $books = $this->books();

        if (!isset($books[$id]))
        {
            abort(404);
        }

        return view('books.show', ['book' => $books[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function feature()
    {
        $books = $this->books();

        return view('books.feature', ['book' => $books[1]]);
    }

    /* public function filter(?string $genre = null)
    {
        $books = $this->books();

        if ($genre) {
            $books = array_filter($books, fn($b) =>
                $b['title'] == $genre ||
                $b['author'] == $genre ||
                $b['genre'] == $genre ||
                $b['year'] == $genre,
            );
        }

        return view('books.filter', [
            'books' => $books,
            'activeFilter' => $genre,
        ]);
    }
    */
}