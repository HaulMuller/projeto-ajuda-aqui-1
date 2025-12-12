<?php

namespace App\Http\Controllers;

use App\Models\Acao;
use App\Models\Voluntario;
use App\Models\Doador;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    /**
     * Processar inscrição em uma campanha
     */
    public function store(Request $request, Acao $acao)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'tipo' => 'required|in:voluntario,doador',
            'mensagem' => 'nullable|string|max:500',
        ]);

        if ($validated['tipo'] === 'voluntario') {
            Voluntario::create([
                'acao_id' => $acao->id,
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'telefone' => $validated['telefone'] ?? null,
                'mensagem' => $validated['mensagem'] ?? null,
            ]);
        } else {
            Doador::create([
                'acao_id' => $acao->id,
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'telefone' => $validated['telefone'] ?? null,
                'mensagem' => $validated['mensagem'] ?? null,
            ]);
        }

        return redirect()->back()->with('inscricao_sucesso', 
            'Inscrição realizada com sucesso! Em breve entraremos em contato.');
    }
}

