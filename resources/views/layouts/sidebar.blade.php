<div id="sidebar" class="col-auto sidebar p-0 d-flex flex-column">
    <div class="sidebar-toggler d-flex align-items-center justify-content-between p-3 pb-2 pt-2" id="toggle-btn">
        <a href="" class="text-white text-decoration-none"><h3>Logo</h3></a>
        <i class="bi bi-list text-white"></i>
    </div>
    <ul class="nav flex-column px-3">
        <li class="nav-item mb-3">
        <a href="{{ route('absensi.index') }}" class="nav-link text-white text-decoration-none {{ request()->is('absensi') ? 'active' : '' }}">
            <i class="fas fa-list"></i> <span> Daftar Hadir </span>
        </a>
        </li>
        <li class="nav-item mb-3">
        <a href="{{ route('qr-form') }}" class="nav-link text-white text-decoration-none">
            <i class="fas fa-list"></i> <span> Generate Qr Code</span>
        </a>
        </li>
        <li class="nav-item mb-3">
        <a href="{{ route('absensi.scan') }}" class="nav-link text-white text-decoration-none {{ request()->is('scan') ? 'active' : '' }}">
            <i class="fas fa-qrcode"></i> <span> Scan Qr </span>
        </a>
        </li>
        <li class="nav-item mb-3">
        <a href="#" class="nav-link text-white text-decoration-none"><i class="bi bi-check-circle"></i> <span>Kehadiran</span></a>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-white text-decoration-none"><i class="bi bi-journal-text"></i> <span>Catatan</span></a>
        </li>
        <li class="nav-item mb-3">
          <a href="#" class="nav-link text-white text-decoration-none"><i class="bi bi-gear"></i> <span>Pengaturan</span></a>
        </li>
    </ul>
    <a href="/logout" class="logout nav-item mt-auto m-3 p-2 pl-3d-flex align-items-center text-danger text-decoration-none">
        <i class="bi bi-box-arrow-right"></i> <span class="ms-2">Logout</span>
    </a>
</div>