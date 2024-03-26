<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/quem-somos', function () {
    return view('quem-somos');
})->name('quem-somos');
Route::get('/historico', function () {
    return view('historico');
})->name('historico');
Route::get('/equipe', function () {
    return view('quem-somos');
})->name('equipe');
Route::get('/projetos', function () {
    return view('quem-somos');
})->name('projetos');

Route::get('/infraestrutura', function () {
    return view('quem-somos');
})->name('infraestrutura');

Route::get('/instalacoes', function () {
    return view('quem-somos');
})->name('instalacoes');

Route::get('/equipamentos', function () {
    return view('quem-somos');
})->name('equipamentos');

Route::get('/convenios', function () {
    return view('quem-somos');
})->name('convenios');

Route::get('/publicacoes', function () {
    return view('quem-somos');
})->name('publicacoes');

Route::get('/estagio-voluntario', function () {
    return view('quem-somos');
})->name('estagio-voluntario');

Route::get('/endereco', function () {
    return view('quem-somos');
})->name('endereco');
