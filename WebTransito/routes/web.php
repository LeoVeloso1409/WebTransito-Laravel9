<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AitController;
use App\Http\Controllers\WebTransitoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CondutorsController;
use App\Http\Controllers\VeiculosController;



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

Route::prefix('/webtransito')->middleware('auth', 'log.acesso')->group(function () {

    Route::get('home', [AitController::class, 'index'])->name('home');
    Route::get('meus-registros', [AitController::class, 'meusRegistros'])->name('aits.meus.registros');
    Route::middleware('status.user')->post('meus-registros', [AitController::class, 'store'])->name('ait.store');
    Route::get('editar-ait/{id}', [AitController::class, 'edit'])->name('ait.edit');
    Route::patch('editar-ait/{id}', [AitController::class, 'update'])->name('ait.update');

    Route::post('pesquisar-veiculo', [WebTransitoController::class, 'buscarVeiculo'])->name('buscar.veiculo');
    Route::post('pesquisar-condutor', [WebTransitoController::class, 'buscarCondutor'])->name('buscar.condutor');

    //Route::post('pesquisar-condutor', [CondutorsController::class, 'create'])->name('pesquisar.condutor');
    //Route::post('pesquisar-veiculo', [CondutorsController::class, 'store'])->name('pesquisar.veiculo');


    Route::middleware('admin')->group(function () {

        Route::get('cadastrar-usuario', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('cadastrar-ususario', [RegisteredUserController::class, 'store'])->name('user.store');
        Route::get('editar-usuario/{id}', [RegisteredUserController::class, 'edit'])->name('user.edit');
        Route::patch('editar-usuario/{id}', [RegisteredUserController::class, 'update'])->name('user.update');
        Route::delete('excluir-usuario/{id}', [RegisteredUserController::class, 'destroy'])->name('user.destroy');


        Route::get('pesquisar-usuarios', [WebTransitoController::class, 'Usuarios'])->name('users');
        Route::post('pesquisar-usuarios', [WebTransitoController::class, 'buscarUsuarios'])->name('pesquisar.users');
        Route::get('pesquisar-aits', [WebTransitoController::class, 'aits'])->name('aits');
        Route::post('pesquisar-aits', [WebTransitoController::class, 'buscaCod_Ait'])->name('pesquisar.aits');
        Route::post('pesquisar-aits', [WebTransitoController::class, 'buscaAvancadaAit'])->name('pesquisar.aits');

        Route::get('cadastrar-condutor', [CondutorsController::class, 'create'])->name('condutor.create');
        Route::post('cadastrar-condutor', [CondutorsController::class, 'store'])->name('condutor.store');

        Route::get('cadastrar-veiculo', [VeiculosController::class, 'create'])->name('veiculo.create');
        Route::post('cadastrar-veiculo', [VeiculosController::class, 'store'])->name('veiculo.store');
    });
});

Route::get('/webtransito', function () {
    return view('layout');
})->middleware(['auth'])->name('layout');

require __DIR__.'/auth.php';
