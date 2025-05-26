<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SatpamController extends Controller
{
    /**
     * Menampilkan daftar tamu
     */
    public function daftarTamu(Request $request)
    {
        $query = Tamu::query();
        
        // Filter berdasarkan hari ini jika parameter filter=today
        if ($request->has('filter') && $request->filter === 'today') {
            $today = Carbon::today()->format('Y-m-d');
            $query->whereDate('tanggal', $today);
        }
        
        // Ambil data tamu dan urutkan berdasarkan tanggal terbaru
        $daftarTamu = $query->orderBy('tanggal', 'desc')
                           ->orderBy('jam_masuk', 'desc')
                           ->paginate(10);
        
        return view('satpam.daftar-tamu', compact('daftarTamu'));
    }
    
    /**
     * Export data tamu ke PDF atau Excel
     */
    public function exportTamu($type)
    {
        // Logika untuk export tamu akan diimplementasikan nanti
        return redirect()->back()->with('message', 'Fitur export '.$type.' akan segera tersedia');
    }
    
    /**
     * Logout tamu (mengubah status tamu menjadi sudah keluar)
     */
    public function logoutTamu(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->update([
            'posisi' => 'sudah keluar',
            'jam_keluar' => now()
        ]);

        return redirect()->route('satpam.daftar-tamu')
            ->with('success', 'Tamu berhasil logout.');
    }
    
    /**
     * Simpan data tamu baru
     */
    public function tambahTamu(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jenis_tamu' => 'required|string',
            'plat_nomor' => 'required|string',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'posisi' => 'required|string',
            'tujuan' => 'required|string'
        ]);

        // Handle file upload
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('tamu-images', 'public');
        }

        // Create new guest record
        $tamu = Tamu::create([
            'gambar' => $gambarPath,
            'jenis_tamu' => $request->jenis_tamu,
            'plat_nomor' => $request->plat_nomor,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'posisi' => $request->posisi,
            'tujuan' => $request->tujuan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tamu berhasil ditambahkan',
            'data' => $tamu
        ]);
    }
}