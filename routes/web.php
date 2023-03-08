<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//rutas routes js
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/importar-colaboradores', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/colaboradores', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/reconocimientos', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/reportes', [App\Http\Controllers\HomeController::class, 'index']);

//rutas routes web.php
// Route::get('administrador/usuarios/getListUsuarios', [App\Http\Controllers\Administracion\UserController::class, 'getListUsuarios'])->name('administracion.usuarios.getListUsuarios');
// Route::post('usuarios/administrador/crearUsuarios', [App\Http\Controllers\Administracion\UserController::class, 'setCreateUser'])->name('administracion.usuarios.setCreateUser');
Route::get('administrador/reconocimientos/getListReconocimientos', [App\Http\Controllers\Administracion\RecognitionController::class, 'getListRecognitions'])->name('administracion.reconocimientos.getListRecognitions');
Route::get('administrador/reconocimientos/getReconocimientos', [App\Http\Controllers\Administracion\RecognitionController::class, 'getRecognitions'])->name('administracion.reconocimientos.getRecognitions');
Route::get('administrador/colaboradores/getListColaboradores', [App\Http\Controllers\Administracion\ColaboradorController::class, 'getListCollaborators'])->name('administracion.colaboradores.getListCollaborators');
Route::get('administrador/colaboradores/getColaboradores', [App\Http\Controllers\Administracion\ColaboradorController::class, 'getCollaborators'])->name('administracion.colaboradores.getCollaborators');
Route::post('/import-excel-collaboradores', [App\Http\Controllers\Administracion\ColaboradorController::class, 'ImportCollaborator'])->name('administracion.colaboradores.ImportCollaborator');

Route::post('/reconocimiento/setReconocimineto', [App\Http\Controllers\IndexController::class, 'setReconocimineto']);
Route::get('/reconocimiento/setColaborador', [App\Http\Controllers\IndexController::class, 'getColaborador']);
Route::get('reconocimiento/getColaboradores', [App\Http\Controllers\IndexController::class, 'getColaboradores']);

Route::get('reconocimiento/getParticipacion', [App\Http\Controllers\Administracion\DashboardController::class, 'getParticipacion']);
Route::get('/colaboradores/getReconocidos', [App\Http\Controllers\Administracion\DashboardController::class, 'getReconocidos']);

Route::get('/colaboradores/getReconocimientosMes', [App\Http\Controllers\Administracion\DashboardController::class, 'getReconocimientosMes']);





Route::get('/', function () {
    return view('app');
})->name('basepath');

Route::get('/registrar-reconocimiento', function () {
    return view('app');
});




// Route::get('/{optional?}', function () {
//     return view('app');
// })->name('basepath')->where('optional','.*');




