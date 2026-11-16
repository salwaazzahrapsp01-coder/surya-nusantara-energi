@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white p-5 rounded-4 shadow-sm border">
                <h1 class="fw-bold mb-3"><i class="bi bi-headset text-warning"></i> Hubungi Kami</h1>
                <p class="text-muted mb-4">Punya pertanyaan seputar instalasi panel surya atau butuh konsultasi efisiensi energi? Kirimkan pesan melalui formulir di bawah ini.</p>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama Anda">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pesan / Konsultasi</label>
                        <textarea name="pesan" rows="4" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tuliskan detail kebutuhan atau pertanyaan Anda...">{{ old('pesan') }}</textarea>
                        @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm">
                        <i class="bi bi-send-fill"></i> Kirim Pesan Konsultasi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection