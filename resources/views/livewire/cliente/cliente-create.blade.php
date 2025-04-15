<div>
    <form wire:submit.prevent="store" class="max-w-lg mx-auto p-4 bg-white rounded shadow">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-4">
            <label for="nome" class="block font-medium text-gray-700">Nome</label>
            <input type="text" id="nome" wire:model="nome" class="w-full border rounded p-2" />
            @error('nome') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="endereco" class="block font-medium text-gray-700">Endereço</label>
            <input type="text" id="endereco" wire:model="endereco" class="w-full border rounded p-2" />
            @error('endereco') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="telefone" class="block font-medium text-gray-700">Telefone</label>
            <input type="text" id="telefone" wire:model="telefone" class="w-full border rounded p-2" />
            @error('telefone') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="cpf" class="block font-medium text-gray-700">CPF</label>
            <input type="text" id="cpf" wire:model="cpf" class="w-full border rounded p-2" />
            @error('cpf') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email" class="w-full border rounded p-2" />
            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="senha" class="block font-medium text-gray-700">Senha</label>
            <input type="password" id="senha" wire:model="senha" class="w-full border rounded p-2" />
            @error('senha') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Criar Cliente
        </button>
    </form>
</div>
