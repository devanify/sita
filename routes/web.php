<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DataPengurusController;
use App\Http\Controllers\DokumenKegiatanController;
use App\Http\Controllers\DokumenUkmController;
use App\Http\Controllers\PrestasiAnggotaController;
use App\Http\Controllers\UserController;
use App\Models\PrestasiAnggota;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Users
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/dashboard', [UserController::class, 'index']);
    // Route::get('/dashboard/pengurusinti',[PengurusController::class, 'pengurusInti'])->middleware('userAccess:PengurusInti');
    // Route::get('/dashboard/pengurus',[PengurusController::class, 'pengurus'])->middleware('userAccess:Pengurus');

    //User
    Route::get("/user", [UserController::class, 'indexPengurus'])->name('user.index');
    Route::get("/user/create", [UserController::class, 'create'])->name('user.create');
    Route::post("/user/store", [UserController::class, 'store'])->name('user.store');
    Route::get("/user/edit/{id}", [UserController::class, 'edit'])->name('user.edit');
    Route::put("/user/{id}", [UserController::class, 'update'])->name('user.update');
    
    //Surat Masuk
    Route::get("/suratmasuk", [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::get("/suratmasuk/create", [SuratMasukController::class, 'create'])->name('suratmasuk.create');
    Route::post('/suratmasuk/store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
    Route::get('/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
    Route::put('/suratmasuk/{id}',[SuratMasukController::class, 'update'])->name('suratmasuk.update');

    // Surat Keluar
    Route::get("/suratkeluar", [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::get("/suratkeluar/create", [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
    Route::post('/suratkeluar/store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
    Route::get('/suratkeluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
    Route::put('/suratkeluar/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');

    // Periode
    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
    Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');
    Route::get('/periode/edit/{id_periode}', [PeriodeController::class, 'edit'])->name('periode.edit');
    Route::put('/periode/{id_periode}', [PeriodeController::class, 'update'])->name('periode.update');
    Route::delete('/periode/delete{id_periode}', [PeriodeController::class, 'destroy'])->name('periode.destroy');

    // Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/inventaris/store', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/inventaris/edit/{id}', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/delete{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create');
    Route::post('/keuangan/store', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::get('/keuangan/edit/{id}', [KeuanganController::class, 'edit'])->name('keuangan.edit');
    Route::put('/keuangan/{id}', [KeuanganController::class, 'update'])->name('keuangan.update');
    
    // Anggota
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    // Anggota
    Route::get('/prestasianggota', [PrestasiAnggotaController::class, 'index'])->name('prestasi_anggota.index');
    Route::get('/prestasi-anggota/search', [PrestasiAnggotaController::class, 'searchAnggota'])->name('prestasi_anggota.search');
    Route::get('/prestasianggota/create', [PrestasiAnggotaController::class, 'create'])->name('prestasi_anggota.create');
    Route::post('/prestasianggota/store', [PrestasiAnggotaController::class, 'store'])->name('prestasi_anggota.store');
    Route::get('/prestasianggota/edit{id}', [PrestasiAnggotaController::class, 'edit'])->name('prestasi_anggota.edit');
    Route::put('/prestasianggota/{id}', [PrestasiAnggotaController::class, 'update'])->name('prestasi_anggota.update');
    Route::delete('/prestasianggota{id}', [PrestasiAnggotaController::class, 'delete'])->name('prestasi_anggota.delete');

    // Dokumen UKM
    Route::get('/dokumen_ukm', [DokumenUkmController::class, 'index'])->name('dokumen_ukm.index');
    Route::get('/dokumen_ukm/view', [DokumenUkmController::class, 'view'])->name('dokumen_ukm.view');
    Route::get('/dokumen_ukm/create', [DokumenUkmController::class, 'create'])->name('dokumen_ukm.create');
    Route::post('/dokumen_ukm/store', [DokumenUkmController::class, 'store'])->name('dokumen_ukm.store');
    Route::get('/dokumen_ukm/edit/{id}', [DokumenUkmController::class, 'edit'])->name('dokumen_ukm.edit');
    Route::put('/dokumen_ukm/{id}', [DokumenUkmController::class, 'update'])->name('dokumen_ukm.update');

    // DOkumen Kegiatan
    Route::get('/dokumen_kegiatan', [DokumenKegiatanController::class, 'index'])->name('dokumen_kegiatan.index');
    Route::get('/dokumen_kegiatan/create', [DokumenKegiatanController::class, 'create'])->name('dokumen_kegiatan.create');
    Route::post('/dokumen_kegiatan/store', [DokumenKegiatanController::class, 'store'])->name('dokumen_kegiatan.store');
    Route::get('/dokumen_kegiatan/edit/{id}', [DokumenKegiatanController::class, 'edit'])->name('dokumen_kegiatan.edit');
    Route::put('/dokumen_kegiatan/{id}', [DokumenKegiatanController::class, 'update'])->name('dokumen_kegiatan.update');
    Route::delete('/dokumen_kegiatan{id}', [DokumenKegiatanController::class, 'destroy'])->name('dokumen_kegiatan.destroy');



});