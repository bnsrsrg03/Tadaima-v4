{{-- resources/views/galeri.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<div class="gallery-wrapper">
  <h2 style="text-align: center; margin-bottom: 20px;">Galleri</h2>
  <div class="gallery-grid">
    @foreach ($galeris as $galeri)
      <div class="gallery-item">
        <img src="{{ asset('storage/app/public/'. $galeri->image) }}" alt="Galeri">
      </div>
    @endforeach
  </div>
</div>

<style>
  .gallery-wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
  }

  .gallery-item {
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .gallery-item img {
    width: 100%;
    height: 100%;
    aspect-ratio: 1/1;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
  }

  .gallery-item img:hover {
    transform: scale(1.05);
  }
</style>

@endsection
