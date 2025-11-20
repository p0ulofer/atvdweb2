@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Detalhes da Editora</h1>
    <p><strong>ID:</strong> {{ $publisher->id }}</p>
    <p><strong>Nome:</strong> {{ $publisher->name }}</p>
    <p><strong>Endereço:</strong> {{ $publisher->address ?? '—' }}</p>
    <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
