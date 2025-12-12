@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Detalhes do Autor</h1>
    <p><strong>ID:</strong> {{ $author->id }}</p>
    <p><strong>Nome:</strong> {{ $author->name }}</p>
    <p><strong>Email:</strong> {{ $author->email }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $author->birth_date ?? '—' }}</p>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
