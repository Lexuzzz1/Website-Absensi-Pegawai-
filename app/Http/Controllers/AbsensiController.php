<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AbsensiController extends Controller
{
    // Fungsi untuk menampilkan semua data absensi
    public function index()
    {
        try {
            $absensi = Absensi::paginate(10);
            return view('absensi.index', compact('absensi'));
        } catch (\Exception $e) {
            Log::error('Error retrieving absensi data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.'
            ], 500);
        }
    }

    // Fungsi untuk presensi berdasarkan QR Code
    public function presensi($id_karyawan)
    {
        try {
            // Periksa apakah presensi sudah ada hari ini
            $today = now()->toDateString();
            $existingPresensi = Absensi::where('id_karyawan', $id_karyawan)
                ->whereDate('waktu_masuk', $today)
                ->first();

            if ($existingPresensi) {
                return view('qr.success', [
                    'message' => 'Anda sudah melakukan presensi hari ini.',
                ]);
            }

            // Catat presensi baru
            Absensi::create([
                'id_karyawan' => $id_karyawan,
                'waktu_masuk' => now(),
                'jenis_presensi' => 'Masuk',
                'status' => 'Hadir',
                'approval' => null,
            ]);

            return view('qr.success', [
                'message' => 'Presensi berhasil dicatat!',
            ]);
        } catch (\Exception $e) {
            Log::error('Error during presensi for karyawan ' . $id_karyawan . ': ' . $e->getMessage());
            return view('qr.success', [
                'message' => 'Terjadi kesalahan saat mencatat presensi.',
            ]);
        }
    }

    // Fungsi untuk menyimpan data absensi manual
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_karyawan' => 'required|integer',
                'waktu_masuk' => 'required|date_format:Y-m-d H:i:s',
                'jenis_presensi' => 'required|string|max:255',
                'status' => 'required|string|max:50',
                'approval' => 'nullable|string|max:50',
            ]);

            Absensi::create($validated);

            return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Error storing absensi: ' . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat menyimpan data absensi.');
        }
    }
}
