<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class ClienteEdit extends Component
{
    public $clienteId;
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
        'senha' => 'nullable|string|min:6',
    ];

    public function mount(Cliente $cliente)
    {
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->endereco = $cliente->endereco;
        $this->telefone = $cliente->telefone;
        $this->cpf = $cliente->cpf;
        $this->email = $cliente->email;
        $this->senha = null;
    }

    public function render()
    {
        return view('livewire.cliente.cliente-edit');
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'senha' => 'nullable|string|min:6',
        ]);

        $cliente = Cliente::findOrFail($this->clienteId);
        $cliente->nome = $this->nome;
        $cliente->endereco = $this->endereco;
        $cliente->telefone = $this->telefone;
        $cliente->cpf = $this->cpf;
        $cliente->email = $this->email;
        if ($this->senha) {
            $cliente->senha = bcrypt($this->senha);
        }
        $cliente->save();

        session()->flash('message', 'Cliente atualizado com sucesso.');

        $this->dispatch('clienteUpdated');

        return redirect()->route('clientes.index');
    }
}
