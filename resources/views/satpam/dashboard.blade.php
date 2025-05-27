@extends('layouts.satpam')

@php
use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
<div class="content">
    <!-- Notifikasi Welcome -->
    <div class="alert alert-success mb-4 animate__animated animate__fadeIn" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; border-left: 5px solid #28a745; margin-bottom: 20px;">
        <i class="fas fa-bell mr-2"></i> Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Anda berhasil login sebagai Satpam.
    </div>
    
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
                    <h3>24</h3>
                    <p>Tamu Hari Ini</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3>18</h3>
                    <p>Tamu Masuk</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon warning">
                    <i class="fas fa-user-times"></i>
                </div>
                <div class="stat-info">
                    <h3>6</h3>
                    <p>Tamu Keluar</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon danger">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-info">
                    <h3>2</h3>
                    <p>Peringatan</p>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aktivitas Terkini</h3>
                <div class="card-tools">
                    <button class="btn btn-outline btn-sm">
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
                                <th>Nama Tamu</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10:30</td>
                                <td>Budi Santoso</td>
                                <td>Meeting dengan RT</td>
                                <td><span class="badge badge-success">Masuk</span></td>
                                <td>John</td>
                            </tr>
                            <tr>
                                <td>09:45</td>
                                <td>Siti Rahayu</td>
                                <td>Mengunjungi keluarga</td>
                                <td><span class="badge badge-success">Masuk</span></td>
                                <td>John</td>
                            </tr>
                            <tr>
                                <td>11:15</td>
                                <td>Ahmad Rizki</td>
                                <td>Antar paket</td>
                                <td><span class="badge badge-warning">Keluar</span></td>
                                <td>John</td>
                            </tr>
                            <tr>
                                <td>08:30</td>
                                <td>Dewi Lestari</td>
                                <td>Kunjungan rutin</td>
                                <td><span class="badge badge-success">Masuk</span></td>
                                <td>John</td>
                            </tr>
                            <tr>
                                <td>12:00</td>
                                <td>Rudi Hermawan</td>
                                <td>Maintenance AC</td>
                                <td><span class="badge badge-warning">Keluar</span></td>
                                <td>John</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection