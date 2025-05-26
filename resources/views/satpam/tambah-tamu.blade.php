@extends('layouts.satpam')

@section('content')
<div id="tambah-tamu-content">
    <div class="card">
        <div class="card-header">
            <h2>Form Tambah Tamu</h2>
        </div>
        <div class="card-body">
            <form id="tamu-form" enctype="multipart/form-data">
                @csrf
                <!-- Gambar --> 
                <div class="mb-4"> 
                    <label for="gambarInput" class="block text-sm font-medium text-gray-700 mb-1">Gambar <span class="text-red-500">*</span></label> 
                    <input type="file" id="gambarInput" name="gambar" accept="image/*" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                </div> 
                
                <!-- Jenis Tamu --> 
                <div class="mb-4"> 
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Tamu <span class="text-red-500">*</span></label> 
                    <div class="flex flex-wrap gap-2"> 
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-50"> 
                            <input type="radio" name="jenis_tamu" value="Tamu Warga" class="accent-blue-600" required> 
                            <i class="fas fa-user-friends text-blue-600"></i> Tamu Warga 
                        </label> 
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-50"> 
                            <input type="radio" name="jenis_tamu" value="Ojek Online" class="accent-cyan-600"> 
                            <i class="fas fa-map-pin text-cyan-600"></i> Ojek Online 
                        </label> 
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-50"> 
                            <input type="radio" name="jenis_tamu" value="Kurir" class="accent-yellow-600"> 
                            <i class="fas fa-truck text-yellow-600"></i> Kurir 
                        </label> 
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-50"> 
                            <input type="radio" name="jenis_tamu" value="Lainnya" class="accent-gray-600"> 
                            <i class="fas fa-question text-gray-600"></i> Lainnya 
                        </label> 
                    </div> 
                </div> 
                
                <!-- Plat Nomor --> 
                <div class="mb-4"> 
                    <label for="platNomor" class="block text-sm font-medium text-gray-700 mb-1">Plat Nomor <span class="text-red-500">*</span></label> 
                    <input type="text" id="platNomor" name="plat_nomor" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                </div> 
                
                <!-- Tanggal --> 
                <div class="mb-4"> 
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal <span class="text-red-500">*</span></label> 
                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                </div> 
                
                <!-- Jam Masuk --> 
                <div class="mb-4"> 
                    <label for="jamMasuk" class="block text-sm font-medium text-gray-700 mb-1">Jam Masuk <span class="text-red-500">*</span></label> 
                    <div class="flex gap-2"> 
                        <input type="time" id="jamMasuk" name="jam_masuk" value="{{ date('H:i') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                        <button type="button" onclick="document.getElementById('jamMasuk').value = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false })" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Sekarang</button> 
                    </div> 
                </div> 
                
                <!-- Jam Keluar --> 
                <div class="mb-4"> 
                    <label for="jamKeluar" class="block text-sm font-medium text-gray-700 mb-1">Jam Keluar</label> 
                    <input type="time" id="jamKeluar" name="jam_keluar" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                </div> 
                
                <!-- Posisi --> 
                <div class="mb-4"> 
                    <label class="block text-sm font-medium text-gray-700 mb-2">Posisi <span class="text-red-500">*</span></label> 
                    <div class="flex gap-2"> 
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-50"> 
                            <input type="radio" name="posisi" value="sedang didalam" class="accent-yellow-600" checked required> 
                            <i class="fas fa-clock text-yellow-600"></i> Di Dalam 
                        </label> 
                    </div> 
                </div> 
                
                <!-- Tujuan --> 
                <div class="mb-4"> 
                    <label for="tujuan" class="block text-sm font-medium text-gray-700 mb-1">Tujuan <span class="text-red-500">*</span></label> 
                    <input type="text" id="tujuan" name="tujuan" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                </div>
                
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">Tambah Tamu</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('tamu-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('{{ route("satpam.tambah-tamu") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '{{ route("satpam.daftar-tamu") }}';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message || 'Terjadi kesalahan saat menambahkan tamu'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan saat menambahkan tamu'
        });
    });
});
</script>
@endsection