<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\EntradaMensal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EntradaController extends Controller
{
    public function index()
    {
        $mes = now()->month;
        $ano = now()->year;

        // Repete as rendas fixas no novo mês.
        $entradasFixas = Entrada::where('ativa', true)
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
        $entradas = Entrada::where('ativa', true)
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
            'data' => 'nullable|date',
        ]);

        $entrada = Entrada::create($dados);
        $data = isset($dados['data'])
            ? Carbon::parse($dados['data'])
            : now();

        // Salva também o valor no mês informado.
        $entrada->valoresMensais()->create([
            'mes' => $data->month,
            'ano' => $data->year,
            'valor' => $entrada->valor,
            'recebida' => false,
        ]);

        return redirect()->route('tela-primaria')
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
