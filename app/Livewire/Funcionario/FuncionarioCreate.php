<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;

class FuncionarioCreate extends Component
{
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:255|unique:funcionarios,cpf',
        'email' => 'required|email|max:255',
        'senha' => 'required|string|min:6',
    ];

    public function render()
    {
        return view('livewire.funcionario.funcionario-create');
    }

    public function store()
    {
        $this->validate();

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        session()->flash('message', 'Funcionário criado com sucesso.');

        $this->resetInputFields();
        $this->emit('funcionarioCreated');
    }

    public function resetInputFields()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->email = '';
        $this->senha = '';
    }
}
