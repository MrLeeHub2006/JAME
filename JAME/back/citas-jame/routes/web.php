<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ruta del archivo principal
Route::get('/', function () {
    return view('index');
});

Auth::routes();

//ruta de salidas princioales del sistema
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//ruta para el admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name(name:'admin.index')
->middleware(middleware:'auth');

//ruta para el admin- usarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name(name:'admin.usuarios.index')
->middleware(middleware:'auth');    

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name(name:'admin.usuarios.create')
->middleware(middleware:'auth');

Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name(name:'admin.usuarios.store')
->middleware(middleware:'auth');

Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name(name:'admin.usuarios.show')
->middleware(middleware:'auth');

Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name(name:'admin.usuarios.edit')
->middleware(middleware:'auth');

Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name(name:'admin.usuarios.update')
->middleware(middleware:'auth');

Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name(name:'admin.usuarios.confirmDelete')
->middleware(middleware:'auth');

Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name(name:'admin.usuarios.destroy')
->middleware(middleware:'auth');


