<html>
<head></head>
<body>
    <h1>Editar Produto</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        
            
        <div >
            <label for="titulo" >Titulo do Livro</label>
            <input type="text" id="titulo" name="titulo" valor="{{ $book->titulo }}" required>            
        </div>
        <div >
            <label for="autor" >Nome do Autor</label>
            <input type="text" id="autor" name="autor" valor="{{ $book->autor }}" required>            
        </div>
        <div >
        <div >
            <label for="descricao" >Descrição do Livro: </label>
            <input type="text" id="descricao" name="descricao" valor="{{ $book->descricao }}" required>            
        </div>

        <div >
            <label for="valor" >Valor do produto: </label>
            <input type="number" id="valor" name="valor" valor="{{ $book->valor }}" required>            
        </div>

        <div >
            <label for="data_lancamento" >Data de Lançamento: </label>
            <input type="date" id="data_lancamento" name="data_lancamento" valor="{{ $book->data_lancamento }}" required>            
        </div>

    
        <button type="submit"> Atualizar </button>
        
    </form>
</div>
 
</body>
</html>