<div>
    <h1>Criar Produto</h1>

    @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="store">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" wire:model="nome" />
            @error('nome') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" wire:model="ingredientes"></textarea>
            @error('ingredientes') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" wire:model="valor" />
            @error('valor') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" wire:model="imagem" />
            @error('imagem') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('produtos.index') }}">Voltar para lista</a>
</div>
