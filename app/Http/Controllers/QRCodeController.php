<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    // Menampilkan halaman untuk generate QR Code
     public function showForm()
    {
        return view('generate_qrcode');
    }

    // Menghasilkan QR Code
    public function generateQRCode(Request $request)
    {
        $qrCode = QrCode::size(300)->generate($id_karyawan);

        return response($qrCode, 200, ['Content-Type' => 'image/svg+xml']);
    }

    // Menampilkan halaman scan QR Code
    public function scan()
    {
         $validatedData = $request->validate([
            'data' => 'required|integer',
        ]);

        $idKaryawan = $validatedData['data'];
        $presensiUrl = url('/presensi'.$idKaryawan);
        $code = time();

        // You can adjust the format to your needs 
        // (available formats: png, eps, and svg)
        // Additionally, you can set the QR image size in pixels using ->size(sizeInPixels, e.g., 100).
        // Example: QrCode::format('png')->size(100)->generate($request->link);
        $qr = QrCode::format('png')->generate($request->link);
        $qrImageName = $code . '.png';

        // Save the QR code image to local storage
        Storage::put('public/qr/' . $qrImageName, $qr);

        return view('qr.scan'); // Pastikan file `scan.blade.php` tersedia di direktori `resources/views/qr`
    }
}
