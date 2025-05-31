@extends('layouts.app')

@section('content')
<main>
<script>
    AOS.init();
</script>
    {{-- Hero Section --}}
    <section class="hero text-center relative">
        <img src="{{ asset('assets/images/2.jpg') }}" alt="Tadaima Ramen and Coffee" class="w-full h-96 object-cover">
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 text-white">
        <h1 class="text-[110px] font-bold brand-title">TADAIMA</h1>
            <p class="text-xl">Ramen and Coffee</p>
        </div>
    </section>

    {{-- About Section --}}
    <section class="about bg-white py-12" data-aos="fade-up" data-aos-duration="1000">
    <div class="container mx-auto flex flex-col md:flex-row items-center px-4 gap-8">
    <img src="{{ asset('assets/images/about.jpg') }}" alt="Ramen"
     class="w-full h-auto sm:w-[480px] sm:h-[360px] lg:w-[680px] lg:h-[510px] rounded-xl shadow-lg object-cover">
        <div class="text md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
        <h2 class="text-[32px] font-bold mb-4">Tentang Kami</h2>
            <p class="text-[20px] text-gray-700 mb-4">
                Tadaima Ramen and Coffee merupakan rumah makan yang didirikan sejak 2023 dengan nuansa Jepang di Kecamatan Balige, Sumatera Utara.
            </p>
            <a href="{{ route('halaman.tentang') }}" class="btn bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                Baca Selengkapnya
            </a>
        </div>
    </div>
</section>


@php
    $menus = \App\Models\Menu::where('bestseller', true)->get();
@endphp

@include('components.menu-terlaris', ['menus' => $menus])


@include('components.alasan')

{{-- Denah  --}}
<div class="position-relative text-white" data-aos="fade-up" data-aos-duration="1000">

    <div class="position-relative"
         style="height: 600px; background-image: url('{{ asset('assets/images/sejarah.JPG') }}'); background-size: cover; background-position: center;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.8);"></div>

        <div class="position-absolute top-50 start-0 translate-middle-y ps-4">

            <div>
                <h4 class="typing">Pesan Meja Anda &amp; Nikmati Layanan Terbaik!</h4>
            </div>

     <div class="mt-3">
    <a href="https://wa.me/6281396537191?text=Halo%2C%20saya%20ingin%20memesan%20tempat."
       target="_blank"
       class="btn btn-whatsapp"
       style="background-color: #800000; color: white; font-weight: 600; border-radius: 8px; padding: 10px 20px; display: inline-flex; align-items: center; gap: 10px;">
       <i class="fab fa-whatsapp"></i> Pesan Sekarang
    </a>
</div>


        </div>

        <div class="position-absolute bottom-0 end-0 p-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"> 
            <div class="custom-frame border border-light shadow-lg" style="width: 650px; position: relative;">
                <img src="{{ asset('assets/images/denah.jpg') }}" class="img-fluid" alt="Thumbnail">
                <div class="corner top-left"></div>
                <div class="corner top-right"></div>
                <div class="corner bottom-left"></div>
                <div class="corner bottom-right"></div>
            </div>
        </div>

    </div>
</div>


<style>
.custom-frame {
    overflow: hidden;
}

.corner {
    position: absolute;
    width: 40px;
    height: 40px;
    border: 4px solid orange;
    z-index: 10;
}
.top-left {
    top: 0;
    left: 0;
    border-right: none;
    border-bottom: none;
}

.top-right {
    top: 0;
    right: 0;
    border-left: none;
    border-bottom: none;
}


.bottom-left {
    bottom: 0;
    left: 0;
    border-right: none;
    border-top: none;
}

.bottom-right {
    bottom: 0;
    right: 0;
    border-left: none;
    border-top: none;
}

/* Tambahkan ini di bawah style existing */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 48px;
    }

    .hero p {
        font-size: 16px;
    }

    .about .text {
        width: 100%;
    }

    .custom-frame {
        width: 100% !important;
        max-width: 100%;
    }

    .custom-frame img {
        width: 100%;
        height: auto;
    }

    .position-absolute.bottom-0.end-0.p-4 {
        position: static !important;
        margin-top: 20px;
    }

    .position-absolute.top-50.start-0.translate-middle-y.ps-4 {
        position: static !important;
        transform: none !important;
        text-align: center;
        padding: 20px;
    }

    .typing {
        font-size: 20px;
    }

    .btn-whatsapp {
        padding: 8px 16px;
        font-size: 14px;
    }

    .corner {
        width: 25px;
        height: 25px;
        border-width: 2px;
    }

    #scrollToTopBtn {
        width: 40px;
        height: 40px;
    }

    #scrollToTopBtn i {
        font-size: 20px;
    }

}
</style>

</div>
</div>
@include('components.whatsapp-button')

<button id="scrollToTopBtn"
  style="display: none;"
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

