<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Detalhes do Funcionário</h2>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <strong>Nome:</strong>
                        <p>{{ $funcionario->nome }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>CPF:</strong>
                        <p>{{ $funcionario->cpf }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p>{{ $funcionario->email }}</p>
                    </div>

                    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary me-2">Voltar para lista</a>
                    <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-primary">Editar Funcionário</a>

                </div>
            </div>
        </div>
    </div>
</div>
