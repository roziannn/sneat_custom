<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/datatable', [PageController::class, 'datatable'])->name('datatable');
Route::get('/role-permission', [PageController::class, 'rolePermission'])->name('rolePermission');

Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/login', function () {
    return view('page.login');
});
