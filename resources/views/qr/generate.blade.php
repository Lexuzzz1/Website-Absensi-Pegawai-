@extends('layouts.master')

@section('web-content')
<div class="container mt-5">
    <h1>Generate QR Code</h1>

    <div class="card">
        <div class="card-body">
            @if($employee)
                <p><strong>ID:</strong> {{ $employee->id_karyawan }}</p>
                <p><strong>Name:</strong> {{ $employee->nama }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
            @else
                <p>User is not logged in.</p>
            @endif
        </div>
    </div>

    <button class="btn btn-primary" id="generate-btn">Generate QR Code</button>

    <div class="mt-4">
        <h3>Your QR Code:</h3>
        <canvas id="qrcode"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if($employee)
                // Generate a QR code with a link to the presensi route
                const qrContent = `{{ route('absensi.presensi', ['id_karyawan' => $employee->id_karyawan]) }}`;
                const canvas = document.getElementById('qrcode');

                QRCode.toCanvas(canvas, qrContent, { width: 200, height: 200 }, function (error) {
                    if (error) {
                        console.error('QR Code generation failed:', error);
                    } else {
                        console.log('QR Code generated successfully');
                    }
                });
            @endif
        });
    </script>
</div>
@endsection
