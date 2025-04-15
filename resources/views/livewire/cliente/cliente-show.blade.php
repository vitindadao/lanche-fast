<!-- Font Awesome para os ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

<div style="max-width: 600px; margin: 40px auto; padding: 30px; border-radius: 12px; background-color: #ffffff; box-shadow: 0 8px 16px rgba(0,0,0,0.1); font-family: 'Segoe UI', sans-serif; color: #333;">
    <h1 style="text-align: center; margin-bottom: 25px; color: #2c3e50;">👤 Detalhes do Cliente</h1>
    
    <div style="margin-bottom: 15px;">
        <i class="fas fa-user" style="width: 25px; color: #3498db;"></i>
        <strong>Nome:</strong> {{ $cliente->nome }}
    </div>
    
    <div style="margin-bottom: 15px;">
        <i class="fas fa-map-marker-alt" style="width: 25px; color: #e67e22;"></i>
        <strong>Endereço:</strong> {{ $cliente->endereco }}
    </div>
    
    <div style="margin-bottom: 15px;">
        <i class="fas fa-phone" style="width: 25px; color: #27ae60;"></i>
        <strong>Telefone:</strong> {{ $cliente->telefone }}
    </div>
    
    <div style="margin-bottom: 15px;">
        <i class="fas fa-id-card" style="width: 25px; color: #8e44ad;"></i>
        <strong>CPF:</strong> {{ $cliente->cpf }}
    </div>
    
    <div style="margin-bottom: 10px;">
        <i class="fas fa-envelope" style="width: 25px; color: #c0392b;"></i>
        <strong>Email:</strong> {{ $cliente->email }}
    </div>
</div>
