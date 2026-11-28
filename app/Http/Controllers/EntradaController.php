<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entrada;

class EntradaController extends Controller
{
    public function index()
    {
        // Busca somente as entradas do usuário logado.
        $entradas = Auth::user()->entradas()
            ->latest()
            ->get();

        // Soma os valores das entradas.
        $totalEntradas = $entradas->sum('valor');

        return view('entradas', compact(
            'entradas',
            'totalEntradas'
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

        // Cadastra a entrada vinculada ao usuário logado.
        Auth::user()->entradas()->create($dados);

        return redirect()->route('tela-primaria')
            ->with('sucesso', 'Entrada cadastrada com sucesso!');
    }
}
