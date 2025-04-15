<x-layouts.app>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-box-seam text-primary"></i>
                <h3 class="mb-0">Produtos</h3>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <input type="text" wire:model="search" placeholder="Buscar produtos..." class="form-control" />
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Ingredientes</th>
                                <th>Valor</th>
                                <th>Imagem</th>
                                <th>Ações</th>
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
                                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <!-- Botão de confirmação de deletar -->
                                        <button
                                            x-on:click.prevent="$dispatch('confirm-delete', { id: {{ $produto->id }} })"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    {{ $produtos->links() }}
                </div>

                <a href="{{ route('produtos.create') }}" class="btn btn-primary mt-3">Criar Novo Produto</a>
            </div>
        </div>
    </div>

    <!-- Mostrar a mensagem de sucesso -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</x-layouts.app>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('confirmDelete', () => ({
            init() {
                window.addEventListener('confirm-delete', (event) => {
                    if (confirm('Tem certeza que deseja apagar este produto?')) {
                        Livewire.emit('delete', event.detail.id);
                    }
                });
            }
        }))
    })
</script>
