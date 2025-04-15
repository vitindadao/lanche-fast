<div>
    <h1>Editar Produto</h1>

    @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update">
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
            <label>Imagem Atual:</label><br />
            @if ($imagem)
                <img src="{{ asset('storage/' . $imagem) }}" alt="{{ $nome }}" width="100" />
            @else
                Sem imagem
            @endif
        </div>

        <div>
            <label for="newImagem">Nova Imagem:</label>
            <input type="file" id="newImagem" wire:model="newImagem" />
            @error('newImagem') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('produtos.index') }}">Voltar para lista</a>
</div>
