<?php

namespace Database\Seeders;

use App\Models\Acao;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Seeder;

class AcaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pegar primeiro usuário como organizador
        $organizador = User::first();

        // Pegar categorias
        $categorias = Categoria::all()->keyBy('nome');

        $acoes = [
            // ALIMENTAÇÃO
            [
                'titulo' => 'Campanha do Quilo - Arrecadação de Alimentos',
                'descricao' => 'Arrecadação de alimentos não perecíveis para distribuição em comunidades carentes. Precisamos de arroz, feijão, macarrão, óleo, açúcar e outros itens básicos. Os alimentos serão destinados a 50 famílias em situação de vulnerabilidade social.',
                'categoria_id' => $categorias['Alimentação']->id,
                'localizacao' => 'Centro Comunitário - Bairro Pinheiro, Maceió/AL',
                'data' => now()->addDays(15),
                'meta' => 1000.00,
                'progresso' => 45,
                'urgencia' => 'alta',
                'email_contato' => 'doacoes@centrocomunitario.org.br',
                'telefone_contato' => '(82) 98765-4321',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Cestas Básicas para Famílias Desabrigadas',
                'descricao' => 'Após as recentes chuvas que afetaram nossa região, muitas famílias perderam tudo. Estamos arrecadando alimentos para montar cestas básicas completas e ajudar na reconstrução de suas vidas.',
                'categoria_id' => $categorias['Alimentação']->id,
                'localizacao' => 'Defesa Civil - Maceió/AL',
                'data' => now()->addDays(7),
                'meta' => 2500.00,
                'progresso' => 68,
                'urgencia' => 'critica',
                'email_contato' => 'emergencia@defesacivil.al.gov.br',
                'telefone_contato' => '(82) 99876-5432',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // VESTUÁRIO
            [
                'titulo' => 'Campanha do Agasalho 2025',
                'descricao' => 'Com a chegada do inverno, muitas pessoas em situação de rua precisam de roupas quentes. Aceitamos casacos, cobertores, calças, blusas de frio e meias. Todas as peças devem estar em bom estado de conservação.',
                'categoria_id' => $categorias['Vestuário']->id,
                'localizacao' => 'Igreja São Benedito - Centro, Maceió/AL',
                'data' => now()->addDays(30),
                'meta' => 500.00,
                'progresso' => 30,
                'urgencia' => 'media',
                'email_contato' => 'social@saobendito.org.br',
                'telefone_contato' => '(82) 3221-4455',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Roupas para Recém-Nascidos',
                'descricao' => 'O Hospital da Mulher está precisando de doações de roupas para bebês prematuros e recém-nascidos de famílias em situação de vulnerabilidade. Aceitamos bodies, macacões, meias, mantas e fraldas de pano.',
                'categoria_id' => $categorias['Vestuário']->id,
                'localizacao' => 'Hospital da Mulher - Farol, Maceió/AL',
                'data' => now()->addDays(20),
                'meta' => 300.00,
                'progresso' => 55,
                'urgencia' => 'alta',
                'email_contato' => 'doacoes@hospitaldamulher.al.gov.br',
                'telefone_contato' => '(82) 3315-5566',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // LIVROS
            [
                'titulo' => 'Biblioteca Comunitária do Benedito Bentes',
                'descricao' => 'Estamos montando uma biblioteca comunitária para incentivar a leitura entre crianças e jovens da periferia. Precisamos de livros infantis, juvenis, didáticos e de literatura em geral. Também aceitamos gibis e revistas educativas.',
                'categoria_id' => $categorias['Livros']->id,
                'localizacao' => 'Associação de Moradores - Benedito Bentes, Maceió/AL',
                'data' => now()->addDays(45),
                'meta' => 1000.00,
                'progresso' => 25,
                'urgencia' => 'baixa',
                'email_contato' => 'biblioteca@beneditobentes.org',
                'telefone_contato' => '(82) 98234-5678',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // EDUCAÇÃO
            [
                'titulo' => 'Material Escolar para Volta às Aulas',
                'descricao' => 'Campanha de arrecadação de material escolar para estudantes de baixa renda. Precisamos de cadernos, lápis, canetas, borrachas, mochilas, estojos e outros materiais. Juntos podemos garantir que todas as crianças tenham condições de estudar.',
                'categoria_id' => $categorias['Educação']->id,
                'localizacao' => 'Escola Municipal Prof. José da Silva - Jacintinho, Maceió/AL',
                'data' => now()->addDays(10),
                'meta' => 800.00,
                'progresso' => 72,
                'urgencia' => 'alta',
                'email_contato' => 'direcao@escolajose.edu.br',
                'telefone_contato' => '(82) 3326-7788',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // BRINQUEDOS
            [
                'titulo' => 'Natal Solidário - Brinquedos para Crianças Carentes',
                'descricao' => 'Vamos fazer o Natal de 200 crianças mais feliz! Arrecadando brinquedos novos e usados em bom estado para distribuição no Natal. Aceitamos bonecas, carrinhos, jogos, pelúcias e brinquedos educativos.',
                'categoria_id' => $categorias['Brinquedos']->id,
                'localizacao' => 'Shopping Maceió - Mangabeiras, Maceió/AL',
                'data' => now()->addDays(60),
                'meta' => 200.00,
                'progresso' => 15,
                'urgencia' => 'media',
                'email_contato' => 'natalsolidario@shopping.com.br',
                'telefone_contato' => '(82) 3338-9900',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Brinquedos para Casa de Acolhimento Infantil',
                'descricao' => 'A Casa de Acolhimento abriga 30 crianças que foram afastadas de suas famílias. Precisamos de brinquedos educativos, jogos de tabuleiro, quebra-cabeças e materiais para atividades recreativas.',
                'categoria_id' => $categorias['Brinquedos']->id,
                'localizacao' => 'Casa de Acolhimento Lar Feliz - Tabuleiro dos Martins, Maceió/AL',
                'data' => now()->addDays(25),
                'meta' => 150.00,
                'progresso' => 40,
                'urgencia' => 'media',
                'email_contato' => 'contato@larfeliz.org.br',
                'telefone_contato' => '(82) 99123-4567',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // SAÚDE
            [
                'titulo' => 'Campanha de Doação de Sangue - HUPAA',
                'descricao' => 'O estoque de sangue do Hospital Universitário está em nível crítico! Precisamos urgentemente de doadores de todos os tipos sanguíneos. A doação é rápida, segura e pode salvar até 4 vidas. Compareça e seja um herói!',
                'categoria_id' => $categorias['Saúde']->id,
                'localizacao' => 'HUPAA - Campus A. C. Simões, UFAL, Maceió/AL',
                'data' => now()->addDays(3),
                'meta' => 100.00,
                'progresso' => 80,
                'urgencia' => 'critica',
                'email_contato' => 'hemoterapia@hupaa.ufal.br',
                'telefone_contato' => '(82) 3202-3700',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Doe Sangue, Doe Vida - Hemoal',
                'descricao' => 'Mutirão de doação de sangue no Hemocentro de Alagoas. Todos os tipos sanguíneos são bem-vindos! Traga documento com foto e esteja bem alimentado. A doação leva apenas 40 minutos e você pode ajudar a salvar vidas.',
                'categoria_id' => $categorias['Saúde']->id,
                'localizacao' => 'Hemoal - Trapiche da Barra, Maceió/AL',
                'data' => now()->addDays(5),
                'meta' => 150.00,
                'progresso' => 60,
                'urgencia' => 'alta',
                'email_contato' => 'agendamento@hemoal.al.gov.br',
                'telefone_contato' => '(82) 3315-2583',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // OUTROS (Financeiro)
            [
                'titulo' => 'Reforma do Abrigo de Animais Abandonados',
                'descricao' => 'O Abrigo Municipal de Animais precisa de reformas urgentes. Telhado com goteiras, canis deteriorados e falta de equipamentos. Sua contribuição financeira ajudará a proporcionar um ambiente melhor para mais de 100 animais resgatados.',
                'categoria_id' => $categorias['Outros']->id,
                'localizacao' => 'Abrigo Municipal - Cidade Universitária, Maceió/AL',
                'data' => now()->addDays(90),
                'meta' => 15000.00,
                'progresso' => 35,
                'urgencia' => 'media',
                'email_contato' => 'abrigoanimal@maceio.al.gov.br',
                'telefone_contato' => '(82) 3312-5500',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Tratamento de Criança com Doença Rara',
                'descricao' => 'A pequena Maria Eduarda, de 7 anos, precisa de tratamento especializado fora do estado. A família não tem condições financeiras. Cada real doado nos aproxima do sonho de ver a Maria saudável novamente.',
                'categoria_id' => $categorias['Outros']->id,
                'localizacao' => 'Vaquinha Online - Qualquer local',
                'data' => now()->addDays(40),
                'meta' => 50000.00,
                'progresso' => 52,
                'urgencia' => 'critica',
                'email_contato' => 'ajudemariaeduarda@gmail.com',
                'telefone_contato' => '(82) 99234-5678',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // MEIO AMBIENTE
            [
                'titulo' => 'Mutirão de Limpeza da Praia do Francês',
                'descricao' => 'Vamos juntos limpar a Praia do Francês! Precisamos de voluntários para recolher lixo e preservar nosso meio ambiente. Traga luvas e sacos de lixo. Após a ação, teremos um lanche comunitário.',
                'categoria_id' => $categorias['Meio Ambiente']->id,
                'localizacao' => 'Praia do Francês - Marechal Deodoro/AL',
                'data' => now()->addDays(12),
                'meta' => 50.00,
                'progresso' => 90,
                'urgencia' => 'baixa',
                'email_contato' => 'meioambiente@frances.org.br',
                'telefone_contato' => '(82) 98765-1234',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],
            [
                'titulo' => 'Doação de Móveis e Eletrodomésticos',
                'descricao' => 'Famílias que estão reconstruindo suas casas após enchentes precisam de móveis e eletrodomésticos. Aceitamos fogões, geladeiras, camas, sofás, mesas e cadeiras em bom estado de uso.',
                'categoria_id' => $categorias['Outros']->id,
                'localizacao' => 'Galpão Solidário - Feitosa, Maceió/AL',
                'data' => now()->addDays(35),
                'meta' => 30.00,
                'progresso' => 20,
                'urgencia' => 'media',
                'email_contato' => 'galpaosolidario@gmail.com',
                'telefone_contato' => '(82) 99876-5432',
                'status' => 'ativa',
                'organizador_id' => $organizador->id,
            ],

            // MEIO AMBIENTE (Pausada)
            [
                'titulo' => 'Campanha de Reciclagem - Temporariamente Pausada',
                'descricao' => 'Campanha de coleta de materiais recicláveis para cooperativa local. Pausada temporariamente devido à capacidade de armazenamento atingida. Retornaremos em breve!',
                'categoria_id' => $categorias['Meio Ambiente']->id,
                'localizacao' => 'Cooperativa Recicla Mais - Maceió/AL',
                'data' => now()->subDays(5),
                'meta' => 500.00,
                'progresso' => 100,
                'urgencia' => 'baixa',
                'email_contato' => 'reciclamais@cooperativa.org.br',
                'telefone_contato' => '(82) 3334-5566',
                'status' => 'pausada',
                'organizador_id' => $organizador->id,
            ],

            // BRINQUEDOS (Encerrada)
            [
                'titulo' => 'Páscoa Solidária 2025 - Encerrada',
                'descricao' => 'Campanha de arrecadação de chocolates e ovos de Páscoa para crianças carentes. Meta alcançada com sucesso! Distribuímos 500 ovos de Páscoa. Muito obrigado a todos que participaram!',
                'categoria_id' => $categorias['Brinquedos']->id,
                'localizacao' => 'Múltiplos pontos de coleta - Maceió/AL',
                'data' => now()->subDays(30),
                'meta' => 500.00,
                'progresso' => 100,
                'urgencia' => 'baixa',
                'email_contato' => 'pascoasolidaria@exemplo.com.br',
                'telefone_contato' => '(82) 98888-7777',
                'status' => 'encerrada',
                'organizador_id' => $organizador->id,
            ],
        ];

        foreach ($acoes as $acao) {
            Acao::create($acao);
        }
    }
}
