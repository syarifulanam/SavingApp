<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Savings\Index as SavingsIndex;
use App\Livewire\Savings\Create as SavingsCreate;
use App\Livewire\Savings\Edit as SavingsEdit;
use App\Livewire\Savings\View as SavingsView;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('savings')->group(function () {
    Route::get('/', SavingsIndex::class)->name('savings.index');
    Route::get('/create', SavingsCreate::class)->name('savings.create');
    Route::get('{id}/edit', SavingsEdit::class)->name('savings.edit');
    Route::get('/savings/{id}', SavingsView::class)->name('savings.view');
});
