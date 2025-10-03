<html>
<head></head>
<body>
    
    <h1 >Detalhes do Produto</h1>        
        <div >
            <p><strong>ID:</strong> {{ $book->id }}</p>
            <p><strong>Nome:</strong> {{ $book->name }}</p>
            <p><strong>Descrição:</strong> {{ $book->description }}</p>
            <p><strong>Valor:</strong> {{ $book->value }}</p> 
            <p><strong>Validade:</strong> {{ $book->expiration_date }}</p>
            <p><strong>Estoque:</strong> {{ $book->stock }}</p>
        </div>
    </div>    
</div>
</body>
</html>