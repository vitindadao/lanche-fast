<x-layouts.app>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detalhes do Produto</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $produto->nome }}</p>
                        <p><strong>Ingredientes:</strong> {{ $produto->ingredientes }}</p>
                        <p><strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                        <p>
                            <strong>Imagem:</strong><br />
                            @if ($produto->imagem)
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-thumbnail" style="max-width: 200px;" />
                            @else
                                <span class="text-muted fst-italic">Sem imagem</span>
                            @endif
                        </p>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
