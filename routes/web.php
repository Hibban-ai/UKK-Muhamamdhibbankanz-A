<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\DatatableController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\PengaduanController as PengaduanAdmin;
use App\Models\Pengaduan;

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
    return view('landing');
});

Route::get('register', [AuthUserController::class, 'register'])->name('register');
Route::post('register', [AuthUserController::class, 'storeRegister'])->name('store.register');
Route::get('login', [AuthUserController::class, 'login'])->name('login');
Route::post('authenticate', [AuthUserController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthUserController::class, 'logout'])->name('logout');

Route::prefix('masyarakat')->name('masyarakat')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('.dashboard');
    Route::get('get-pengaduan', [PengaduanController::class, 'getPengaduan'])->name('.get-pengaduan');
    Route::prefix('pengaduan')->name('.pengaduan')->group(function () {
        Route::get('/', [PengaduanController::class, 'index'])->name('.index');
        Route::get('/create', [PengaduanController::class, 'create'])->name('.create');
        Route::post('/store', [PengaduanController::class, 'store'])->name('.store');
        Route::get('/tanggapan/{no_pengaduan}', [PengaduanController::class, 'tanggapanDetail'])->name('.tanggapan.detail');
        Route::delete('/destroy/{no_pengaduan}', [PengaduanController::class, 'destroy'])->name('.destroy');
        Route::get('/pengaduan/pdf', [PengaduanController::class, 'exportPDF']);
    });
});

Route::prefix('webmin')->name('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('.login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('.authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');

    Route::middleware(['auth:petugas'])->group(function () {
        Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('.dashboard');

        Route::middleware(['admin'])->group(function () {
            Route::get('masyarakat-verif', function(){ return view('admin.masyarakat.verif'); })->name('.masyarakat-verif');
            Route::get('get-verif', [DatatableController::class, 'masyarakatVerif'])->name('.get-verif');

            Route::get('masyarakat-unverif', function(){ return view('admin.masyarakat.unverif'); })->name('.masyarakat-unverif');
            Route::get('get-unverif', [DatatableController::class, 'masyarakatUnverif'])->name('.get-unverif');
            Route::put('approve/{id}', [MasyarakatController::class, 'toActive'])->name('.approve');

            Route::prefix('petugas')->name('.petugas')->group(function () {
                Route::get('/', [PetugasController::class, 'index'])->name('.index');
                Route::get('/get-petugas', [DatatableController::class, 'petugas'])->name('.get-petugas');
                Route::post('store', [PetugasController::class, 'store'])->name('.store');
                Route::delete('destroy/{id}', [PetugasController::class, 'destroy'])->name('.destroy');
            });
        });

        Route::get('pengaduan-undone', function (){ return view('admin.pengaduan.undone'); })->name('.pengaduan-undone');
        Route::get('get-undone', [DatatableController::class, 'pengaduanProgres'])->name('.get-undone');
        Route::get('pengaduan/{no_pengaduan}', [PengaduanAdmin::class, 'index'])->name('.pengaduan-detail');
        Route::post('create-tanggapan/{no_pengaduan}', [PengaduanAdmin::class, 'createTanggapan'])->name('.create-tanggapan');

        Route::get('pengaduan-done', function (){ return view('admin.pengaduan.done'); })->name('.pengaduan-done');
        Route::get('get-done', [DatatableController::class, 'pengaduanDone'])->name('.get-done');

        Route::get('pengaduan-generate', function (){ return view('admin.pengaduan.generate'); })->name('.pengaduan-generate');

        Route::get('/laporan', [PengaduanController::class, 'laporan'])->middleware(['auth', 'verified']);
        Route::get('admin.generate-pdf', [PengaduanController::class, 'generatePDF']);

    });
});
