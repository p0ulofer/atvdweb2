@extends('layouts.app')

@section('content')
<div class="container" style="max-width:900px; margin:50px auto; padding:40px; background-color:#fff; border-radius:16px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
    <h1 style="text-align:center; margin-bottom:40px; color:#2c3e50; font-weight:700; font-size:2rem;">Lista de Categorias</h1>

    <div style="margin-bottom:30px; text-align:right;">
        <a href="{{ route('categories.create') }}" class="btn btn-success" style="border-radius:10px; font-weight:600; padding:12px 24px; display:inline-flex; align-items:center; gap:8px; transition:0.3s; background-color:#4cd137; border-color:#4cd137;">
            <i class="bi bi-plus" style="font-size:1.2rem;"></i> Adicionar Categoria
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="border-radius:10px; padding:15px; font-weight:500; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x:auto;">
        <table class="table table-striped" style="border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
            <thead style="background-color:#f1f2f6; color:#2c3e50; font-weight:600;">
                <tr>
                    <th style="width:60px;">#</th>
                    <th>Nome</th>
                    <th style="width:350px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td style="display:flex; gap:6px; flex-wrap:wrap;">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm" style="border-radius:8px; padding:6px 12px; display:inline-flex; align-items:center; gap:4px; background-color:#3498db; border-color:#3498db; color:#fff;">
                                <i class="bi bi-eye" style="font-size:1rem;"></i> Visualizar
                            </a>

                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm" style="border-radius:8px; padding:6px 12px; display:inline-flex; align-items:center; gap:4px; background-color:#2f80ed; border-color:#2f80ed; color:#fff;">
                                <i class="bi bi-pencil" style="font-size:1rem;"></i> Editar
                            </a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esta categoria?')" style="border-radius:8px; padding:6px 12px; display:inline-flex; align-items:center; gap:4px; background-color:#e84118; border-color:#e84118; color:#fff;">
                                    <i class="bi bi-trash" style="font-size:1rem;"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center; padding:20px; color:#7f8fa6;">Nenhuma categoria encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
