<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nome' => 'Cliente Exemplo',
            'endereco' => 'Rua Exemplo, 123',
            'telefone' => '11999999999',
            'cpf' => '12345678901',
            'email' => 'cliente@example.com',
            'senha' => bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome' => 'Cliente Exemplo2',
            'endereco' => 'Rua Exemplo2, 123',
            'telefone' => '21999999999',
            'cpf' => '22345678901',
            'email' => 'cliente2@example.com',
            'senha' => bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome' => 'Cliente Exemplo3',
            'endereco' => 'Rua Exemplo3, 123',
            'telefone' => '31999999999',
            'cpf' => '32345678901',
            'email' => 'cliente3@example.com',
            'senha' => bcrypt('senha123'),
        ]);

        //Cliente::factory()->count(10)->create();
    }
}