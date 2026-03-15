<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\ProdukController;
use App\Http\Controllers\auth\HRDController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/product-list/{id}', [ProductController::class, 'index']);
Route::get('/product-detail/{id}', [ProductController::class, 'show']);

Route::get('/list-events', [EventController::class, 'index']);
Route::get('/event-detail/{id}', [EventController::class, 'show']);

Route::get('/r-and-d', [PageController::class, 'randd']);
Route::get('/qc', [PageController::class, 'qc']);
Route::get('/key-facts', [PageController::class, 'keyFacts']);
Route::get('/company-profile', [PageController::class, 'companyProfile']);
Route::get('/production', [PageController::class, 'production']);
Route::get('/contact', [PageController::class, 'contact']);

Route::get('/job-list', [CareerController::class, 'index']);
Route::post('/job-detail', [CareerController::class, 'show']);
Route::post('/sendmail-loker', [CareerController::class, 'apply']);

Route::post('/sendmail', [ContactController::class, 'send']);



Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/proses', [LoginController::class, 'proses']);
Route::post('/logout', [LoginController::class, 'logout']);

// Rute ini hanya bisa dibuka oleh user dengan level 'admin'
Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::get('/webmin/dashboard', [AdminController::class, 'index']);
    Route::get('/webmin/users', [AdminController::class, 'users']);
});

Route::middleware(['auth', 'ceklevel:hrd'])->prefix('hrd')->group(function () {
    Route::get('/dashboard', [HrdController::class, 'dashboard']); // Dashboard utama HRD
    

    // Di dalam routes/web.php (dalam group middleware hrd)
    // Route CRUD Loker
    Route::get('/loker', [HrdController::class, 'index']);
    Route::get('/loker/status/{id}/{status}', [HRDController::class, 'update_status']);
    Route::get('/loker/create', [HrdController::class, 'create']);
    Route::post('/loker/store', [HrdController::class, 'store']);
    Route::get('/loker/edit/{id}', [HrdController::class, 'edit']);
    Route::post('/loker/update/{id}', [HrdController::class, 'update']);
    Route::get('/loker/delete/{id}', [HrdController::class, 'destroy']);
});



// Sesuaikan middleware dengan hak akses yang kamu inginkan
Route::middleware(['auth'])->prefix('produk')->group(function () {
    Route::get('/list', [ProdukController::class, 'index']);
    Route::get('/create', [ProdukController::class, 'create']);
    Route::post('/store', [ProdukController::class, 'store']);
    Route::get('/edit/{id}', [ProdukController::class, 'edit']);
Route::post('/update/{id}', [ProdukController::class, 'update']);
Route::get('/delete/{id}', [ProdukController::class, 'delete']);
    // Nanti tambah route edit/delete di sini
});

use App\Http\Controllers\auth\UserController;

// Grup route untuk Admin User
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/list', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/store', [AdminController::class, 'store']);
    Route::get('/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/update/{id}', [AdminController::class, 'update']);
    Route::get('/delete/{id}', [AdminController::class, 'delete']);
});

// Rute ini bisa dibuka oleh 'admin' ATAU 'absensi'
Route::middleware(['auth', 'ceklevel:admin,absensi'])->group(function () {
    Route::get('/laporan/karyawan', [AdminController::class, 'laporan']);
});