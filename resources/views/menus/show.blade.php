@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>{{ $menu->name }}</h2>
    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="max-width: 600px; width: 100%; object-fit: cover; border-radius: 15px;">
    
    <h4 class="mt-4">Deskripsi</h4>
    <p>{{ $menu->description->description ?? 'Deskripsi belum tersedia.' }}</p>
    
    <p><strong>Kategori:</strong> {{ $menu->kategori->name ?? 'Tidak ada kategori' }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
    
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
