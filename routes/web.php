<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\Main\Akademik\AsramaController;
use App\Http\Controllers\Main\Akademik\ProgramUnggulanController;
use App\Http\Controllers\Main\Berita\BlogController;
use App\Http\Controllers\Main\Berita\KabarController;
use App\Http\Controllers\Main\GaleriController;
use App\Http\Controllers\Main\KarierController;
use App\Http\Controllers\Main\MainHomeController;
use App\Http\Controllers\Main\PrestasiController;
use App\Http\Controllers\Main\Profile\ProfilePengajarController;
use App\Http\Controllers\Main\Profile\ProfileYayasanController;
use App\Http\Controllers\Main\Profile\SejarahSekolahController;
use App\Http\Controllers\Main\Profile\StandartKompetensiKelulusanController;
use App\Http\Controllers\Main\Profile\TentangSekolahController;
use App\Http\Controllers\Main\Profile\VisiMisiSekolahController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Setting\BackupDataController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [MainHomeController::class, 'index'])->name('main.home');

Route::get('/prestasi/detail/{id}', [PrestasiController::class, 'show'])->name('prestasi.detil');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/karier/create', [KarierController::class, 'create'])->name('karier.create');
Route::get('/karier/detail/{id}', [KarierController::class, 'show'])->name('karier.detil');
Route::get('/karier', [KarierController::class, 'index'])->name('karier');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('tentang-sekolah', [TentangSekolahController::class, 'index'])->name('tentang-sekolah');
    Route::get('sejarah-sekolah', [SejarahSekolahController::class, 'index'])->name('sejarah-sekolah');
    Route::get('profile-yayasan', [ProfileYayasanController::class, 'index'])->name('profile-yayasan');
    Route::get('profile-pengajar', [ProfilePengajarController::class, 'index'])->name('profile-pengajar');
    Route::get('visi-misi-sekolah', [VisiMisiSekolahController::class, 'index'])->name('visi-misi-sekolah');
    Route::get('standart-kompetensi-lulusan', [StandartKompetensiKelulusanController::class, 'index'])->name('standart-kompetensi-lulusan');
});
Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
    Route::get('program-unggulan', [ProgramUnggulanController::class, 'index'])->name('program-unggulan');
    Route::get('asrama', [AsramaController::class, 'index'])->name('asrama');
});
Route::group(['prefix' => 'berita', 'as' => 'berita.'], function () {
    Route::get('/kabar/detail/{id}', [KabarController::class, 'show'])->name('kabar.detil');
    Route::get('kabar', [KabarController::class, 'index'])->name('kabar');

    Route::get('/blog/detail/{id}', [BlogController::class, 'show'])->name('blog.detil');
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
});

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

Route::get('artisan-optimize', function () {
    try {
        $result = Artisan::call('optimize:clear');
        return "Artisan command executed successfully. Result coode: " . $result;
    } catch (\Exception $e) {
        return "Error executing Artisan command: " . $e->getMessage();
    }
});
