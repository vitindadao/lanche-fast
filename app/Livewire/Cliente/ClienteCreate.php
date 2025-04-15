<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class ClienteCreate extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
        'cpf' => 'required|string|max:14|unique:clientes,cpf',
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:6',
    ];

    public function render()
    {
        return view('livewire.cliente.cliente-create');
    }

    public function store()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        session()->flash('message', 'Cliente criado com sucesso.');

        $this->resetInputFields();

        $this->dispatch('clienteCreated');

        return redirect()->route('clientes.index');
    }

    public function resetInputFields()
    {
        $this->nome = '';
        $this->endereco = '';
        $this->telefone = '';
        $this->cpf = '';
        $this->email = '';
        $this->senha = '';
    }
}
