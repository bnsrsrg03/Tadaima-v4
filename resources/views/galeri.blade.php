{{-- resources/views/galeri.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<div class="gallery-wrapper">
<h1 style="text-align: center; margin-bottom: 20px;"><strong>Galleri</strong></h1>
  <div class="gallery-grid">
    @foreach ($galeris as $galeri)
      <div class="gallery-item">
        <img src="{{ asset('storage/'. $galeri->image) }}" alt="Galeri">
      </div>
    @endforeach
  </div>
</div>

@include('components.whatsapp-button')



<style>
  .gallery-wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
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

<button id="scrollToTopBtn"
  class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full border-2 border-red-600 text-red-600 bg-transparent hover:bg-red-600 hover:text-white flex items-center justify-center transition duration-300"
  aria-label="Kembali ke atas">
  <i class="fas fa-chevron-up" style="font-size: 27px;"></i>
</button>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("scrollToTopBtn");
        window.addEventListener('scroll', () => {
            btn.style.display = (window.scrollY > 700) ? "flex" : "none";
        });
        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>
@endpush