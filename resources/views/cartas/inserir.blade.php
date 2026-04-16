<h1>Cartas</h1>

<form action="{{ route('cartas.gravar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <br>
    <select name="tipo">
        <option value="fogo">Fogo</option>
        <option value="elétrico">Elétrico</option>
    </select>
    <br>
    <input type="text" name="numero" placeholder="Número">
    <br>
    <input type="file" name="foto">
    <br>
    <input type="submit" value="Gravar">
</form>