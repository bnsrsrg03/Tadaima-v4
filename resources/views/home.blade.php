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
     <h1 class="text-[48px] md:text-[64px] lg:text-[80px] font-bold brand-title">TADAIMA</h1>
            <p class="text-xl">Ramen and Coffee</p>
        </div>
    </section>

{{-- About Section --}}
<section class="about bg-white py-8" data-aos="fade-up" data-aos-duration="1000">
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
         style="height: 600px; background-image: url('{{ asset('assets/images/denah.jpg') }}'); background-size: cover; background-position: center;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.7);"></div>

        <div class="position-absolute top-50 start-0 translate-middle-y ps-4">

            <div>
   <h4 class="typing">
    <span class="fs-3 fw-bold">Ingin reservasi meja?</span><br>
    <span class="fs-6">Hubungi kami langsung melalui WhatsApp untuk kemudahan dan respon cepat.</span>
</h4>


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
    <div class="custom-frame border border-light shadow-lg" style="width: 450px; position: relative;">
        <img src="{{ asset('assets/images/denah2.png') }}" class="img-fluid" alt="Thumbnail">
        <div class="corner top-left"></div>
        <div class="corner top-right"></div>
        <div class="corner bottom-left"></div>
        <div class="corner bottom-right"></div>
    </div>
</div>


    </div>
</div>


<style>
    
/* === Hero Section === */
.hero {
    position: relative;
    text-align: center;
    color: white;
    margin-top: 20px; 
}

.hero img {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 95vh;
    display: block;
    margin: 0 auto;
     margin-top: -80px;
}

.hero h1 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.hero p {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 36px;
    z-index: 2;
    font-family: 'Inter', sans-serif; 
}

.hero::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

@font-face {
    font-family: 'Shikamaru';
    src: url('/assets/fonts/Shikamaru.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

.brand-title {
    font-family: 'Shikamaru', sans-serif;
    font-size: 110px; 
    color: white;
}

/* === About Section === */
.about {
    margin: 3rem 0;
    padding: 4rem 0;
    background-color: #fff;
}

.about .container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 40px;
    padding: 50px 20px;
    border-radius: 10px;
}

.about img {
    width: 500px;
    max-width: 100%;
    border-radius: 25px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.about .text {
    max-width: 600px;
}

.about .text h2 {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
}

.about .text p {
    font-size: 18px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 25px;
}

.about .btn {
    background-color: #a51717;
    color: white;
    padding: 14px 28px;
    border-radius: 30px;
    font-size: 16px;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
    transition: background 0.3s ease;
}

.about .btn:hover {
    background-color: #7e1212;
}
@media (max-width: 768px) {
  .about .container {
    flex-direction: column;
    padding: 30px 15px;
    gap: 30px;
  }

  .about img {
    width: 100%;
    max-width: 400px;
    height: auto;
    border-radius: 20px;
  }

  .about .text {
    max-width: 100%;
    text-align: center;
  }

.about .text h2 {
    font-size: 24px;
}

.about .text p {
    font-size: 14px;
    line-height: 1.5;
}


  .about .btn {
    padding: 12px 24px;
    font-size: 14px;
  }
}

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


@media (max-width: 768px) {
  .hero h1 {
    font-size: 32px; 
}

.hero p {
    font-size: 14px; 
    top: 65%; 
}


    .about .text {
        width: 100%;
    }

 .custom-frame {
    width: 100% !important;
    max-width: 350px; 
    margin: 0 auto;
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
    font-size: 16px;
    animation:
      fadeInText 1.5s forwards 0.3s,
      typing 2s steps(20) forwards 0.3s,
      blink 0.6s step-end infinite 2.5s;
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
/*tulisan denah*/
  .typing {
  opacity: 0;
  width: 0;
  white-space: nowrap;
  overflow: hidden;
  border-right: 2px solid #fff;
  animation:
    fadeInText 2s forwards   0.5s,
    typing      3s steps(30) forwards 0.5s,
    blink       0.7s step-end infinite 3.5s;
}

@keyframes fadeInText {
  to { opacity: 1; }
}

@keyframes typing {
  to { width: 100%; }
}

@keyframes blink {
  50% { border-color: transparent; }
}
.typing {
    display: inline-block;  
    opacity: 0;
    width: 0;
    white-space: nowrap;
    overflow: hidden;
    border-right: 2px solid #fff;
    animation:
      fadeInText 2s forwards   0.5s,
      typing      3s steps(30) forwards 0.5s,
      blink       0.7s step-end infinite 3.5s;
  }
  
  @keyframes fadeInText {
    to { opacity: 1; }
  }
  
  @keyframes typing {
    to { width: 100%; }
  }
  
  @keyframes blink {
    50% { border-color: transparent; }
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

