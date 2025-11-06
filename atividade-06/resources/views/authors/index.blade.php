@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Autores</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">+ Novo Autor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Nascimento</th><th>Ações</th></tr></thead>
        <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ $author->birth_date ?? '—' }}</td>
                    <td>
                        <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir autor?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Nenhum autor cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
