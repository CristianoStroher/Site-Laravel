<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* uso as rotas aqui para transitar as paginas*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::get('/acesso', function () {    
    return view('acesso');
})->name('acesso');

Route::get('/principal', function () {    
    return view('principal');
})->name('principal');

Route::get('/agendamento', function () {    
    return view('agendamento');
})->name('agendamento');

Route::get('/historico', function () {    
    return view('historico');
})->name('historico');






/* fim das rotas de acesso paginas */ 


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');

Route::post('/cadastro',[App\Http\Controllers\UsuarioController::class, 'create'])->name('create');

Route::get('/historico', [App\Http\Controllers\UsuarioController::class, 'index'])->name('listar');












