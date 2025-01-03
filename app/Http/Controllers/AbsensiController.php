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
            // Get today's date
            $today = now()->toDateString();

            // Check if presensi already exists for today
            $existingPresensi = Absensi::where('id_karyawan', $id_karyawan)
                ->whereDate('waktu_masuk', $today)
                ->first();

            if ($existingPresensi) {
                // Update the waktu_keluar for the existing record
                $existingPresensi->update([
                    'waktu_keluar' => now(),
                ]);

                return view('qr.success', [
                    'message' => 'Presensi waktu keluar berhasil diperbarui!',
                ]);
            }

            // If no presensi exists for today, create a new one
            Absensi::create([
                'absensi_id' => Absensi::generateAbsensiId(), // Ensure auto-generated ID
                'id_karyawan' => $id_karyawan,
                'waktu_masuk' => now(),
                'waktu_keluar' => now(), // Default null for waktu_keluar
                'jenis_presensi' => 'Masuk',
                'status' => 'Hadir',
                'approval' => FALSE,
            ]);

            return view('qr.success', [
                'message' => 'Presensi berhasil dicatat!',
            ]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error during presensi for karyawan ' . $id_karyawan . ': ' . $e->getMessage());

            // Pass the error message to the view
            return view('qr.success', [
                'message' => 'Terjadi kesalahan saat mencatat presensi.',
                'error' => $e->getMessage(),
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
