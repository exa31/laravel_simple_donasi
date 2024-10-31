<?php

use App\Http\Controllers\HandleNotificationMidtransController;
use App\Livewire\CreateDonation;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('/donasi', CreateDonation::class);
Route::post('/handle-midtrans', [HandleNotificationMidtransController::class, 'handle'])->name('handle-midtrans');