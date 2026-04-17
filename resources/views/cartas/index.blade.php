<h1>Cartas</h1>

<div>
    <a href="{{ route('cartas.inserir') }}">➕ Adicionar Carta</a>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Número</th>
            <th>Tipo</th>
            <th>Foto</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        @foreach ($cartas as $carta)
        <tr>
            <td>{{ $carta['id'] }}</td>
            <td>{{ $carta['nome'] }}</td>
            <td>{{ $carta['numero'] }}</td>
            <td><img src="{{ asset('storage/energias/'.$carta['tipo'].'.png') }}" width="22"></td>
            <td><img src="{{ asset('storage/'.$carta['foto']) }}" width="40"></td>
            <td>
                <a href="{{ route('cartas.editar', $carta['id']) }}">✏️</a>
            </td>
            <td>
                <a href="{{ route('cartas.excluir', $carta['id']) }}">🗑️</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>