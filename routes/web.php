<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage')->middleware('guest');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');
    Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post-register');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/read', [KelasController::class, 'read'])->name('kelas.read');
    Route::get('/kelas-siswa', [KelasController::class, 'kelassiswa'])->name('kelas-siswa');

    Route::middleware(['admin'])->group(function () {
        
        Route::prefix('user')->group(function () {
            Route::get('/', [AuthController::class, 'index'])->name('user');
            Route::get('/read', [AuthController::class, 'read'])->name('user.read');
            Route::get('/show/{id}', [AuthController::class, 'show']);
            Route::delete('/destroy/{id}', [AuthController::class, 'destroy']);
        });
        
        Route::prefix('kelas')->group(function () {
            Route::get('/', [KelasController::class, 'index'])->name('kelas');
            Route::get('/read', [KelasController::class, 'read'])->name('kelas.read');
            Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
            Route::post('/createOrUpdate', [KelasController::class, 'createOrUpdate'])->name('kelas.createOrUpdate');
            Route::get('/edit/{id}', [KelasController::class, 'edit']);
            Route::delete('/destroy/{id}', [KelasController::class, 'destroy']);
        });

        Route::prefix('siswa')->group(function () {
            Route::get('/', [SiswaController::class, 'index'])->name('siswa');
            Route::get('/read', [SiswaController::class, 'read'])->name('siswa.read');
            Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
            Route::post('/createOrUpdate', [SiswaController::class, 'createOrUpdate'])->name('siswa.createOrUpdate');
            Route::get('/edit/{id}', [SiswaController::class, 'edit']);
            Route::get('/show/{id}', [SiswaController::class, 'show']);
            Route::delete('/destroy/{id}', [SiswaController::class, 'destroy']);
        });

        Route::prefix('guru')->group(function () {
            Route::get('/', [GuruController::class, 'index'])->name('guru');
            Route::get('/read', [GuruController::class, 'read'])->name('guru.read');
            Route::get('/create', [GuruController::class, 'create'])->name('guru.create');
            Route::post('/createOrUpdate', [GuruController::class, 'createOrUpdate'])->name('guru.createOrUpdate');
            Route::get('/edit/{id}', [GuruController::class, 'edit']);
            Route::get('/show/{id}', [GuruController::class, 'show']);
            Route::delete('/destroy/{id}', [GuruController::class, 'destroy']);
        });

        Route::prefix('sekolah')->group(function () {
            Route::get('/', [SekolahController::class, 'index'])->name('sekolah');
            Route::get('/read', [SekolahController::class, 'read'])->name('read.sekolah');
            Route::post('/createOrUpdate', [SekolahController::class, 'createOrUpdate'])->name('sekolah.createOrUpdate');
        });
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/read', [AuthController::class, 'profileread'])->name('profile-read');
    Route::put('/update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::get('/changepassword', [AuthController::class, 'changePassword'])->name('changepassword');
    Route::put('/post-password', [AuthController::class, 'postPassword'])->name('post-password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
