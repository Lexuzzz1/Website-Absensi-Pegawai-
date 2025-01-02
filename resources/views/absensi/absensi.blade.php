@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Tambah Absensi</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee ID</label>
            <input type="number" class="form-control" id="employee_id" name="employee_id" required>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check In Time</label>
            <input type="datetime-local" class="form-control" id="check_in" name="check_in" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Absensi</button>
    </form>
</div>

@endsection
