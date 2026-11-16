@php
    $menu = [
        ['route' => 'home',     'active' => 'home',       'label' => 'Beranda'],
        ['route' => 'about',    'active' => 'about',      'label' => 'Tentang Kami'],
        ['route' => 'services', 'active' => 'services*',  'label' => 'Layanan'],
        ['route' => 'contact',  'active' => 'contact*',   'label' => 'Kontak'],
    ];
@endphp
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-warning" href="{{ route('home') }}">
            <i class="bi bi-sun-fill"></i> Surya Nusantara Energi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-center">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a href="{{ route($item['route']) }}"
                           @class(['nav-link px-3', 'active fw-semibold text-warning' => request()->routeIs($item['active'])])>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
                
                <!-- TOMBOL PENGUJIAN ERROR 404 -->
                <li class="nav-item ms-lg-2">
                    <a href="{{ url('/halaman-yang-pasti-error-404') }}" class="btn btn-outline-danger btn-sm px-3 mt-1 mt-lg-0">
                        <i class="bi bi-exclamation-triangle-fill"></i> Tes Error 404
                    </a>
                </li>

                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <span class="badge bg-success bg-opacity-75 border border-success px-3 py-2">
                        <i class="bi bi-clock-fill"></i> <span id="live-clock">--:--:--</span>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>