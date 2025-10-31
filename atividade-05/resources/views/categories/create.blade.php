@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px; margin:50px auto; padding:30px; background-color:#fff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.08);">
    <h1 class="my-4" style="text-align:center; margin-bottom:30px; color:#2c3e50; font-weight:600;">Adicionar Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3" style="margin-bottom:20px;">
            <label for="name" class="form-label" style="font-weight:500; color:#34495e;">Nome</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required
                style="border-radius:8px; padding:10px 14px; transition: all 0.3s ease; border:1px solid #dcdde1;"
                onfocus="this.style.borderColor='#4cd137'; this.style.boxShadow='0 0 6px rgba(76,209,55,0.3)';" 
                onblur="this.style.borderColor='#dcdde1'; this.style.boxShadow='none';"
            >
            @error('name')
                <div class="invalid-feedback" style="font-size:0.875rem;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success" style="border-radius:8px; font-weight:500; padding:10px 20px; display:inline-flex; align-items:center; gap:6px; transition:0.3s; background-color:#4cd137; border-color:#4cd137;">
            <i class="bi bi-save" style="font-size:1.1rem;"></i> Salvar
        </button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="border-radius:8px; font-weight:500; padding:10px 20px; display:inline-flex; align-items:center; gap:6px; transition:0.3s; background-color:#7f8fa6; border-color:#7f8fa6; color:#fff;">
            <i class="bi bi-arrow-left" style="font-size:1.1rem;"></i> Voltar
        </a>
    </form>
</div>
@endsection
