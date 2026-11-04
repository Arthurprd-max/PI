<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $dados = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($dados)) {
        $request->session()->regenerate();
        return redirect('tela-primaria');
    }

    return back()->withErrors([
        'email' => 'Senha ou E-mail inválido.',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/tela-primaria', function () {
        return view('tela-primaria');
    });
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    });
});
