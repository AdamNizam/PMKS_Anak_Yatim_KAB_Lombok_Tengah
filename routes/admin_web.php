<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserlogController;
use App\Http\Controllers\KelasPendidikanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PrestasiFormalController;
use App\Http\Controllers\PrestasiNonFormalController;
use App\Http\Controllers\KecamtanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\SurviorController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\PimpinanController;
use Illuminate\Support\Facades\Route;



// Awal Route Hak Akses Survior
Route::resource('survior', SurviorController::class);
Route::prefix('anak')->group(function () {
	Route::resource('anak', AnakController::class);
	Route::get('importview', [AnakController::class, 'importview'])->name('importview');
	Route::post('import', [AnakController::class, 'importanak'])->name('import');
	Route::get('rekap_hari_ini', [AnakController::class, 'rekap_hari_ini'])->name('rekap_hari_ini');
	Route::get('detail/{id}', [AnakController::class, 'detail'])->name('detail');
	Route::post('upload_gambar', [AnakController::class, 'upload_gambar'])->name('upload_gambar');
});
Route::get('kontak', [SurviorController::class, 'kontak'])->name('kontak');
Route::Post('kontak', [SurviorController::class, 'kontak_s'])->name('kontak_s');
Route::get('profile', [SurviorController::class, 'profile'])->name('profile');

// Akhir Route Hak Akses Survior

// Awal Route Hak Akses Verifikator
Route::resource('verifikator', VerifikatorController::class);
Route::get('verifikasi', [AnakController::class, 'verifikasi'])->name('verifikasi');
Route::get('detail_anak/{id}', [AnakController::class, 'detail_anak'])->name('detail_anak');
Route::get('proses_verifikasi/{id}', [AnakController::class, 'proses_verifikasi'])->name('proses_verifikasi');
Route::get('sudah_verifikasi', [AnakController::class, 'sudah_verifikasi'])->name('sudah_verifikasi');
Route::get('laporan', [AnakController::class, 'laporan'])->name('laporan');
// Akhir Route Hak Akses Verifikator

// Awal Route Hak akses Pimpinan
Route::resource('pimpinan', PimpinanController::class);
Route::get('all', [AnakController::class, 'all'])->name('all');
Route::get('data_anak', [AnakController::class, 'data_anak'])->name('data_anak');
Route::get('hari_ini', [AnakController::class, 'rekapan_hari_ini'])->name('hari_ini');
Route::get('minggu_ini', [AnakController::class, 'rekapan_minggu_ini'])->name('minggu_ini');
Route::get('bulan_ini', [AnakController::class, 'rekapan_bulan_ini'])->name('bulan_ini');
Route::get('tahun_ini', [AnakController::class, 'rekapan_tahun_ini'])->name('tahun_ini');

// Akhir Route Hak akses Pimpinan


// Awal Route Hak Akses Superadmin
//  Raute Dashboard
Route::prefix('dashboard')->group(function () {
	Route::view('superadmin', 'superadmin.dashboard')->name('superadmin');
});
// Route Anak
Route::view('anak_all', 'superadmin.anak')->name('anak_all');

// Route Pekerjaan
Route::resource('pekerjaan', PekerjaanController::class);

// Route Pendidikan
Route::prefix('pendidikan')->group(function () {
	Route::resource('pendidikan', PendidikanController::class);
	Route::resource('kelas', KelasPendidikanController::class);
});
// Route Prestasi
Route::prefix('prestasi')->group(function () {
	Route::resource('non_formal', PrestasiNonFormalController::class);
	Route::resource('formal', PrestasiFormalController::class);
});

// Route Alamat
Route::prefix('alamat')->group(function () {
	Route::resource('kecamatan', KecamtanController::class);
	Route::resource('desa', DesaController::class);
	Route::resource('dusun', DusunController::class);
	// Route::view('dusun', 'superadmin.dusun')->name('dusun');
	Route::get('getdesa', [DusunController::class, 'getdesa']);
});

// Route Pengguna
Route::prefix('pengguna')->group(function () {
	Route::get('all_pendata', [SurviorController::class, 'all_pendata'])->name('all_pendata');
	Route::get('detail_survior/{id}', [SurviorController::class, 'detail'])->name('detail_survior');
	Route::post('update_userlog/{id}', [SurviorController::class, 'update_userlog'])->name('update_userlog');
	// verifikator
	Route::get('all_verifikator', [VerifikatorController::class, 'all_verifikator'])->name('all_verifikator');
	Route::get('detail_verifikator/{id}', [VerifikatorController::class, 'detail'])->name('detail_verifikator');
	Route::post('update_userlog/{id}', [VerifikatorController::class, 'update_userlog'])->name('update_user_verifikator');
});

// Route Manajemn User
Route::prefix('user')->group(function () {
	Route::resource('userlog', UserlogController::class);
	Route::resource('role', RoleController::class);
});

// Akhir Route Hak Akses Superadmin
