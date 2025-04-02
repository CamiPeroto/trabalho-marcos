<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('user.index');
});

// Route::get('/criar', function () {
//     return view('users.create');
// });

// Route::get('/mostrar', function () {
//     return view('users.show');
// });

//Usuários
Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');




