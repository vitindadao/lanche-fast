<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;
use Livewire\WithPagination;

class FuncionarioIndex extends Component
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
        $funcionarios = Funcionario::where('nome', 'like', "%{$this->search}%")
            ->orWhere('cpf', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.funcionario.funcionario-index', compact('funcionarios'));
    }

    public function delete($id)
    {
        Funcionario::findOrFail($id)->delete();
        session()->flash('message', 'Funcionário deletado com sucesso.');
    }
}
