<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard',[VacanteController::class,'index'])->middleware(['auth','verified','rolUsuario'])->name('vacantes.index');
Route::get('/vacante/create',[VacanteController::class,'create'])->middleware(['auth','verified'])->name('vacantes.create');
Route::get('/vacante/{vacante}/edit',[VacanteController::class,'edit'])->middleware(['auth','verified'])->name('vacantes.edit');
Route::get('/vacante/{vacante}',[VacanteController::class,'show'])->name('vacantes.show');
Route::get('/candidatos/{vacante}',[CandidatoController::class,'index'])->middleware(['auth','verified','rolUsuario'])->name('candidatos.index');

// notifications
Route::get('/notificaciones',NotificacionController::class)->middleware(['auth','verified','rolUsuario'])->name('notificaciones');

require __DIR__.'/auth.php';
