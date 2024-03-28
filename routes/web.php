<?php

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureAuthIsNotValid;
use App\Http\Middleware\EnsureAuthIsValid;
use Illuminate\Support\Facades\Route;

Route::controller(Controller::class)->group(function () {
    Route::middleware(EnsureAuthIsNotValid::class)->group(function () {
        Route::get('/entrar', 'login')->name('login');
        Route::get('/registrar', 'register')->name('register');
        Route::post('/entrando', 'logging')->name('logging');
        Route::post('/registrando', 'registering')->name('registering');
    });


    Route::middleware(EnsureAuthIsValid::class)->group(function () {
        Route::get('/informativos', function () {
            return view('informativos');
        })->name('informativos');
        Route::get('/sair', 'logout')->name('logout');
    });

    Route::post('/estagio-voluntario', 'estagioVoluntario')->name('estagio-voluntario');
    Route::get('/projetos', 'projetos')->name('projetos');
});
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/quem-somos', function () {
    return view('quem-somos');
})->name('quem-somos');
Route::get('/historico', function () {
    return view('historico');
})->name('historico');
Route::get('/equipe', function () {
    return view('equipe');
})->name('equipe');

Route::get('/infraestrutura', function () {
    return view('quem-somos');
})->name('infraestrutura');

Route::get('/instalacoes', function () {
    return view('instalacoes');
})->name('instalacoes');

Route::get('/equipamentos', function () {
    return view('equipamentos');
})->name('equipamentos');

Route::get('/convenios', function () {
    return view('convenios');
})->name('convenios');

Route::get('/publicacoes', function () {
    return view('publicacoes');
})->name('publicacoes');

Route::get('/estagio-voluntario', function () {
    return view('estagio-voluntario');
})->name('estagio-voluntario');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');
