<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tadaima - Ramen and Coffee</title>
    
    <link rel="icon" type="image/png" href="{{url('assets/images/logo.jpg')}}" class="logo">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">



    {{-- Livewire Styles --}}
    @livewireStyles
    @stack('styles')
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<body>
<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo Tadaima">
            </div>
        </div>
        <nav class="navbar-right">
            <button class="menu-toggle" id="menu-toggle">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                     <li class="dropdown">
                    <a href="#">Menu <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-content">
                        <li><a href="{{ route('menu.makanan') }}">Makanan</a></li>
                        <li><a href="{{ route('menu.minuman') }}">Minuman</a></li>
                        <li><a href="{{ route('menu.cemilan') }}">Cemilan</a></li>
                    </ul>
                </li>
                  <li><a href="{{ route('ulasan.index') }}">Ulasan</a></li>
                <li><a href="{{ route('halaman.tentang') }}">Tentang Kami</a></li>
                   <li><a href="{{ route('galeri') }}"> Galeri</a></li>
                <li class="nav-profile">
                    <a href="{{ url('/admin/login') }}">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>


<main>
    @yield('content')
</main>

<footer>
    <div class="footer-container">
    <div class="footer-left">
        <div class="footer-logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo Tadaima">
        </div>
    </div>
    
    <div class="footer-right">
        <div class="footer-info">
            <h4>Lokasi</h4>
            <p><i class="fas fa-map-marker-alt"></i> Jln Gereja No 3 C, Balige, Sumatera Utara,<br>Indonesia</p>
        </div>

        <div class="footer-contact">
            <h4>Kontak</h4>
            <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/821039256499" target="_blank">+82 10-3925-6499</a></p>
            <p><i class="fas fa-envelope"></i> <a href="mailto:tadaimaramencoffee@gmail.com">tadaimaramencoffee@gmail.com</a></p>
        </div>

        <div class="footer-sosmed">
            <h4>Sosial Media</h4>
            <p><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/tadaimaramen" target="_blank">tadaimaramen</a></p>
            <p><i class="fab fa-tiktok"></i> <a href="https://www.tiktok.com/@tadaimaramen" target="_blank">tadaimaramen</a></p>
        </div>
    </div>
</div>

    <div class="footer-bottom">
        <p>&copy; 2025 Tadaima Ramen and Coffee. All rights reserved</p>
    </div>
</footer>


{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init();

        const toggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        toggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');

            
        });
    });
</script>

@livewireScripts
@stack('scripts')
</body>
</html>
