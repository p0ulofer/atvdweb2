@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Editoras</h1>
    <a href="{{ route('publishers.create') }}" class="btn btn-success mb-3">+ Nova Editora</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Ações</th></tr></thead>
        <tbody>
            @forelse($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->id }}</td>
                    <td>{{ $publisher->name }}</td>
                    <td>{{ $publisher->address ?? '—' }}</td>
                    <td>
                        <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir editora?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhuma editora cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
