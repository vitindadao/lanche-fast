<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <h2 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Funcionário</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <div>{{ session('message') }}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" wire:model="nome" class="form-control" />
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" id="cpf" wire:model="cpf" class="form-control" />
                            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" wire:model="email" class="form-control" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha (deixe em branco para manter a senha atual):</label>
                            <input type="password" id="senha" wire:model="senha" class="form-control" />
                            @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-save2 me-1"></i> Atualizar
                            </button>
                            <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
