<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//breeze auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//color pages
Route::get('/colors',[ColorController::class,'index']) -> name('colors.index');
//create
Route::post('/colors',[ColorController::class,'store']) -> name('colors.store');
Route::get('/colors/create',[ColorController::class,'create']) -> name('colors.create');
//show
Route::get('/colors/{color}',[ColorController::class,'show']) -> name('colors.show');
//edit
Route::get('/colors/{color}/edit',[ColorController::class,'edit']) -> name('colors.edit');
Route::patch('/colors/{color}',[ColorController::class,'update']) -> name('colors.update');
//delete
Route::delete('/colors/{color}',[ColorController::class,'destroy']) -> name('colors.destroy');

//uploads
Route::get('uploads',[UploadController::class,'index']) -> name('uploads.index');
Route::patch('uploads/{color}',[UploadController::class,'update']) -> name('uploads.update');
//admin


require __DIR__.'/auth.php';
