<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #003366;
            position: fixed;
            color: white;
            padding-top: 20px;
        }
        .sidebar h3 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover {
            background-color: #004080;
        }
        .sidebar .nav-link.active {
            background-color: #004080;
        }
        .content {
            margin-left: 230px;
            padding: 20px;
        }
        .content h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>Nama Perusahaan</h3>
    <nav class="nav flex-column">
        <!-- Daftar Kehadiran -->
        <a href="{{ route('absensi.index') }}" class="nav-link {{ request()->is('absensi') ? 'active' : '' }}">
            <i class="fas fa-list"></i> Daftar Hadir
        </a>
        <!-- Scan QR -->
        <a href="{{ route('absensi.scan') }}" class="nav-link {{ request()->is('scan') ? 'active' : '' }}">
            <i class="fas fa-qrcode"></i> Scan QR
        </a>
    </nav>
    <a href="#" class="nav-link text-center mt-auto" style="color:white;">Logout</a>
</div>

<!-- Main Content -->
<div class="content">
    @yield('content')
</div>


</body>
</html>
