<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Kasir Bakpia') }}</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">

    @auth
    <div class="d-flex">
        {{-- Sidebar --}}
        <aside style="width: 220px; min-height: 100vh; background-color: #e9ecef; padding: 20px;">
    <h5 class="mb-4 text-primary">🔹 Menu</h5>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('kasir.index') }}" class="nav-link {{ request()->routeIs('kasir.index') ? 'active text-white bg-primary' : 'text-dark' }}">
                🛒 Transaksi Kasir
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('produk.index') }}" class="nav-link {{ request()->routeIs('produk.*') ? 'active text-white bg-success' : 'text-dark' }}">
                📦 Kelola Produk
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('kasir.laporan') }}" class="nav-link {{ request()->routeIs('kasir.laporan') ? 'active text-white bg-secondary' : 'text-dark' }}">
                📊 Laporan Penjualan
            </a>
        </li>
        <li class="nav-item mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">🚪 Logout</button>
            </form>
        </li>
    </ul>
</aside>


        {{-- Konten --}}
        <main style="flex-grow: 1; padding: 20px;">
            @yield('content')
        </main>
    </div>
    @endauth

    @guest
    {{-- Tampilan jika belum login --}}
    <main style="padding: 20px;">
        @yield('content')
    </main>
    @endguest

</div>
</body>
</html>
