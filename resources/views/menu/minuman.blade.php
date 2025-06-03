@extends('layouts.app')

@section('content')
<div class="container py-7 ps-lg-5 ps-md-4">
    <h2 class="text-center mb-5" style="font-size: 2.8rem; font-weight: bold;">Minuman</h2>

    <div class="row justify-content-center">
        @foreach ($menus as $menu)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="fade-up">
                <div class="card shadow-lg position-relative card-hover h-100"
                     style="border-radius: 20px; overflow: hidden;">

                    {{-- Kalau bestseller, tampilkan label best seller --}}
                    @if ($menu->bestseller)
                        <img src="{{ asset('assets/images/bestseller.png') }}" alt="Best Seller" class="best-seller-badge">
                    @endif

                    <a href="{{ route('menus.show', $menu->id) }}">
                        <img src="{{ asset('storage/' . $menu->image) }}"
                             alt="{{ $menu->name }}"
                             class="card-img-top img-fluid"
                             style="object-fit: cover; height: 200px;">
                    </a>

                    <div class="card-body text-center d-flex flex-column justify-content-center px-3">
                        <h4 class="card-title mb-2" style="font-weight: 700;">{{ $menu->name }}</h4>
                        <p class="card-text text-muted mb-3" style="font-size: 1.1rem;">
                            Rp{{ number_format($menu->price, 0, ',', '.') }}
                        </p>

                        @php
                            $nomor = '6281396537191';
                            $nama = $menu->name;
                            $harga = 'Rp' . number_format($menu->price, 0, ',', '.');
                            $pesan = urlencode("Halo, saya ingin memesan $nama dengan harga $harga");
                        @endphp

                        <a href="https://wa.me/{{ $nomor }}?text={{ $pesan }}"
                           target="_blank"
                           class="btn btn-whatsapp mt-auto"
                           style="background-color: #800000; color: white; font-weight: 600; border-radius: 8px; padding: 10px 20px;">
                           <i class="fab fa-whatsapp me-2"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
.card-hover {
    transition: transform 0.3s ease-in-out;
}
.card-hover:hover {
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .card-title {
        font-size: 1rem;
    }
    .card-text {
        font-size: 0.9rem;
    }
    .card-img-top {
        height: 160px !important;
    }
}
</style>

@include('components.whatsapp-button')
<button id="scrollToTopBtn"
  style="display: none;"
  class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full border-2 border-red-600 text-red-600 bg-white hover:bg-red-600 hover:text-white flex items-center justify-center transition duration-300"
  aria-label="Kembali ke atas">
  <i class="fas fa-chevron-up text-red-600 hover:text-white transition duration-300" style="font-size: 27px;"></i>
</button>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("scrollToTopBtn");
        window.addEventListener('scroll', () => {
            btn.style.display = (window.scrollY > 150) ? "flex" : "none";
        });
        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>
@endpush

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 28px rgba(0, 0, 0, 0.15);
}
</style>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
@endsection
