<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// ==========================================
// TELA INICIAL
// ==========================================

Route::get('/', function () {
    return view('tela-primaria', [
        'rendasMensais' => collect(),
        'totalRendas' => 0,
    ]);
})->name('tela-inicial');

// ==========================================
// LOGIN
// ==========================================

Route::get('/login', function () {
    return view('login');
})->name('login');

// PROCESSAR LOGIN
Route::post('/login', function (Request $request) {

    $credenciais = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'remember' => 'nullable|boolean',
    ]);

    $lembrar = $request->boolean('remember');

    if (Auth::attempt([
        'email' => $credenciais['email'],
        'password' => $credenciais['password'],
    ], $lembrar)) {

        $request->session()->regenerate();

        return redirect()->intended(route('tela-primaria'));
    }

    return back()->withErrors([
        'email' => 'Senha ou E-mail inválido.',
    ])->onlyInput('email');
})->name('login.store');

// ==========================================
// CADASTRO
// ==========================================

Route::get('/cadastro', function () {
    return view('tela-de-cadastro');
})->name('cadastro');

// PROCESSAR CADASTRO
Route::post('/cadastro', function (Request $request) {

    $dados = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:4|confirmed',
    ]);

    $usuario = \App\Models\User::create($dados);

    Auth::login($usuario);

    $request->session()->regenerate();

    return redirect()->route('tela-primaria');
})->name('cadastro.store');

// ==========================================
// ROTAS PROTEGIDAS
// ==========================================

Route::middleware('auth')->group(function () {

    // TELA PRINCIPAL
    Route::get('/tela-primaria', function () {

        return view('tela-primaria', [
            'rendasMensais' => collect(),
            'totalRendas' => 0,
        ]);
    })->name('tela-primaria');

    // LOGOUT
    Route::post('/logout', function (Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('tela-inicial');
    })->name('logout');
});

// ==========================================
// ALTERAR TEMA
// ==========================================

Route::get('/tema', function () {

    $atual = session('tema', 'light');

    session([
        'tema' => $atual === 'dark' ? 'light' : 'dark',
    ]);

    return back();
})->name('tema');

// ==========================================
// ENTRADAS / RENDAS
// ==========================================

// LISTAR ENTRADAS
Route::get('/entradas', [EntradaController::class, 'index'])
    ->name('entradas.index');

// ADICIONAR ENTRADA
Route::post('/entradas', [EntradaController::class, 'store'])
    ->name('entradas.store');

// ATUALIZAR VALOR
Route::put('/entradas/{entrada}/valor', [EntradaController::class, 'atualizarValor'])
    ->name('entradas.valor');

// MARCAR COMO RECEBIDA
Route::patch('/entradas-mensais/{entradaMensal}/recebida', [EntradaController::class, 'recebida'])
    ->name('entradas.recebida');
