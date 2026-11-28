<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\EntradaMensal;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $mes = now()->month;
        $ano = now()->year;

        // Repete as rendas fixas no novo mês.
        $entradasFixas = Entrada::where(true)
            ->where('tipo', 'fixa')
            ->get();

        foreach ($entradasFixas as $entrada) {
            $entrada->valoresMensais()->firstOrCreate(
                [
                    'mes' => $mes,
                    'ano' => $ano,
                ],
                [
                    'valor' => $entrada->valor,
                    'recebida' => false,
                ]
            );
        }

        // Busca todas as entradas do mês.
        $entradas = Entrada::where(true)
            ->with(['valoresMensais' => function ($query) use ($mes, $ano) {
                $query->where('mes', $mes)
                    ->where('ano', $ano);
            }])
            ->get();

        // Soma os valores mensais.
        $totalEntradas = $entradas->sum(function ($entrada) {
            return $entrada->valoresMensais->sum('valor');
        });

        return view('entradas', compact(
            'entradas',
            'totalEntradas',
            'mes',
            'ano'
        ));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0.01',
            'tipo' => 'required|in:fixa,variavel',
        ]);

        $entrada = Entrada::create($dados);

        // Salva também o valor no mês atual.
        $entrada->valoresMensais()->create([
            'mes' => now()->month,
            'ano' => now()->year,
            'valor' => $entrada->valor,
            'recebida' => false,
        ]);

        return redirect()->route('entradas.index')
            ->with('sucesso', 'Entrada cadastrada com sucesso!');
    }

    public function atualizarValor(Request $request, Entrada $entrada)
    {
        $dados = $request->validate([
            'valor' => 'required|numeric|min:0.01',
            'mes' => 'required|integer|min:1|max:12',
            'ano' => 'required|integer|min:2020|max:2100',
        ]);

        $entrada->valoresMensais()->updateOrCreate(
            [
                'mes' => $dados['mes'],
                'ano' => $dados['ano'],
            ],
            [
                'valor' => $dados['valor'],
            ]
        );

        return redirect()->route('entradas.index')
            ->with('sucesso', 'Valor atualizado!');
    }

    public function recebida(EntradaMensal $entradaMensal)
    {
        $entradaMensal->update([
            'recebida' => !$entradaMensal->recebida,
        ]);

        return redirect()->route('entradas.index')
            ->with('sucesso', 'Situação atualizada!');
    }
}
