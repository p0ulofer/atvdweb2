@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Autor</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
