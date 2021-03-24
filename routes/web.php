<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/project/submit', [ProjectsController::class, 'create'])->name('submit.project');
});

Route::post('/project/store', [ProjectsController::class, 'store'])->name('store.project');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('view.project');
