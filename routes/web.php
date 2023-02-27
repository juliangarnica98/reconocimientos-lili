<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('administrador/usuarios/getListUsuarios', [App\Http\Controllers\Administracion\UserController::class, 'getListUsuarios'])->name('administracion.usuarios.getListUsuarios');
Route::post('usuarios/administrador/crearUsuarios', [App\Http\Controllers\Administracion\UserController::class, 'setCreateUser'])->name('administracion.usuarios.setCreateUser');

Route::get('/', function () {
    return view('app');
})->name('basepath');




// Route::get('/{optional?}', function () {
//     return view('app');
// })->name('basepath')->where('optional','.*');




