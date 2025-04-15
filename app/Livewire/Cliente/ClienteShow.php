<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class ClienteShow extends Component
{
    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function render()
    {
        return view('livewire.cliente.cliente-show');
    }
}
