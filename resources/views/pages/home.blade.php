@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Hero Section -->
    <div class="p-5 mb-4 bg-white border rounded-4 shadow-sm text-center text-lg-start position-relative overflow-hidden">
        <div class="row align-items-center">
            <div class="col-lg-7 py-3">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-shield-check"></i> Pelopor Energi Terbarukan Terpercaya
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3">{{ $tagline }}</h1>
                <p class="lead text-muted mb-4">Wujudkan kemandirian listrik ramah lingkungan untuk masa depan bumi yang lebih hijau, hemat biaya, dan berkelanjutan.</p>
                <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                    <a href="{{ route('services') }}" class="btn btn-warning btn-lg px-4 fw-semibold shadow-sm">
                        <i class="bi bi-grid-fill"></i> Jelajahi Layanan
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-dark btn-lg px-4">
                        <i class="bi bi-chat-dots"></i> Konsultasi Gratis
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Live IoT Telemetry Card -->
            <div class="col-lg-5 text-start">
                <div class="p-4 bg-light rounded-4 border position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="spinner-grow spinner-grow-sm text-success" role="status"></span>
                            <span class="small fw-bold text-secondary text-uppercase" style="font-size: 11px;">Live IoT Telemetry</span>
                        </div>
                        <span class="badge bg-warning bg-opacity-25 text-dark border border-warning px-2.5 py-1 rounded-pill" style="font-size: 11px;">100% Energi Bersih</span>
                    </div>

                    <div class="bg-white p-3 rounded-3 border mb-3">
                        <span class="text-muted" style="font-size: 12px;">Daya Fotovoltaik Real-time</span>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <h3 id="iot-power" class="fw-black mb-0 text-dark fs-2">4.82 <span class="fs-6 fw-bold text-muted">kW</span></h3>
                            <span class="badge bg-success bg-opacity-10 text-success fw-bold" style="font-size: 10px;">+14.2%</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-muted mb-1" style="font-size: 12px;">
                            <span>Penyimpanan Baterai</span>
                            <span class="fw-bold text-dark">86%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 86%;"></div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <div class="bg-white p-2.5 rounded-3 border">
                                <span class="d-block text-muted" style="font-size: 10px;">Emisi Ditekan</span>
                                <strong id="iot-co2" class="text-dark" style="font-size: 13px;">18.4 kg CO₂</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-2.5 rounded-3 border">
                                <span class="d-block text-muted" style="font-size: 10px;">Jaringan</span>
                                <strong class="text-success" style="font-size: 13px;">Optimal On-Grid</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kalkulator Mini Horizontal (Sejajar Lebar dengan Hero Section) -->
    <div class="p-4 p-lg-5 mb-5 bg-white border rounded-4 shadow-sm">
        <div class="row align-items-center g-4">
            <!-- Kiri: Input Tagihan -->
            <div class="col-lg-6">
                <span class="badge bg-warning bg-opacity-25 text-dark border border-warning px-3 py-1 rounded-pill fw-bold mb-2" style="font-size: 11px;">
                    <i class="bi bi-calculator"></i> Simulasi Mandiri
                </span>
                <h4 class="fw-bold text-dark mb-1">Cek Potensi Penghematan Listrik Anda</h4>
                <p class="text-muted small mb-3">Masukkan rata-rata tagihan PLN bulanan untuk mengetahui estimasi kapasitas panel surya.</p>
                
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-end-0 text-muted fw-semibold fs-6">Rp</span>
                    <input type="number" id="tagihanListrik" class="form-control border-start-0 fs-6" placeholder="Contoh: 1500000" value="1000000">
                    <button type="button" onclick="hitungPenghematan()" class="btn btn-warning fw-bold px-4 fs-6">
                        Hitung <i class="bi bi-arrow-right-short"></i>
                    </button>
                </div>
            </div>

            <!-- Kanan: Hasil Langsung Tampil Rapi (2 Kotak) -->
            <div class="col-lg-6">
                <div class="bg-light p-4 rounded-4 border">
                    <div class="row g-3 text-center text-sm-start">
                        <div class="col-sm-6">
                            <div class="bg-white p-3 rounded-3 border h-100">
                                <span class="text-muted d-block mb-1" style="font-size: 12px;">Estimasi Kapasitas Sistem</span>
                                <h4 id="resKapasitas" class="fw-bold text-dark mb-0">2.5 <span class="fs-6 fw-normal text-muted">kWp</span></h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-white p-3 rounded-3 border h-100">
                                <span class="text-muted d-block mb-1" style="font-size: 12px;">Potensi Hemat / Bulan</span>
                                <h4 id="resHemat" class="fw-bold text-success mb-0">Rp 400.000</h4>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 text-center text-sm-start">
                        <small class="text-muted" style="font-size: 11px;">*Estimasi penghematan rata-rata 40% dengan sistem On-Grid.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Layanan Unggulan -->
    <h2 class="h3 fw-bold mb-4 text-center">Layanan Unggulan Kami</h2>
    <div class="row g-4 mb-5">
        @foreach ($services as $slug => $s)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-3 text-warning">
                            <i class="bi bi-solar-panel fs-1"></i>
                        </div>
                        <h3 class="h5 fw-bold">{{ $s['nama'] }}</h3>
                        <p class="text-muted small flex-grow-1">{{ $s['deskripsi'] }}</p>
                        <div class="mt-3 pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">Rp {{ number_format($s['harga'], 0, ',', '.') }}</span>
                            <a href="{{ route('services.show', $slug) }}" class="btn btn-sm btn-dark rounded-pill px-3">
                                Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Skrip JavaScript Kalkulator -->
    <script>
        function hitungPenghematan() {
            let tagihan = document.getElementById('tagihanListrik').value;
            if(!tagihan || tagihan <= 0) {
                alert('Silakan masukkan jumlah tagihan yang valid!');
                return;
            }

            let estimasiHemat = tagihan * 0.40;
            let estimasiKw = (tagihan / 400000).toFixed(1);

            document.getElementById('resKapasitas').innerHTML = estimasiKw + ' <span class="fs-6 fw-normal text-muted">kWp</span>';
            document.getElementById('resHemat').innerText = 'Rp ' + Number(estimasiHemat.toFixed(0)).toLocaleString('id-ID');
        }
    </script>
@endsection