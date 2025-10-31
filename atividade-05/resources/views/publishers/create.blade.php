@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Editora</h1>
    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
