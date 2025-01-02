@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">Scan QR Code</h1>
        <p class="lead text-muted">Arahkan kamera Anda ke QR Code untuk memulai presensi.</p>
    </div>


    <!-- Display QR Code for scanning -->
    <div class="text-center mt-4">
        <h4>QR Code Absensi:</h4>
        <div class="qr-code-display">
            {!! QrCode::size(300)->generate(route('absensi.store')); !!}
        </div>
    </div>

    <!-- Feedback for scanning result -->
    <div id="result" class="text-center mt-4">
        <h5 class="text-success" style="display: none;">Presensi berhasil tercatat!</h5>
    </div>
</div>

@endsection

@push('styles')
    <style>
        #reader {
            width: 100%;
            height: 400px;
        }
        .qr-code-display {
            margin-top: 20px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Redirect ke URL decoded dari QR Code
            window.location.href = decodedText;
        }

        function onScanFailure(error) {
            console.warn(`QR error: ${error}`);
        }

        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start(
            { facingMode: "environment" }, // Menggunakan kamera belakang
            {
                fps: 10, // Frame per detik
                qrbox: { width: 250, height: 250 } // Ukuran kotak QR
            },
            onScanSuccess,
            onScanFailure
        );
    </script>
@endpush
