<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @method('PUT')
    @include('produtos.form', ['buttonLabel' => 'Atualizar', 'produto' => $produto])
</form>

