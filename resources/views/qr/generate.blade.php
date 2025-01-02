@extends('layouts.master')

@section('web-content')
<div class="container mt-5">
    <h1>Generate QR Code</h1>

    <div class="mb-3">
        <label for="id_karyawan" class="form-label">Logged-in ID Karyawan:</label>
        <input type="text" class="form-control" id="id_karyawan" value="{{ $idKaryawan }}" disabled>
    </div>

    <form action="{{ route('qrcode.generate') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate QR Code</button>
    </form>

    @if(isset($qrcode))
        <div class="mt-4">
            <h3>Generated QR Code:</h3>
            <img src="data:image/png;base64,{{ $qrcode }}" alt="QR Code">
        </div>
    @endif
</div>