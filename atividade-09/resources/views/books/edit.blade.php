@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Livro</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title', $book->title) }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

     
        <div class="mb-3">
            <label for="publisher_id" class="form-label">Editora</label>
            <select class="form-select @error('publisher_id') is-invalid @enderror"
                    id="publisher_id" name="publisher_id" required>
                <option value="" disabled>Selecione uma editora</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}"
                        {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
            @error('publisher_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

      
        <div class="mb-3">
            <label for="author_id" class="form-label">Autor</label>
            <select class="form-select @error('author_id') is-invalid @enderror"
                    id="author_id" name="author_id" required>
                <option value="" disabled>Selecione um autor</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $author->id == $book->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

    
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select @error('category_id') is-invalid @enderror"
                    id="category_id" name="category_id" required>
                <option value="" disabled>Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>


        <div class="mb-3">
            <label for="published_year" class="form-label">Ano de Publicação</label>
            <input type="number"
                   class="form-control @error('published_year') is-invalid @enderror"
                   id="published_year" name="published_year"
                   value="{{ old('published_year', $book->published_year) }}"
                   min="1000" max="{{ date('Y') }}" required>
            @error('published_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

     
        <div class="mb-3 text-center">
            <label class="form-label d-block">Capa Atual</label>

            @if($book->cover && file_exists(public_path('storage/' . $book->cover)))
                <img src="{{ asset('storage/' . $book->cover) }}"
                     alt="Capa do Livro"
                     class="img-thumbnail mb-3"
                     style="max-width: 200px;">
            @else
                <img src="{{ asset('images/default-cover.jpg') }}"
                     alt="Sem capa"
                     class="img-thumbnail mb-3"
                     style="max-width: 200px;">
            @endif
        </div>

    
        <div class="mb-3">
            <label for="cover" class="form-label">Nova Capa (opcional)</label>
            <input type="file"
                   class="form-control @error('cover') is-invalid @enderror"
                   id="cover" name="cover"
                   accept="image/*">
            @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
