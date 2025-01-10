<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rotas para tarefas
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class); // Adiciona todas as rotas RESTful para tarefas
});
