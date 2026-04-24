<h1>Cartas (Editar)</h1>

<form action="{{ route('cartas.atualizar', $carta->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nome" placeholder="Nome" value="{{ $carta->nome }}">
    <br>
    <select name="tipo">
        <option value="fogo" {{ $carta->tipo === 'fogo' ? 'selected' : '' }}>Fogo</option>
        <option value="elétrico" {{ $carta->tipo === 'elétrico' ? 'selected' : '' }}>Elétrico</option>
    </select>
    <br>
    <input type="text" name="numero" placeholder="Número" value="{{ $carta->numero }}">
    <br>
    <input type="file" name="foto">
    <br>
    <input type="submit" value="Editar">
</form>