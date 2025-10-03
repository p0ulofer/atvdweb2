<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <h1>Lista de Livros</h1>        
       
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data Lançamento</th>
            <th>Ações</th>
        </tr>

        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->titulo }}</td>
            <td>{{ $book->autor }}</td>
            <td>{{ $book->descricao }}</td>
            <td>{{ $book->valor }}</td>
            <td>{{ $book->data_lancamento }}</td>
            <td>
                <!-- Botão de Visualizar -->
                <a href="{{ route('books.show', $book) }}">
                    Visualizar
                </a>

                <!-- Botão de Editar -->
                <a href="{{ route('books.edit', $book) }}">
                    Editar
                </a>

                <!-- Botão de Excluir -->
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja excluir este livro?')">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>   

    <br>
    <!-- Botão para criar novo livro -->
    <a href="{{ route('books.create') }}">Cadastrar Novo Livro</a>

</body>
</html>
