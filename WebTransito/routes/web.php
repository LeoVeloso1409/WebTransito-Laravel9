<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AitController;

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

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::get('/webtransito', function () {
    return view('layout');
})->middleware(['auth'])->name('layout');

require __DIR__.'/auth.php';
