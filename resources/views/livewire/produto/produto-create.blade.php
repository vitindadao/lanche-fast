<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Criar Produto</h2>
                </div>
                <div class="card-body">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" wire:model="nome" class="form-control" />
                            @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ingredientes" class="form-label">Ingredientes:</label>
                            <textarea id="ingredientes" wire:model="ingredientes" class="form-control"></textarea>
                            @error('ingredientes') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <input type="number" step="0.01" id="valor" wire:model="valor" class="form-control" />
                            @error('valor') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem:</label>
                            <input type="file" id="imagem" wire:model="imagem" class="form-control" />
                            @error('imagem') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>

                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar para lista</a>

                </div>
            </div>
        </div>
    </div>
</div>
