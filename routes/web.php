<?php

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureAuthIsNotValid;
use App\Http\Middleware\EnsureAuthIsValid;
use Illuminate\Support\Facades\Route;

Route::controller(Controller::class)->group(function () {
    Route::middleware(EnsureAuthIsNotValid::class)->group(function () {
        Route::get('/entrar', 'login')->name('login');
        Route::middleware(['throttle:7,20'])->group(function () {
            Route::get('/registrar', 'register')->name('register');
            Route::post('/entrando', 'logging')->name('logging');
            Route::post('/registrando', 'registering')->name('registering');
        });
    });


    Route::middleware(EnsureAuthIsValid::class)->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::match(['POST', 'GET'], '/informativos', 'admin_informativos')->name('admin-informativos');
            Route::match('GET', '/deletar-infomativo/{id}', 'delete_informativo')->name('admin-delete-informativos');
        });
        Route::get('/sair', 'logout')->name('logout');
    });

    Route::get('/', 'home')->name('home');
    Route::middleware(['throttle:5,20'])->group(function () {
        Route::post('/estagio-voluntario', 'estagio_voluntario')->name('estagio-voluntario');
        Route::post('/fale-conosco', 'fale_conosco')->name('fale-conosco');
    });
    Route::get('/estagio-voluntario', 'estagio_voluntario')->name('estagio-voluntario');
    Route::get('/fale-conosco', 'fale_conosco')->name('fale-conosco');

    Route::get('/projetos', 'projetos')->name('projetos');
    Route::match(['POST', 'GET'], '/informativo/{id}', 'informativo')->name('informativo');
});

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


Route::get('/contato', function () {
    return view('contato');
})->name('contato');
