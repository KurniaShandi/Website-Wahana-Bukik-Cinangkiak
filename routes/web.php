<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\AboutController as BackendAboutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\JadwalWahanaController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\StockTiketController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Backend\UlasanController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WahanaController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DestinasiController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Laporan\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Images
Route::get('images/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/images/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-image');

// Route Login
Route::get('/login-akun', [AuthController::class, 'index'])->name('index-login');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login-proses');
Route::get('/register-akun', [AuthController::class, 'register'])->name('register-akun');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->name('register-proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route Frontend
Route::get('/', [HomeController::class, 'index'])->name('home-frontend');
Route::get('/about', [AboutController::class, 'index'])->name('about-frontend');
Route::get('/destinasi-wahana', [DestinasiController::class, 'index'])->name('destinasi-frontend');
Route::get('/show-destinasi-{id}', [DestinasiController::class, 'show'])->name('show-destinasi');
Route::post('/pemesanan-destinasi', [DestinasiController::class, 'store'])->name('pemesanana-destinasi');
Route::get('/index-booking', [DestinasiController::class, 'booking'])->name('index-booking');
Route::get('/booking-detail-{id}', [DestinasiController::class, 'showBooking'])->name('booking-detail');
Route::post('/store-ulasan', [DestinasiController::class, 'storeUlasan'])->name('store-comment')->middleware('auth');
Route::get('/contact', [ContactController::class, 'index'])->name('contact-frontend');

// Route Backend
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/edit-profile', [AuthController::class, 'edit'])->name('edit-profile');
    Route::patch('/update/{id}', [AuthController::class, 'update'])->name('update-profile');

    // Route Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name("index-users");
        Route::get('/create', [UserController::class, 'create'])->name("create-users");
        Route::post('/store', [UserController::class, 'store'])->name('store-users');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name("edit-users");
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('update-users');
        Route::get('/show/{id}', [UserController::class, 'show'])->name("show-users");
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy-users');
    });

    // Route Payment
    Route::prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name("index-payment");
        Route::get('/create', [PaymentController::class, 'create'])->name("create-payment");
        Route::post('/store', [PaymentController::class, 'store'])->name('store-payment');
        Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name("edit-payment");
        Route::patch('/update/{id}', [PaymentController::class, 'update'])->name('update-payment');
        Route::get('/show/{id}', [PaymentController::class, 'show'])->name("show-payment");
        Route::delete('/destroy/{id}', [PaymentController::class, 'destroy'])->name('destroy-payment');
    });

    // Route Wahana
    Route::prefix('wahana')->group(function () {
        Route::get('/', [WahanaController::class, 'index'])->name("index-wahana");
        Route::get('/create', [WahanaController::class, 'create'])->name("create-wahana");
        Route::post('/store', [WahanaController::class, 'store'])->name('store-wahana');
        Route::get('/edit/{id}', [WahanaController::class, 'edit'])->name("edit-wahana");
        Route::patch('/update/{id}', [WahanaController::class, 'update'])->name('update-wahana');
        Route::get('/show/{id}', [WahanaController::class, 'show'])->name("show-wahana");
        Route::delete('/destroy/{id}', [WahanaController::class, 'destroy'])->name('destroy-wahana');
    });

    // Route Jadwal Wahana
    Route::prefix('jadwal-wahana')->group(function () {
        Route::get('/', [JadwalWahanaController::class, 'index'])->name("index-jadwal-wahana");
        Route::get('/create', [JadwalWahanaController::class, 'create'])->name("create-jadwal-wahana");
        Route::post('/store', [JadwalWahanaController::class, 'store'])->name('store-jadwal-wahana');
        Route::get('/edit/{id}', [JadwalWahanaController::class, 'edit'])->name("edit-jadwal-wahana");
        Route::patch('/update/{id}', [JadwalWahanaController::class, 'update'])->name('update-jadwal-wahana');
        Route::get('/show/{id}', [JadwalWahanaController::class, 'show'])->name("show-jadwal-wahana");
        Route::delete('/destroy/{id}', [JadwalWahanaController::class, 'destroy'])->name('destroy-jadwal-wahana');
    });

    // Route Ulasan
    Route::prefix('ulasan')->group(function () {
        Route::get('/', [UlasanController::class, 'index'])->name("index-ulasan");
        Route::get('/create', [UlasanController::class, 'create'])->name("create-ulasan");
        Route::post('/store', [UlasanController::class, 'store'])->name('store-ulasan');
        Route::get('/edit/{id}', [UlasanController::class, 'edit'])->name("edit-ulasan");
        Route::patch('/update/{id}', [UlasanController::class, 'update'])->name('update-ulasan');
        Route::get('/show/{id}', [UlasanController::class, 'show'])->name("show-ulasan");
        Route::delete('/destroy/{id}', [UlasanController::class, 'destroy'])->name('destroy-ulasan');
    });

    // Route Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name("index-transaksi");
        Route::get('/create', [TransaksiController::class, 'create'])->name("create-transaksi");
        Route::post('/store', [TransaksiController::class, 'store'])->name('store-transaksi');
        Route::get('/edit/{id}', [TransaksiController::class, 'edit'])->name("edit-transaksi");
        Route::patch('/update/{id}', [TransaksiController::class, 'oke'])->name('update-transaksi');
        Route::get('/show/{id}', [TransaksiController::class, 'show'])->name("show-transaksi");
        Route::delete('/destroy/{id}', [TransaksiController::class, 'destroy'])->name('destroy-transaksi');
    });

    // Route Laporan
    Route::post('/laporan-penjualan', [LaporanController::class, 'LaporanPenjualan'])->name('laporan-penjualan');
    Route::post('/laporan-wahana', [LaporanController::class, 'LaporanWahana'])->name('laporan-wahana');
    Route::post('/laporan-ulasan', [LaporanController::class, 'LaporanUlasan'])->name('laporan-ulasan');
    Route::post('/laporan-pengunjung', [LaporanController::class, 'LaporanPengunjung'])->name('laporan-pengunjung');

    // Route About
    Route::prefix('about-frontend')->group(function () {
        Route::get('/', [BackendAboutController::class, 'index'])->name("index-about");
        Route::get('/create', [BackendAboutController::class, 'create'])->name("create-about");
        Route::post('/store', [BackendAboutController::class, 'store'])->name('store-about');
        Route::get('/edit/{id}', [BackendAboutController::class, 'edit'])->name("edit-about");
        Route::patch('/update/{id}', [BackendAboutController::class, 'update'])->name('update-about');
        Route::get('/show/{id}', [BackendAboutController::class, 'show'])->name("show-about");
        Route::delete('/destroy/{id}', [BackendAboutController::class, 'destroy'])->name('destroy-about');
    });
});

// Route fallback untuk menampilkan halaman error 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
