<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Savings\Index as SavingsIndex;
use App\Livewire\Savings\Create as SavingsCreate;
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('savings')->group(function () {
    Route::get('/', SavingsIndex::class)->name('savings.index');
    Route::get('/create', SavingsCreate::class)->name('borrowings.create');
});
