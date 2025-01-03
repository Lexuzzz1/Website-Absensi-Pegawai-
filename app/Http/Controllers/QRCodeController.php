<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Karyawan;

class QRCodeController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'User is not authenticated.');
        }
        $employee = Karyawan::with('user')->where('email', $user->email)->first();
        
        return view('qr.generate', compact('employee'));
    }
    public function scan()
    {
        return view('qr.scan');
    }
}
