<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController; 
use App\Http\Controllers\EpecieController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\AnimalController::class, 'list'])->name('list'); 
Route::get('/home', [App\Http\Controllers\AnimalController::class, 'list'])->name('list');
 
Route::resource('animal', AnimalController::class);  
Route::get('animal', [AnimalController::class, 'list'])->name('list');

Route::get('create', [AnimalController::class, 'create'])->name('create');
Route::post('create', [AnimalController::class, 'store'])->name('store');

Route::get('destroy/{id}', [AnimalController::class, 'destroy'])->name('destroy');

Route::get('edit/{id}', [AnimalController::class, 'edit'])->name('edit');
Route::post('update/{id}', [AnimalController::class, 'update'])->name('update');

Route::get('/especie/{id?}', [EspecieController::class, 'show']); 

Route::get('form', [EspecieController::class, 'form'])->name('form');
Route::post('form', [EspecieController::class, 'receive'])->name('receiveForm');

Route::get('teste', [EspecieController::class, 'teste']);




 
