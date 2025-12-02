<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;        
use App\Http\Controllers\StatusTicketController; 
use App\Http\Controllers\TicketController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    
    Route::resource('roles', RoleController::class)->except(['show']); 
    
    Route::resource('status-tickets', StatusTicketController::class)->except(['show']);
    
    Route::resource('tickets', TicketController::class);
});    

require __DIR__.'/auth.php';
