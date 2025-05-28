@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar sebagai card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                    <img src="{{ asset('storage/app/public/' . $menu->image) }}" alt="{{ $menu->name }}" class="card-img-top" style="object-fit: cover; height: 100%; max-height: 400px; border-radius: 15px;">
            </div>
        </div>

        <!-- Deskripsi di samping gambar -->
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div>
                <h2>{{ $menu->name }}</h2>
                <h4 class="mt-3">Deskripsi</h4>
                <p>{{ $menu->description ?? '-' }}</p>
                <p><strong>Kategori:</strong> {{ $menu->kategori->name ?? 'Tidak ada kategori' }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            </div>

            <div class="mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
