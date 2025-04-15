<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;

class FuncionarioEdit extends Component
{
    public $funcionarioId;
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:255|unique:funcionarios,cpf,' . $this->funcionarioId,
            'email' => 'required|email|max:255',
            'senha' => 'nullable|string|min:6',
        ];
    }

    public function mount($funcionario)
    {
        $funcionario = Funcionario::findOrFail($funcionario);
        $this->funcionarioId = $funcionario->id;
        $this->nome = $funcionario->nome;
        $this->cpf = $funcionario->cpf;
        $this->email = $funcionario->email;
        $this->senha = '';
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-edit');
    }

    public function update()
    {
        $this->validate();

        $funcionario = Funcionario::findOrFail($this->funcionarioId);

        $funcionario->nome = $this->nome;
        $funcionario->cpf = $this->cpf;
        $funcionario->email = $this->email;

        if ($this->senha) {
            $funcionario->senha = bcrypt($this->senha);
        }

        $funcionario->save();

        session()->flash('message', 'Funcionário atualizado com sucesso.');
    }
}
