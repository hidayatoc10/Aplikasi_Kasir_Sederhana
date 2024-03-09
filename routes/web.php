<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ShoppingCartController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', ([AuthController::class, 'login']))->name('login');
    Route::post('/', ([AuthController::class, 'login_post']))->name('login_post');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/logout_admin', ([AuthController::class, 'logout_admin']))->name('logout_admin');
    Route::get('/dashboard_admin', ([AdminController::class, 'dashboard_admin']))->name('dashboard_admin');
    Route::get('/admin/daftar_pengguna_sistem', ([AdminController::class, 'daftar_pengguna_sistem']))->name('daftar_pengguna_sistem');
    Route::get('/admin/view_pengguna_sistem/{created_at}', ([AdminController::class, 'view_pengguna_sistem']))->name('view_pengguna_sistem');
    Route::get('/admin/delete_pengguna_sistem/{created_at}', ([AdminController::class, 'delete_pengguna_sistem']))->name('delete_pengguna_sistem');
    Route::get('/admin/tambah_pengguna_sistem', ([AdminController::class, 'tambah_pengguna_sistem']))->name('tambah_pengguna_sistem');
    Route::post('/admin/tambah_pengguna_sistem', ([AdminController::class, 'tambah_pengguna_sistem_post']))->name('tambah_pengguna_sistem_post');
    Route::get('/admin/edit_pengguna_sistem/{created_at}', ([AdminController::class, 'edit_pengguna_sistem']))->name('edit_pengguna_sistem');
    Route::put('/admin/edit_pengguna_sistem/{created_at}', ([AdminController::class, 'edit_pengguna_sistem_put']))->name('edit_pengguna_sistem_put');
    Route::get('/admin/akun_admin', ([AdminController::class, 'akun_admin']))->name('akun_admin');
    Route::put('/admin/ubah_akun_admin/{created_at}', ([AdminController::class, 'ubah_akun_admin']))->name('ubah_akun_admin');
    Route::get('/admin/ubah_akun_admin/{created_at}', ([AdminController::class, 'ubah_akun']))->name('ubah_akun');
    Route::get('/admin/profil', ([AdminController::class, 'profil']))->name('profil');
    Route::get('/admin/edit_profil_put/{created_at}', ([AdminController::class, 'edit_profil']))->name('edit_profil');
    Route::put('/admin/edit_profil_put/{created_at}', ([AdminController::class, 'edit_profil_put']))->name('edit_profil_put');
    Route::get('/admin/data_produk_admin', ([AdminController::class, 'data_produk_admin']))->name('data_produk_admin');
    Route::get('/admin/tambah_data_produk_admin', ([AdminController::class, 'tambah_data_produk_admin']))->name('tambah_data_produk_admin');
    Route::post('/admin/tambah_data_produk_admin', ([AdminController::class, 'tambah_data_produk_post']))->name('tambah_data_produk_admin');
    Route::get('/admin/delete_produk_admin/{created_at}', ([AdminController::class, 'delete_produk_admin']))->name('delete_produk_admin');
    Route::put('/admin/edit_produk_admin/{created_at}', ([AdminController::class, 'edit_produk_admin']))->name('edit_produk_admin_put');
    Route::get('/admin/edit_produk_admin/{created_at}', ([AdminController::class, 'edit_produk_admin_view']))->name('edit_produk_admin_view');
    Route::get('/admin/print_produk_admin', ([AdminController::class, 'print_produk_admin']))->name('print_produk_admin');
    Route::get('/admin/data_kategori', ([AdminController::class, 'data_categori']))->name('data_categori');
    Route::get('/admin/delete_kategori_admin/{created_at}', ([AdminController::class, 'delete_kategori_admin']))->name('delete_kategori_admin');
    Route::get('/admin/ubah_kategori_admin/{created_at}', ([AdminController::class, 'ubah_kategori_admin']))->name('ubah_kategori_admin');
    Route::put('/admin/ubah_kategori_admin/{created_at}', ([AdminController::class, 'ubah_kategori_admin_put']))->name('ubah_kategori_admin_put');
    Route::get('/admin/tambah_kategori_admin', ([AdminController::class, 'tambah_kategori_admin']))->name('tambah_kategori_admin');
    Route::post('/admin/tambah_kategori_admin', ([AdminController::class, 'tambah_kategori_admin_post']))->name('tambah_kategori_admin_post');
    Route::put('/petugas/update_keterangan/{created_at}', ([PetugasController::class, 'updateKeterangan']))->name('update_keterangan');
    Route::get('/admin/produk_masuk_admin', ([AdminController::class, 'produk_masuk_admin']))->name('produk_masuk_admin');
    Route::get('/admin/delete_produk_masuk/{created_at}', ([PetugasController::class, 'delete_produk_masuk']))->name('delete_produk_masuk_admin');
    Route::get('/admin/data_produk_admin/view', ([AdminController::class, 'data_produk_admin_view']))->name('data_produk_admin_view');
    Route::get('/admin/laporan_penjualan', ([AdminController::class, 'laporan_penjualan']))->name('laporan_penjualann');
    Route::get('/admin/keranjang', ([AdminController::class, 'keranjang']))->name('keranjang');
});

Route::middleware(['auth', 'petugas'])->group(function () {
    Route::get('/dashboard_petugas', ([PetugasController::class, 'dashboard_petugas']))->name('dashboard_petugas');
    Route::get('/logout_petugas', ([AuthController::class, 'logout_petugas']))->name('logout_petugas');
    Route::get('/petugas/akun_petugas', ([PetugasController::class, 'akun_petugas']))->name('akun_petugas');
    Route::put('/petugas/ubah_akun_petugas/{created_at}', ([PetugasController::class, 'ubah_akun_petugas']))->name('ubah_akun_petugas');
    Route::get('/petugas/ubah_akun_petugas/{created_at}', ([PetugasController::class, 'ubah_akun']))->name('ubah_akun');
    Route::get('/petugas/data_produk_petugas', ([PetugasController::class, 'data_produk_petugas']))->name('data_produk_petugas');
    Route::post('/add-to-c/art/{productId}', [PetugasController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/petugas/produk_masuk', ([PetugasController::class, 'produk_masuk']))->name('produk_masuk');
    Route::post('/petugas/update_produk_masuk/{created_at}', ([PetugasController::class, 'update_produk_masuk']))->name('update_produk_masuk');
    Route::get('/petugas/print_produk_masuk/{created_at}', ([PetugasController::class, 'print_produk_masuk']))->name('print_produk_masuk');
    Route::get('/petugas/delete_produk_masuk/{created_at}', ([PetugasController::class, 'delete_produk_masuk']))->name('delete_produk_masuk');
    Route::get('/petugas/laporan_penjualan', ([PetugasController::class, 'laporan_penjualan']))->name('laporan_penjualan');
    Route::get('/petugas/view_produk_masuk/{created_at}', ([PetugasController::class, 'view_produk_masuk']))->name('view_produk_masuk');
    Route::get('/petugas/cart', [PetugasController::class, 'showCart'])->name('cart');
    Route::post('add-to-cart/{id}', [PetugasController::class, 'addToCart'])->name('add_to_cart');
    Route::get('add-to-cart/{id}', [PetugasController::class, 'addToCart'])->name('add_to_cart');
    Route::delete('remove-from-cart', [PetugasController::class, 'deleteProduct'])->name('delete.cart.product');
    Route::post('/checkout', [PetugasController::class, 'checkout'])->name('checkout');
});