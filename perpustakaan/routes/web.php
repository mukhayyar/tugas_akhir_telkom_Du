<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\PeminjamanController;

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

Route::get('/', [FrontPageController::class,'index'])->name('front.index');
Route::get('/about', [FrontPageController::class,'about'])->name('front.about');
Route::get('/buku/{buku}', [FrontPageController::class,'detail'])->name('front.detail');
Route::get('/kategori/{kategori}', [FrontPageController::class,'katalog'])->name('front.katalog');
Route::get('/penerbit/{penerbit}', [FrontPageController::class,'penerbit'])->name('front.penerbit');
Auth::routes();


Route::redirect('/register', '/login', 301);
Route::redirect('/password/reset', '/login', 301);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('home.setting');
    Route::put('/admin/dashboard/setting', [App\Http\Controllers\HomeController::class, 'setting_update'])->name('home.setting.update');

    // Route Buku
    Route::get('/admin/dashboard/buku',[BukuController::class,'index'])->name('admin.buku');
    Route::get('/admin/dashboard/buku/tambah',[BukuController::class,'create'])->name('admin.create.buku');
    Route::post('/admin/dashboard/buku/tambah',[BukuController::class,'store'])->name('admin.store.buku');
    Route::get('/admin/dashboard/buku/{buku}',[BukuController::class,'edit'])->name('admin.edit.buku');
    Route::put('/admin/dashboard/buku/{buku}',[BukuController::class,'update'])->name('admin.update.buku');
    Route::delete('/admin/dashboard/buku/{buku}',[BukuController::class,'destroy'])->name('admin.destroy.buku');

    // Route Kategori Buku
    Route::get('/admin/dashboard/kategori',[KategoriController::class,'index'])->name('admin.kategori');
    Route::get('/admin/dashboard/kategori/{kategori}/detail',[KategoriController::class,'show'])->name('admin.show.kategori');
    Route::get('/admin/dashboard/kategori/tambah',[KategoriController::class,'create'])->name('admin.create.kategori');
    Route::post('/admin/dashboard/kategori/tambah',[KategoriController::class,'store'])->name('admin.store.kategori');
    Route::get('/admin/dashboard/kategori/{kategori}',[KategoriController::class,'edit'])->name('admin.edit.kategori');
    Route::put('/admin/dashboard/kategori/{kategori}',[KategoriController::class,'update'])->name('admin.update.kategori');
    Route::delete('/admin/dashboard/kategori/{kategori}',[KategoriController::class,'destroy'])->name('admin.destroy.kategori');

    // Route Penerbit Buku
    Route::get('/admin/dashboard/penerbit',[PenerbitController::class,'index'])->name('admin.penerbit');
    Route::get('/admin/dashboard/penerbit/{penerbit}/detail',[PenerbitController::class,'show'])->name('admin.show.penerbit');
    Route::get('/admin/dashboard/penerbit/tambah',[PenerbitController::class,'create'])->name('admin.create.penerbit');
    Route::post('/admin/dashboard/penerbit/tambah',[PenerbitController::class,'store'])->name('admin.store.penerbit');
    Route::get('/admin/dashboard/penerbit/{penerbit}',[PenerbitController::class,'edit'])->name('admin.edit.penerbit');
    Route::put('/admin/dashboard/penerbit/{penerbit}',[PenerbitController::class,'update'])->name('admin.update.penerbit');
    Route::delete('/admin/dashboard/penerbit/{penerbit}',[PenerbitController::class,'destroy'])->name('admin.destroy.penerbit');

    // Route Member
    Route::get('/admin/dashboard/member',[MemberController::class,'index'])->name('admin.member');
    Route::get('/admin/dashboard/member/{member}/detail',[MemberController::class,'show'])->name('admin.show.member');
    Route::get('/admin/dashboard/member/tambah',[MemberController::class,'create'])->name('admin.create.member');
    Route::post('/admin/dashboard/member/tambah',[MemberController::class,'store'])->name('admin.store.member');
    Route::get('/admin/dashboard/member/{member}',[MemberController::class,'edit'])->name('admin.edit.member');
    Route::put('/admin/dashboard/member/{member}',[MemberController::class,'update'])->name('admin.update.member');
    Route::delete('/admin/dashboard/member/{member}',[MemberController::class,'destroy'])->name('admin.destroy.member');

    // Route Peminjaman
    Route::get('/admin/dashboard/peminjaman',[PeminjamanController::class,'index'])->name('admin.peminjaman');
    Route::get('/admin/dashboard/peminjaman/tambah',[PeminjamanController::class,'create'])->name('admin.create.peminjaman');
    Route::post('/admin/dashboard/peminjaman/tambah',[PeminjamanController::class,'store'])->name('admin.store.peminjaman');
    Route::get('/admin/dashboard/peminjaman/{peminjaman}',[PeminjamanController::class,'show'])->name('admin.show.peminjaman');
    Route::delete('/admin/dashboard/peminjaman/{peminjaman}',[PeminjamanController::class,'destroy'])->name('admin.destroy.peminjaman');

    Route::put('/admin/dashboard/peminjaman/{peminjaman}/kembali',[PeminjamanController::class,'kembaliPeminjaman'])->name('admin.return.peminjaman');
});
