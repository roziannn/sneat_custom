<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QC\QCController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MSTD\MSTDController;
use App\Http\Controllers\PPIC\PPICController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Settings\MenuController;
use App\Http\Controllers\Settings\PermissionController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\User\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('page.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/datatable', [PageController::class, 'datatable'])->name('datatable');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/role-permission', [PageController::class, 'rolePermission'])->name('rolePermission');

Route::get('/pct/login', [PageController::class, 'pctLogin'])->name('pctLogin');

Route::get('/ppic/dashboard', [PPICController::class, 'dashboard'])->name('dashboardPPIC');
Route::get('/ppic/master-bn', [PPICController::class, 'mstBn'])->name('mstBn');
Route::get('/ppic/history-bn', [PPICController::class, 'historyBn'])->name('historyBn');

Route::get('/qc/dashboard', [QCController::class, 'dashboard'])->name('dashboardQC');
Route::get('/qc/data-sample', [QCController::class, 'dataSample'])->name('dataSampleQC');

Route::get('/mstd/dashboard', [MSTDController::class, 'dashboard'])->name('dashboardMSTD');
Route::get('/mstd/master-product', [MSTDController::class, 'mstProduct'])->name('mstProduct.mstd');
Route::get('/mstd/master-pengujian', [MSTDController::class, 'mstPengujian'])->name('mstPengujian.mstd');

Route::get('/settings/role', [RoleController::class, 'index'])->name('settings.role');
Route::post('/settings/role/store', [RoleController::class, 'store'])->name('settings.roleStore');
Route::put('/settings/roles/{id}', [RoleController::class, 'update'])->name('settings.rolesUpdate');
Route::delete('/settings/roles/{id}', [RoleController::class, 'destroy'])->name('settings.roleDestroy');

Route::get('/settings/menu', [MenuController::class, 'index'])->name('settings.menu');
Route::post('/settings/menu/store', [MenuController::class, 'store'])->name('settings.menuStore');
Route::put('/settings/menu/{id}', [MenuController::class, 'update'])->name('settings.menuUpdate');
Route::delete('/settings/menu/{id}', [MenuController::class, 'destroy'])->name('settings.menuDestroy');


Route::get('/settings/permission', [PermissionController::class, 'index'])->name('settings.permission');
Route::get('/settings/permission/create', [PermissionController::class, 'create'])->name('settings.permissionCreate');
Route::get('/settings/permission/store', [PermissionController::class, 'store'])->name('settings.permissionStore');
Route::get('/settings/permission/edit/{id}', [PermissionController::class, 'edit'])->name('settings.permission.edit');
Route::put('/settings/permission/{roleId}', [PermissionController::class, 'update'])->name('settings.permissionUpdate');





require __DIR__ . '/auth.php';
