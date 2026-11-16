@extends('layouts.app')
@section('title', $title)
@section('content')
    <h1 class="mb-3">{{ $title }}</h1>
    <table class="table table-striped align-middle">
        <thead>
            <tr><th>No</th><th>Layanan</th><th>Harga Mulai</th><th></th></tr>
        </thead>
        <tbody>
            @foreach ($services as $slug => $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s['nama'] }}</td>
                    <td>Rp {{ number_format($s['harga'], 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('services.show', $slug) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection