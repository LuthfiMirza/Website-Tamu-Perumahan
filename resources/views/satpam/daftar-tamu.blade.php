@extends('layouts.satpam')

@section('content')
@if(session('success'))
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
      </script>
      @endif
      
      @if(session('error'))
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
        <p>{{ session('error') }}</p>
      </div>
      @endif
<div id="daftar-tamu-content">
    <div class="card">
        <div class="card-header">
            <h2>Daftar Tamu</h2>
        </div>
        <div class="card-body">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 space-y-2 md:space-y-0">
        <div class="flex flex-wrap gap-2">
          <a href="{{ route('satpam.daftar-tamu') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg text-xs md:text-sm font-medium">Semua Data</a>
          <a href="{{ route('satpam.daftar-tamu', ['filter' => 'today']) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg text-xs md:text-sm font-medium">Data Hari Ini</a>
        </div>
        <div class="flex flex-wrap gap-2">
          <a href="{{ route('satpam.export-tamu', ['type' => 'pdf']) }}" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg text-xs md:text-sm font-medium flex items-center">
            <i class="fas fa-file-pdf mr-1 md:mr-2"></i> Export PDF
          </a>
          <a href="{{ route('satpam.export-tamu', ['type' => 'excel']) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg text-xs md:text-sm font-medium flex items-center">
            <i class="fas fa-file-excel mr-1 md:mr-2"></i> Export Excel
          </a>
        </div>
      </div>
      <style>
        @media (max-width: 768px) {
          .flex-wrap {
            flex-wrap: wrap;
          }
          .gap-2 {
            gap: 0.5rem;
          }
          .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
          }
         
          .text-xs {
            font-size: 0.75rem;
          }
          .mr-1 {
            margin-right: 0.25rem;
          }
        }
      </style>
      
      <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
        <div class="table-responsive">
          <table class="min-w-full text-sm">
            <thead>
              <tr class="bg-blue-900 text-white whitespace-nowrap">
                <th class="py-3 px-3 text-left w-11">No</th>
                <th class="py-3 px-5 text-left w-40">Jenis Tamu</th>
                <th class="py-3 px-1 text-left">Plat Nomor</th>
                <th class="py-3 px-7 text-left w-40">Tanggal</th>
                <th class="py-1 px-1 text-left">Jam Masuk</th>
                <th class="py-3 px-1 text-left">Jam Keluar</th>
                <th class="py-3 px-12 text-left w-40">Status</th>
                <th class="py-3 px-5 text-left w-40">Tujuan</th>
                <th class="py-3 px-5 text-left w-40 ">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if($daftarTamu->count() > 0)
                @foreach($daftarTamu as $index => $tamu)
                <tr class="border-b whitespace-nowrap hover:bg-gray-50">
                  <td class="py-2 px-3">{{ ($daftarTamu->currentPage() - 1) * $daftarTamu->perPage() + $loop->iteration }}</td>
                  <td class="py-2 px-5">
                    @if(strtolower($tamu->jenis_tamu) == 'tamu warga')
                    <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-user-friends"></i> {{ $tamu->jenis_tamu }}
                    </span>
                    @elseif(strtolower($tamu->jenis_tamu) == 'ojek online')
                    <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-motorcycle"></i> {{ $tamu->jenis_tamu }}
                    </span>
                    @elseif(strtolower($tamu->jenis_tamu) == 'kurir')
                    <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-truck"></i> {{ $tamu->jenis_tamu }}
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-user"></i> {{ $tamu->jenis_tamu }}
                    </span>
                    @endif
                  </td>
                  <td class="py-2 px-5">{{ $tamu->plat_nomor ?: '-' }}</td>
                  <td class="py-2 px-5">{{ \Carbon\Carbon::parse($tamu->tanggal)->format('Y-m-d') }}</td>
                  <td class="py-2 px-5">{{ $tamu->jam_masuk }}</td>
                  <td class="py-2 px-5">{{ $tamu->jam_keluar ?: '-' }}</td>
                  <td class="py-2 px-5">
                    @if(strtolower($tamu->posisi) == 'sedang didalam')
                    <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-clock"></i> Di Dalam
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                      <i class="fas fa-sign-out-alt"></i> Sudah Keluar
                    </span>
                    @endif
                  </td>
                  <td class="py-2 px-5">{{ $tamu->tujuan }}</td>
                  <td class="py-2 px-5">
                    @if(strtolower($tamu->posisi) == 'sedang didalam')
                    <form action="{{ route('satpam.logout-tamu', $tamu->id) }}" method="POST" class="inline-block">
                      @csrf
                      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-medium inline-flex items-center gap-1" onclick="return confirm('Apakah Anda yakin ingin logout tamu ini?')">
                        <i class="fas fa-sign-out-alt"></i> Logout
                      </button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="9" class="py-4 text-center text-gray-500">Tidak ada data tamu</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      
      <style>
        @media (max-width: 768px) {
          .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding: 0 1rem;
          }
          
          .table-responsive table {
            width: 100%;
            white-space: nowrap;
          }
          
          .table-responsive th,
          .table-responsive td {
            min-width: 120px;
          }
          
          .table-responsive th:first-child,
          .table-responsive td:first-child {
            position: sticky;
            left: 0;
            background: white;
            z-index: 1;
          }
          
          .flex-wrap {
            flex-wrap: wrap;
          }
          
          .gap-2 {
            gap: 0.5rem;
          }
          
          .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
          }
          
          .text-xs {
            font-size: 0.75rem;
          }
          
          .mr-1 {
            margin-right: 0.25rem;
          }
        }
      </style>
      
      <!-- Pagination -->
      <div class="mt-4">
        <div class="pagination-container">
          {{ $daftarTamu->links() }}
        </div>
      </div>
      
      <style>
        /* Modern Pagination Styling */
        .pagination-container nav {
          display: flex;
          justify-content: center;
          margin-top: 1.5rem;
        }
        
        .pagination-container .flex.justify-between.flex-1 {
          display: none; /* Hide the text information */
        }
        
        .pagination-container nav > div:last-child {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 100%;
        }
        
        .pagination-container .relative.inline-flex.items-center {
          padding: 0.4rem 0.8rem;
          margin: 0 0.2rem;
          border-radius: 0.25rem;
          font-weight: 500;
          font-size: 0.875rem;
          transition: all 0.2s ease;
          border: none;
          background-color: #f7fafc;
          color: #4a5568;
          box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        
        .pagination-container .relative.inline-flex.items-center:hover {
          background-color: #edf2f7;
          color: #2d3748;
          transform: translateY(-1px);
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .pagination-container span[aria-current="page"] .relative.inline-flex.items-center {
          background-color: #4299e1;
          color: white;
          border-color: #4299e1;
          box-shadow: 0 1px 3px rgba(66, 153, 225, 0.5);
        }
        
        .pagination-container .relative.inline-flex.items-center svg {
          width: 0.875rem;
          height: 0.875rem;
        }
        
        /* Disable button styling */
        .pagination-container button[disabled] {
          opacity: 0.5;
          cursor: not-allowed;
        }
        
        /* Add spacing between pagination items */
        .pagination-container span {
          margin: 0 0.1rem;
        }
      </style>
        </div>
    </div>
</div>
@endsection
