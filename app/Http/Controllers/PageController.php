<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private array $services = [
        'panel-surya' => [
            'nama'  => 'Instalasi Panel Surya (PLTS Atap)',
            'harga' => 15000000,
            'durasi'=> '3-5 Hari Kerja',
            'deskripsi' => 'Pemasangan sistem Pembangkit Listrik Tenaga Surya atap berstandar tinggi untuk perumahan, gedung komersial, dan pabrik guna memangkas tagihan listrik bulanan.',
            'fitur' => ['Modul Panel Tier-1', 'Inverter Hybrid Berkualitas', 'Garansi Resmi 20 Tahun', 'Gratis Pemeliharaan 1 Tahun']
        ],
        'audit-energi' => [
            'nama'  => 'Audit & Konsultasi Energi',
            'harga' => 5000000,
            'durasi'=> '1-2 Hari Kerja',
            'deskripsi' => 'Analisis mendalam terhadap pola konsumsi listrik bangunan Anda, mengidentifikasi titik pemborosan, dan memberikan rekomendasi strategi efisiensi energi yang optimal.',
            'fitur' => ['Laporan Analisis Beban', 'Rekomendasi Perangkat Hemat', 'Simulasi Penghematan Biaya']
        ],
        'smart-meter' => [
            'nama'  => 'Smart Meter & IoT Monitoring',
            'harga' => 2500000,
            'durasi'=> '1 Hari Kerja',
            'deskripsi' => 'Sistem pemantauan daya listrik secara real-time melalui aplikasi gawai (smartphone) berbasis teknologi Internet of Things (IoT).',
            'fitur' => ['Akses Real-time 24/7', 'Notifikasi Lonjakan Beban', 'Integrasi WiFi & MQTT']
        ],
    ];

    public function home()
    {
        return view('pages.home', [
            'title'    => 'Beranda',
            'tagline'  => 'Solusi Energi Terbarukan Masa Depan Indonesia',
            'services' => $this->services,
        ]);
    }

    public function about()
    {
        $title = 'Tentang Kami';
        $misi  = [
            'Menyediakan infrastruktur energi surya terpadu yang handal dan terjangkau.',
            'Mendorong percepatan transisi energi hijau menuju Indonesia Net Zero Emission.',
            'Mengembangkan talenta lokal dan inovasi teknologi berbasis efisiensi daya.'
        ];
        return view('pages.about', compact('title', 'misi'));
    }

    public function services()
    {
        return view('pages.services', [
            'title'    => 'Layanan Kami',
            'services' => $this->services,
        ]);
    }

    public function serviceDetail(string $slug)
    {
        $service = $this->services[$slug] ?? abort(404);   

        return view('pages.service-detail', [
            'title'   => $service['nama'],
            'service' => $service,
        ]);
    }

    public function contact()
    {
        return view('pages.contact', ['title' => 'Kontak & Lokasi']);
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'nama'  => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'pesan' => ['required', 'string', 'min:10'],
        ]);

        return back()->with('success', "Terima kasih, {$validated['nama']}. Pesan konsultasi Anda telah berhasil dikirim ke tim kami.");
    }
}