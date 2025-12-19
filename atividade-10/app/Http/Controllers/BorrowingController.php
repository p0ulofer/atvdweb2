<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function store(Request $request, Book $book)
{
    $authUser = auth()->user();

    if (!in_array($authUser->role, ['admin', 'bibliotecario'])) {
        abort(403, 'Acesso negado.');
    }

    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    $emprestimosAtivos = Borrowing::where('user_id', $request->user_id)
        ->whereNull('returned_at')
        ->count();

    if ($emprestimosAtivos >= 5) {
        return redirect()->route('books.show', $book)
            ->withErrors(['error' => 'Este usuário já possui 5 livros emprestados.']);
    }

    $emprestimoAberto = Borrowing::where('book_id', $book->id)
        ->whereNull('returned_at')
        ->exists();

    if ($emprestimoAberto) {
        return redirect()->route('books.show', $book)
            ->withErrors(['error' => 'Este livro já está emprestado.']);
    }

    Borrowing::create([
        'user_id' => $request->user_id,
        'book_id' => $book->id,
        'borrowed_at' => now(),
    ]);

    return redirect()->route('books.show', $book)
        ->with('success', 'Empréstimo registrado com sucesso.');
}


    public function returnBook(Borrowing $borrowing)
    {
        $borrowing->update([
            'returned_at' => now(),
        ]);

        return redirect()->route('books.show', $borrowing->book_id)
            ->with('success', 'Devolução registrada com sucesso.');
    }

    public function userBorrowings(User $user)
    {
        $borrowings = $user->books()->withPivot('borrowed_at', 'returned_at')->get();
        return view('users.borrowings', compact('user', 'borrowings'));
    }
}
