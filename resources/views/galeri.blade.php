{{-- resources/views/galeri.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<div class="gallery-wrapper">
  <h2 style="text-align: center; margin-bottom: 20px;">Gallery</h2>
  <div class="gallery-grid">
    @foreach ($galeris as $index => $galeri)
      <div class="gallery-item">
        @if ($index === 0)
          <video autoplay muted loop>
            <source src="{{ asset('assets/images/vidio1.mp4') }}" type="video/mp4">
            Browser Anda tidak mendukung tag video.
          </video>
        @else
          <img src="{{ asset('storage/app/public/'. $galeri->image) }}" alt="Galeri">
        @endif
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

  .gallery-item img,
  .gallery-item video {
    width: 100%;
    height: 100%;
    aspect-ratio: 1/1;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
  }

  .gallery-item img:hover,
  .gallery-item video:hover {
    transform: scale(1.05);
  }
</style>


@endsection
