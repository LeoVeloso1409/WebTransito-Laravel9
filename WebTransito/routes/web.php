<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AitController;
use App\Http\Controllers\WebTransitoController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('/webtransito')->middleware('auth')->group(function () {

    Route::get('home', [AitController::class, 'index'])->name('home');
    Route::get('meus-registros', [AitController::class, 'meusRegistros'])->name('aits.meus.registros');
    Route::post('meus-registros', [AitController::class, 'store'])->name('ait.store');
    Route::get('editar-ait/{id}', [AitController::class, 'edit'])->name('ait.edit');
    Route::patch('editar-ait/{id}', [AitController::class, 'update'])->name('ait.update');

    //Route::middleware('Admin')->group(function () {

        Route::get('cadastrar-usuario', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('cadastrar-ususario', [RegisteredUserController::class, 'store']);
        Route::get('editar-usuario/{id}', [RegisteredUserController::class, 'edit'])->name('user.edit');
        Route::patch('editar-usuario/{id}', [RegisteredUserController::class, 'update'])->name('user.update');
        Route::delete('excluir-usuario/{id}', [RegisteredUserController::class, 'destroy'])->name('user.destroy');


        Route::get('pesquisar-usuarios', [WebTransitoController::class, 'Usuarios'])->name('users');
        Route::post('pesquisar-usuarios', [WebTransitoController::class, 'buscarUsuarios'])->name('pesquisar.users');
        Route::get('pesquisar-aits', [WebTransitoController::class, 'aits'])->name('aits');
        Route::post('pesquisar-aits', [WebTransitoController::class, 'buscaCod_Ait'])->name('pesquisar.aits');
        Route::post('pesquisar-aits', [WebTransitoController::class, 'buscaAvancadaAit'])->name('pesquisar.aits');
    //});
});

Route::get('/webtransito', function () {
    return view('layout');
})->middleware(['auth'])->name('layout');

require __DIR__.'/auth.php';
