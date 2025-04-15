<x-layouts.app>
    <div class="container mt-5">
        <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
            <i class="bi bi-box-seam text-green-600"></i>
            Lista de Produtos
        </h1>

        <input type="text" wire:model="search" placeholder="Buscar produtos..." class="form-control mb-4" />

        <table class="table table-striped table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>Nome</th>
         </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->ingredientes }}</td>
                        <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>
                            @if ($produto->imagem)
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-thumbnail" style="max-width: 60px;" />
                            @else
                                <span class="text-muted fst-italic">Sem imagem</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-success" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button wire:click="delete({{ $produto->id }})" onclick="confirm('Tem certeza?') || event.stopImmediatePropagation()" class="btn btn-sm btn-outline-danger" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $produtos->links() }}

        <a href="{{ route('produtos.create') }}" class="btn btn-success mt-3">Criar Novo Produto</a>
    </div>
</x-layouts.app>
