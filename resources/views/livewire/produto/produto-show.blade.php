<div>
    <h1>Detalhes do Produto</h1>

    <p><strong>Nome:</strong> {{ $produto->nome }}</p>
    <p><strong>Ingredientes:</strong> {{ $produto->ingredientes }}</p>
    <p><strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
    <p>
        <strong>Imagem:</strong><br />
        @if ($produto->imagem)
            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" width="150" />
        @else
            Sem imagem
        @endif
    </p>

    <a href="{{ route('produtos.index') }}">Voltar para lista</a>
    <a href="{{ route('produtos.edit', $produto->id) }}">Editar Produto</a>
</div>
