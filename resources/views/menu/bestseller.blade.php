@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="font-size: 2.8rem; font-weight: bold;">Menu Terlaris</h2>
    <p class="text-center mb-5" style="max-width: 900px; margin: auto; font-size: 1.1rem;">
        Di sini, Anda akan menemukan berbagai hidangan utama yang disiapkan dengan penuh perhatian dan keahlian. 
        Nikmati hidangan yang menggugah selera, cocok untuk makan siang, makan malam, atau acara spesial Anda.
    </p>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($menus as $menu)
                <div class="swiper-slide">
                    <div class="card shadow border-0" style="border-radius: 20px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" 
                             alt="{{ $menu->name }}" 
                             style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text fw-bold" style="font-size: 1.2rem;">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- SwiperJS Init Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    });
</script>
@endsection
