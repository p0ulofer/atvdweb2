<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="my-4">Adicionar Autor</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div >
            <label for="titulo" >Nome do produto</label>
            <input type="text" id="titulo" name="titulo" required>            
        </div>
        <div >
            <label for="autor" >Autor: </label>
            <input type="text" id="autor" name="autor" required>            
        </div>

        <div >
            <label for="descricao" >Descrição do Livro: </label>
            <input type="text" id="descricao" name="descricao" required>            
        </div>

        <div >
            <label for="valor" >Valor: </label>
            <input type="number" id="valor" name="valor" required>            
        </div>

        <div >
            <label for="data_lancamento" >Data de Lançamento: </label>
            <input type="date" id="data_lancamento" name="data_lancamento" required>            
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Salvar
        </button>
        
    </form>
</body>
</html>