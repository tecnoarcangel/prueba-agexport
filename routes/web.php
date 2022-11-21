<?php

use App\Http\Livewire\Administracion\Permisos;
use App\Http\Livewire\Administracion\Roles;
use App\Http\Livewire\Administracion\Tareas;
use App\Http\Livewire\Administracion\Usuarios as Usuarios;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => ['auth:sanctum', 'verified'],'prefix' => 'admin'], function () {
    Route::view('dashboard',   'admin.dashboard')->name('dashboard');
    Route::get('usuarios',     Usuarios::class)->name('usuarios.index')->middleware(['can:Ver Usuarios']);
    Route::get('roles',        Roles::class)->name('roles.index')->middleware(['can:Ver Roles']);
    Route::get('permisos',     Permisos::class)->name('permisos.index')->middleware(['can:Ver Permisos']);
    Route::get('tareas',       Tareas::class)->name('tareas.index');
});
