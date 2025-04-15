<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithFileUploads;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:1024', // max 1MB
    ];

    public function render()
    {
        return view('livewire.produto.produto-create');
    }

    public function store()
    {
        $this->validate();

        $imagemPath = null;
        if ($this->imagem) {
            $imagemPath = $this->imagem->store('produtos', 'public');
        }

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('message', 'Produto criado com sucesso.');

        $this->resetInputFields();

        // Livewire 3 usa 'dispatch' no lugar de 'emit'
        $this->dispatch('produtoCreated');

        // Redirecionamento usando Livewire 3
        return redirect()->route('produtos.index');
    }

    public function resetInputFields()
    {
        $this->nome = '';
        $this->ingredientes = '';
        $this->valor = '';
        $this->imagem = null;
    }
}