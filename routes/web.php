<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SatpamController;

Route::prefix('filament')->middleware('role:admin')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::prefix('satpam')->group(function () {
    Route::get('/', function () {
        return view('satpam.dashboard');
    });
    Route::get('/login-satpam', function () {
        return view('login-satpam');
    });
    Route::get('/dashboard', function () {
        return view('satpam.dashboard');
    })->name('satpam.dashboard');
    Route::get('/tambah-tamu', function () {
        return view('satpam.tambah-tamu');
    });
    Route::post('/tambah-tamu', [SatpamController::class, 'tambahTamu'])->name('satpam.tambah-tamu');
    Route::get('/daftar-tamu', [SatpamController::class, 'daftarTamu'])->name('satpam.daftar-tamu');
    
    Route::get('/export-tamu/{type}', [SatpamController::class, 'exportTamu'])->name('satpam.export-tamu');
    Route::get('/jadwal-satpam', function () {
        $jadwals = App\Models\PenjadwalanSatpam::all();
        return view('satpam.jadwal-satpam', compact('jadwals'));
    })->name('satpam.jadwal-satpam');
    
    Route::post('/logout-tamu/{id}', [SatpamController::class, 'logoutTamu'])->name('satpam.logout-tamu');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/satpam/login-satpam');
    })->name('logout');
});
