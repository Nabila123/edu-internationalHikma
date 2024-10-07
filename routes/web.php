<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\Main\MainHomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Setting\BackupDataController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [MainHomeController::class, 'index'])->name('main.home');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::post('profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::resource('profile', ProfileController::class);

    Route::get('overview', [HomeController::class, 'overview']);

    Route::get('users/checkEmail', [UserController::class, 'checkEmail']);
    Route::get('users/checkUsername', [UserController::class, 'checkUsername']);
    Route::get('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    Route::group(['prefix' => 'logs', 'as' => 'logs.'], function () {
        Route::get('auth', [LogsController::class, 'auth'])->name('auth');
        Route::get('system', [LogsController::class, 'system'])->name('system');
        Route::get('activity', [LogsController::class, 'activity'])->name('activity');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('backup-data/download/{fileName}', [BackupDataController::class, 'download'])->name('backup-data.download');
        Route::resource('backup-data', BackupDataController::class);
    });

    Route::get('roles/search', [RoleController::class, 'search'])->name('role.search');
    Route::get('roles/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('roles/create', [RoleController::class, 'store'])->name('role.create');
    Route::post('roles/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('roles/edit/{id}', [RoleController::class, 'update'])->name('role.edit');
    Route::resource('roles', RoleController::class);

    Route::get('permissions/search', [PermissionController::class, 'search']);
    Route::resource('permissions', PermissionController::class);
});
