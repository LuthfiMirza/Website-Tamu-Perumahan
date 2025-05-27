@extends('layouts.satpam')

@php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Tamu;
use App\Models\PenjadwalanSatpam;

// Ambil data tamu hari ini
$today = Carbon::today();
$tamuHariIni = Tamu::whereDate('tanggal', $today)->get();
$tamuMasuk = $tamuHariIni->where('posisi', 'masuk')->count();
$tamuKeluar = $tamuHariIni->where('posisi', 'sudah keluar')->count();
$totalTamu = $tamuHariIni->count();

// Ambil jadwal satpam untuk 3 hari ke depan
$user = Auth::user();
$jadwalSatpam = PenjadwalanSatpam::where('nama', $user->name)->first();
$hariIni = strtolower(Carbon::now()->locale('id')->dayName);
$besok = strtolower(Carbon::tomorrow()->locale('id')->dayName);
$lusa = strtolower(Carbon::tomorrow()->addDay()->locale('id')->dayName);
@endphp

@section('content')
<div class="content">
    <!-- Notifikasi Welcome -->
    @if(session()->has('login_success'))
        <div id="welcome-alert" class="alert alert-success mb-4 animate__animated animate__fadeIn" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; border-left: 5px solid #28a745; margin-bottom: 20px;"> 
            <i class="fas fa-bell mr-2"></i> Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda berhasil login sebagai Satpam. 
        </div>
    
        <script>
            setTimeout(function() {
                const welcomeAlert = document.getElementById('welcome-alert');
                if (welcomeAlert) {
                    welcomeAlert.classList.remove('animate__fadeIn');
                    welcomeAlert.classList.add('animate__fadeOut');
                    setTimeout(() => welcomeAlert.remove(), 1000);
                }
            }, 10000);
        </script>
    @endif

    <!-- Dashboard Content -->
    <div class="page-content active" id="dashboard-content">
        <link rel="stylesheet" href="{{ asset('css/satpam/dashboard.css') }}">
        <h1 class="page-title">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </h1>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalTamu }}</h3>
                    <p>Tamu Hari Ini</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $tamuMasuk }}</h3>
                    <p>Tamu Masuk</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon warning">
                    <i class="fas fa-user-times"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $tamuKeluar }}</h3>
                    <p>Tamu Keluar</p>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tamu Terbaru Hari Ini</h3>
                <div class="card-tools">
                    <button class="btn btn-outline btn-sm" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Jenis Tamu</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Plat Nomor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tamuHariIni->sortByDesc('created_at')->take(5) as $tamu)
                            <tr>
                                <td>{{ Carbon::parse($tamu->jam_masuk)->format('H:i') }}</td>
                                <td>{{ $tamu->jenis_tamu }}</td>
                                <td>{{ $tamu->tujuan }}</td>
                                <td><span class="badge badge-{{ $tamu->posisi == 'masuk' ? 'success' : 'warning' }}">{{ ucfirst($tamu->posisi) }}</span></td>
                                <td>{{ $tamu->plat_nomor }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada tamu hari ini</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Jadwal Jaga Card --> 
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="card-title mb-0"><i class="fas fa-calendar-alt mr-2"></i> Jadwal Jaga Anda</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>Hari</th>
                                <th>Shift</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>({{ ucfirst($hariIni) }})</strong> </td>
                                <td>{{ $jadwalSatpam ? $jadwalSatpam->$hariIni : '-' }}</td>
                                <td>
                                    @if($jadwalSatpam && $jadwalSatpam->$hariIni)
                                        <span class="badge badge-success">Terjadwal</span>
                                    @else
                                        <span class="badge badge-secondary">Tidak ada jadwal</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>({{ ucfirst($besok) }})</strong> </td>
                                <td>{{ $jadwalSatpam ? $jadwalSatpam->$besok : '-' }}</td>
                                <td>
                                    @if($jadwalSatpam && $jadwalSatpam->$besok)
                                        <span class="badge badge-info">Terjadwal</span>
                                    @else
                                        <span class="badge badge-secondary">Tidak ada jadwal</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>({{ ucfirst($lusa) }})</strong> </td>
                                <td>{{ $jadwalSatpam ? $jadwalSatpam->$lusa : '-' }}</td>
                                <td>
                                    @if($jadwalSatpam && $jadwalSatpam->$lusa)
                                        <span class="badge badge-info">Terjadwal</span>
                                    @else
                                        <span class="badge badge-secondary">Tidak ada jadwal</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
    </div>
</div>
