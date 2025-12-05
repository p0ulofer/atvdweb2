@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Livros</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Botões de criação: só ADMIN e BIBLIOTECÁRIO --}}
    @if(in_array(auth()->user()->role, ['admin', 'bibliotecario']))
        <a href="{{ route('books.create.id') }}" class="btn btn-success mb-3">Adicionar Livro (Com ID)</a>
        <a href="{{ route('books.create.select') }}" class="btn btn-primary mb-3">Adicionar Livro (Com Select)</a>
    @endif

   <table class="table table-striped">
    <thead>
        <tr>
            <th>Capa</th>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $book)
            <tr>
                <td>
                    <img 
                        src="{{ $book->cover ? asset('storage/' . $book->cover) : asset('images/default-cover.jpg') }}" 
                        alt="Capa"
                        width="70"
                        height="100"
                        style="object-fit: cover;"
                    >
                </td>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>

                    {{-- Todos podem visualizar --}}
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Visualizar</a>

                    {{-- Somente ADMIN e BIBLIOTECÁRIO podem editar/excluir --}}
                    @if(in_array(auth()->user()->role, ['admin', 'bibliotecario']))
                        
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Editar</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este livro?')">
                                Deletar
                            </button>
                        </form>
                    @endif

                </td>
            </tr>
        @empty
            <tr><td colspan="5">Nenhum livro encontrado.</td></tr>
        @endforelse
    </tbody>
</table>

    <div class="d-flex justify-content-center">{{ $books->links() }}</div>
</div>
@endsection
