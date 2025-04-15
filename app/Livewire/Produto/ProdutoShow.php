<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;

class ProdutoShow extends Component
{
    public $produto;

    public function mount($id)
    {
        $this->produto = Produto::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.produto.produto-show');
    }
}
