<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'birth_date' => 'nullable|date',
        ]);

        Author::create($request->only(['name', 'email', 'birth_date']));

        return redirect()->route('authors.index')->with('success', 'Autor criado com sucesso.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
            'birth_date' => 'nullable|date',
        ]);

        $author->update($request->only(['name', 'email', 'birth_date']));

        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso.');
    }
}
