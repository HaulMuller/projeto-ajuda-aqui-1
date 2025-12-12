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
                'nome' => 'Alimentação',
                'descricao' => 'Campanhas de arrecadação de alimentos não perecíveis e cestas básicas',
                'icone' => '🍎',
                'cor' => '#FF6B6B',
                'ativo' => true,
            ],
            [
                'nome' => 'Vestuário',
                'descricao' => 'Doação de roupas, calçados e agasalhos',
                'icone' => '👕',
                'cor' => '#4ECDC4',
                'ativo' => true,
            ],
            [
                'nome' => 'Saúde',
                'descricao' => 'Campanhas relacionadas à saúde e doação de sangue',
                'icone' => '🩺',
                'cor' => '#E53935',
                'ativo' => true,
            ],
            [
                'nome' => 'Educação',
                'descricao' => 'Arrecadação de material escolar e ações educativas',
                'icone' => '📚',
                'cor' => '#4CAF50',
                'ativo' => true,
            ],
            [
                'nome' => 'Livros',
                'descricao' => 'Doação de livros e material de leitura',
                'icone' => '📖',
                'cor' => '#9C27B0',
                'ativo' => true,
            ],
            [
                'nome' => 'Brinquedos',
                'descricao' => 'Doação de brinquedos para crianças',
                'icone' => '🧸',
                'cor' => '#F48FB1',
                'ativo' => true,
            ],
            [
                'nome' => 'Meio Ambiente',
                'descricao' => 'Ações de preservação ambiental e sustentabilidade',
                'icone' => '🌱',
                'cor' => '#2E7D32',
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
