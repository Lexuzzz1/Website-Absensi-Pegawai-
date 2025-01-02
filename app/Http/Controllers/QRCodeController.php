<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function showForm()
    {
        // Pass the logged-in user's ID to the view
        $idKaryawan = Auth::user()->id_karyawan ?? 'Unknown ID';
        return view('qr.generate', compact('idKaryawan'));
    }

    public function generate()
    {
        // Fetch the logged-in user's ID
        $idKaryawan = Auth::user()->id_karyawan ?? 'Unknown ID';

        // Generate the QR code
        $qrcode = QrCode::format('png')->size(200)->generate($idKaryawan);
        $base64 = base64_encode($qrcode);

        // Pass the generated QR code to the view
        return view('generate_qrcode', [
            'idKaryawan' => $idKaryawan,
            'qrcode' => $base64,
        ]);
    }
}
