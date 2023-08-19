<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show'])->name('registro');
Route::post('/register', [RegisterController::class, 'register'])->name('validar-registro');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('validar-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group (function () {
    Route::get('task-list', [TaskController::class, 'index'])->name('task');

    Route::get('new-task', [TaskController::class, 'create'])->name('create');

    Route::post('store', [TaskController::class, 'store'])->name('store');

    Route::get('edit/{id}', [TaskController::class, 'edit'])->name('edit');

    Route::post('update/{id}', [TaskController::class, 'update'])->name('update');

    Route::get('delete/{id}', [TaskController::class, 'destroy'])->name('delete');

    Route::get('completado/{id}', [TaskController::class, 'completado'])->name('completado');

    Route::get('eliminar-tareas', [TaskController::class, 'eliminarTareasVencidas'])->name('eliminar-tareas');
});


