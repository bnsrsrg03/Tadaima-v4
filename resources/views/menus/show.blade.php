@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5 align-items-start">
        <!-- Gambar Menu -->
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $menu->image) }}" 
                 alt="{{ $menu->name }}" 
                 class="img-fluid rounded-4 shadow-sm"
                 style="object-fit: cover; max-height: 400px; width: 100%;">
        </div>

        <!-- Detail Menu -->
        <div class="col-md-6">
            <h2 class="fw-bold mb-4" style="font-size: 1.8rem;">{{ $menu->name }}</h2>

            <h5 class="fw-bold mb-1">Deskripsi</h5>
            <p class="text-dark mb-4" style="font-size: 1.1rem; line-height: 1.7;">
                {{ $menu->description ?? '-' }}
            </p>

            @if($menu->kategori)
                <h5 class="fw-bold mb-1">Kategori</h5>
                <p class="mb-4" style="font-size: 1.1rem;">{{ $menu->kategori->name }}</p>
            @endif

            <h5 class="fw-bold mb-1">Harga</h5>
            <p class="text-dark" style="font-size: 1.1rem;">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </p>

            <div class="mt-5">
               <a href="{{ url()->previous() }}" class="btn btn-secondary px-4">
    Kembali
</a>

            </div>
        </div>
    </div>
</div>
@include('components.whatsapp-button')

@endsection
