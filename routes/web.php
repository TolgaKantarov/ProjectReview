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
    Route::post('/project/store', [ProjectsController::class, 'store'])->name('store.project');
    Route::delete('/project/{project}/delete', [ProjectsController::class, 'destroy'])->name('delete.project');
    Route::get('/project/{project}/edit', [ProjectsController::class, 'edit'])->name('edit.project');
    Route::post('/project/{project}/update', [ProjectsController::class, 'update'])->name('update.project');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/my-projects', [ProjectsController::class, 'mine'])->name('my.projects');
Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('view.project');
