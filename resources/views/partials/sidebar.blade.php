<!-- resources/views/partials/sidebar.blade.php -->
@php
    // Mengambil data admin dari session
    $nmAdmin = session('nmAdmin');
    $fotoAdmin = session('fotoAdmin');
    $firstWord = explode(' ', $nmAdmin)[0];
@endphp

<aside class="sidebar">
    <div class="profile-container">
        <div class="circle">
            <img src="{{ asset('storage/fotos/' . session('fotoAdmin')) }}" alt="Admin Photo" class="profile-image">
        </div>
        <!-- Menampilkan teks 'Admin' + kata pertama dari nmAdmin -->
        <p class="admin-text">Admin {{ $firstWord }}</p>
    </div>
    <ul>
        <li class="{{ request()->routeIs('admin.adminpage') ? 'active' : '' }}">
            <a href="{{ route('admin.adminpage') }}">Produk WasteMate</a>
        </li>
        <li class="{{ request()->routeIs('admin.pesanan') ? 'active' : '' }}">
            <a href="{{ route('admin.pesanan') }}">Pesanan Berjalan</a>
        </li>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('admin.leaderboard') ? 'active' : '' }}">
            <a href="{{ route('admin.leaderboard') }}">Leaderboard</a>
        </li>
        <li class="{{ request()->routeIs('admin.pengajuan-setor') ? 'active' : '' }}">
            <a href="{{ route('admin.pengajuan-setor') }}">Pengajuan Setor Sampah</a>
        </li>
        <li class="{{ request()->routeIs('admin.pengajuan-event') ? 'active' : '' }}">
            <a href="{{ route('admin.pengajuan-event') }}">Pengajuan Event</a>
        </li>
        <li class="{{ request()->routeIs('admin.tambah-produk-sampah') ? 'active' : '' }}">
            <a href="{{ route('admin.tambah-produk-sampah') }}">Tambah Produk Sampah</a>
        </li>
    </ul>
</aside>
