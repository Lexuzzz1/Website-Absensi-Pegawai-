@extends('layouts.master')

@section('web-content')

<div class="container">
    <h1>Daftar Kehadiran</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Check In</th>
                <th>Check Out</th> 
                <th>Jenis Presensi</th>
                <th>Status</th>
                <th>Approval</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $item)
                <tr>
                    <td>{{ $item->id_karyawan }}</td> 
                    <td>{{ $item->waktu_masuk }}</td>
                    <td>{{ $item->waktu_keluar }}</td>
                    <td>{{ $item->jenis_presensi }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->approval }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $absensi->links() }}
    </div>
</div>

@endsection
