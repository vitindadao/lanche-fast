<x-layouts.app>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-person-badge text-primary"></i>
                <h3 class="mb-0">Funcionários</h3>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <input type="text" wire:model="search" placeholder="Buscar funcionários..." class="form-control" />
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <td>{{ $funcionario->nome }}</td>
                                    <td>{{ $funcionario->cpf }}</td>
                                    <td>{{ $funcionario->telefone }}</td>
                                    <td>{{ $funcionario->endereco }}</td>
                                    <td>
                                        <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button wire:click="delete({{ $funcionario->id }})" onclick="confirm('Tem certeza?') || event.stopImmediatePropagation()" class="btn btn-sm btn-outline-danger" title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    {{ $funcionarios->links() }}
                </div>

                <a href="{{ route('funcionarios.create') }}" class="btn btn-primary mt-3">Criar Novo Funcionário</a>
            </div>
        </div>
    </div>
</x-layouts.app>
