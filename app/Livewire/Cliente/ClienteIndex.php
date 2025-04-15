<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class ClienteIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('cpf', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.cliente.cliente-index', compact('clientes'));
    }

    public function delete($id)
    {
        Cliente::findOrFail($id)->delete();
        session()->flash('message', 'Cliente deletado com sucesso.');
    }
}
