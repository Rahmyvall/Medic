<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// FRONTEND
use App\Http\Controllers\Frontend\FrontendPageController;

// AUTH
use App\Http\Controllers\Auth\LoginController;

// BACKEND / DASHBOARD
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DetailresepController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HitungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route aplikasi web didefinisikan di sini.
| Pastikan frontend dan backend dipisahkan agar mudah dikelola.
|--------------------------------------------------------------------------
*/

/* ----------------------------------------------------------
| FRONTEND ROUTES
|-----------------------------------------------------------*/
Route::prefix('/')->group(function () {
    Route::get('/', [PageController::class, 'homepage'])->name('frontend.homepage');
    Route::get('/about', [PageController::class, 'about'])->name('frontend.about');
    Route::get('/departments', [PageController::class, 'departments'])->name('frontend.departments');
    Route::get('/department-details', [PageController::class, 'departmentDetails'])->name('frontend.department-details');
    Route::get('/service-details', [PageController::class, 'serviceDetails'])->name('frontend.service-details');
    Route::get('/appointment', [PageController::class, 'appointment'])->name('frontend.appointment');
    Route::get('/testimonials', [PageController::class, 'testimonials'])->name('frontend.testimonials');
    Route::get('/questions', [PageController::class, 'questions'])->name('frontend.questions');
    Route::get('/gallery', [PageController::class, 'gallery'])->name('frontend.gallery');
    Route::get('/terms', [PageController::class, 'terms'])->name('frontend.terms');
    Route::get('/privacy', [PageController::class, 'privacy'])->name('frontend.privacy');
    Route::get('/contact', [PageController::class, 'contact'])->name('frontend.contact');
    Route::get('/services', [PageController::class, 'services'])->name('frontend.services');
});

/* ----------------------------------------------------------
| DASHBOARD & BACKEND ROUTES (Hanya untuk user login)
|-----------------------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'dokter'        => DokterController::class,
        'pasien'        => PasienController::class,
        'kunjungan'     => KunjunganController::class,
        'rekam_medis'   => RekamMedisController::class,
        'reseps'        => ResepController::class,
        'detailreseps'  => DetailresepController::class,
        'obat'          => ObatController::class,
        'pembayaran'    => PembayaranController::class,
        'about_us'      => AboutUsController::class,
    ]);
});

/* ----------------------------------------------------------
| AUTH ROUTES
|-----------------------------------------------------------*/
Auth::routes();

// Custom login route (gunakan huruf besar sesuai class)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Custom logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // redirect ke homepage
})->name('logout');