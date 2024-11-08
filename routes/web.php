<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DataPengurusController;

Route::get('/', function(){
    return redirect()->route('login');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    // Users
    Route::get('/logout',[SesiController::class, 'logout']);
    Route::get('/dashboard',[PengurusController::class, 'index']);
    // Route::get('/dashboard/pengurusinti',[PengurusController::class, 'pengurusInti'])->middleware('userAccess:PengurusInti');
    // Route::get('/dashboard/pengurus',[PengurusController::class, 'pengurus'])->middleware('userAccess:Pengurus');

    //Pengurus
    Route::get("/pengurus" , [DataPengurusController::class, 'index'])->name('pengurus.index');
    
    //Surat Masuk
    Route::get("/suratmasuk" , [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::get("/suratmasuk/create" , [SuratMasukController::class, 'create'])->name('suratmasuk.create');
    Route::post('/suratmasuk/store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
    
    // Surat Keluar
    Route::get("/suratkeluar" , [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::get("/suratkeluar/create" , [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
    Route::post('/suratkeluar/store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
    
    // Periode
    Route::get('/periode',[PeriodeController::class, 'index'])->name('periode.index');
    Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');
    Route::get('/periode/edit/{id_periode}', [PeriodeController::class, 'edit'])->name('periode.edit');
    Route::put('/periode/{id_periode}', [PeriodeController::class, 'update'])->name('periode.update');
    Route::delete('/periode/delete{id_periode}', [PeriodeController::class, 'destroy'])->name('periode.destroy');
    
    // Pengurus
    Route::get('/inventaris',[InventarisController::class, 'index'])->name('inventaris.index');  
    Route::get('/inventaris/create',[InventarisController::class, 'create'])->name('inventaris.create');            
    Route::post('/inventaris/store',[InventarisController::class, 'store'])->name('inventaris.store');              
    Route::get('/inventaris/edit/{id}', [InventarisController::class, 'edit'])->name('inventaris.edit');                
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');                
    Route::delete('/inventaris/delete{id}',[InventarisController::class, 'destroy'])->name('inventaris.destroy');   
    
    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create');
    Route::get('/keuangan/edit', [KeuanganController::class, 'edit2'])->name('keuangan.edit');
    
    
});


