<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('submitLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('create');
Route::get('/', [EventController::class, 'index'])->middleware('auth')->name('index');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->middleware('auth')->name('edit');
Route::get('/events/{id}', [EventController::class, 'show'])->middleware('auth')->name('show');
Route::put('/events/{event}', [EventController::class, 'update'])->middleware('auth')->name('update');
Route::post('events', [EventController::class, 'store'])->middleware('auth')->name('store');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth')->name('destroy');
