<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/tela-primaria', function () {
    return view('tela-primaria');
});
