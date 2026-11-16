@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white p-5 rounded-4 shadow-sm border mb-4">
                <h1 class="fw-bold text-dark mb-3"><i class="bi bi-info-circle-fill text-warning"></i> Tentang Surya Nusantara Energi</h1>
                <p class="lead text-muted">Kami adalah perusahaan penyedia solusi energi surya terpadu yang berfokus pada transisi energi bersih di Indonesia. Didirikan dengan semangat inovasi, kami membantu sektor perumahan, komersial, dan industri beralih ke energi surya yang mandiri dan berkelanjutan.</p>
                
                <hr class="my-4">

                <h3 class="fw-bold h4 mb-3">Visi Perusahaan</h3>
                <p class="text-muted">Menjadi katalisator utama dalam mewujudkan kedaulatan energi nasional yang bersih, efisien, dan ramah lingkungan.</p>

                <h3 class="fw-bold h4 mt-4 mb-3">Misi Strategis Kami</h3>
                <div class="row g-3">
                    @foreach ($misi as $index => $item)
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-warning d-flex align-items-center">
                                <span class="badge bg-dark rounded-circle p-2 me-3">0{{ $index + 1 }}</span>
                                <span class="fw-semibold text-secondary">{{ $item }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection