@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Livros</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('books.create.id') }}" class="btn btn-success mb-3">Adicionar Livro (Com ID)</a>
    <a href="{{ route('books.create.select') }}" class="btn btn-primary mb-3">Adicionar Livro (Com Select)</a>

    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Título</th><th>Autor</th><th>Ações</th></tr></thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este livro?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum livro encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">{{ $books->links() }}</div>
</div>
@endsection
