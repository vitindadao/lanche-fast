<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProdutoEdit extends Component
{
    use WithFileUploads;

    public $produtoId;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $newImagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'valor' => 'required|numeric|min:0',
        'newImagem' => 'nullable|image|max:1024', // max 1MB
    ];

    public function mount($id)
    {
        $produto = Produto::findOrFail($id);
        $this->produtoId = $produto->id;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
        $this->imagem = $produto->imagem;
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }

    public function update()
    {
        $this->validate();

        $produto = Produto::findOrFail($this->produtoId);

        $imagemPath = $produto->imagem;

        if ($this->newImagem) {
            if ($imagemPath && Storage::disk('public')->exists($imagemPath)) {
                Storage::disk('public')->delete($imagemPath);
            }
            $imagemPath = $this->newImagem->store('produtos', 'public');
        }

        $produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('message', 'Produto atualizado com sucesso.');
    }
}
