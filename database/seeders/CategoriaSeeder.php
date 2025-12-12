<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nome' => 'Alimentos',
                'descricao' => 'Campanhas de arrecadação de alimentos não perecíveis e cestas básicas',
                'icone' => '🍎',
                'cor' => '#FF6B6B',
                'ativo' => true,
            ],
            [
                'nome' => 'Roupas',
                'descricao' => 'Doação de roupas, calçados e agasalhos',
                'icone' => '👕',
                'cor' => '#4ECDC4',
                'ativo' => true,
            ],
            [
                'nome' => 'Livros',
                'descricao' => 'Arrecadação de livros e material escolar',
                'icone' => '📚',
                'cor' => '#95E1D3',
                'ativo' => true,
            ],
            [
                'nome' => 'Brinquedos',
                'descricao' => 'Doação de brinquedos para crianças',
                'icone' => '🧸',
                'cor' => '#F38181',
                'ativo' => true,
            ],
            [
                'nome' => 'Sangue',
                'descricao' => 'Campanhas de doação de sangue',
                'icone' => '🩸',
                'cor' => '#E53935',
                'ativo' => true,
            ],
            [
                'nome' => 'Dinheiro',
                'descricao' => 'Arrecadação de doações em dinheiro',
                'icone' => '💰',
                'cor' => '#4CAF50',
                'ativo' => true,
            ],
            [
                'nome' => 'Outros',
                'descricao' => 'Outras campanhas solidárias diversas',
                'icone' => '🤝',
                'cor' => '#AA96DA',
                'ativo' => true,
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
