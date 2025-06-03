<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tadaima - Ramen and Coffee</title>

    <link rel="icon" type="image/png" href="{{ url('assets/images/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">

    @livewireStyles
    @stack('styles')
<style>

header.navbar {
    background-color: #AA1D1D;
    padding: 10px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 80px;
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}


.navbar {
  
    z-index: 999;
}

.navbar-container {
    display: flex;
    align-items: center;
    width: 100%;
}

.navbar-left {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-right: auto;
}
.navbar-hidden {
    transform: translateY(-100%);
    transition: transform 0.3s ease;
}

.logo {
    padding-left: 10px; 
    
}

.logo img {
    height: 56px;
    width: 56px;
    object-fit: cover;
    border-radius: 50%;
}

.navbar-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    flex: 1;
}


.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    gap: 35px; 
    margin: 0;
    padding: 0;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    font-weight: 400; 
    font-size: 18px;
    padding: 8px 12px;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.nav-links li a:hover,
 a:hover {
    background-color: #AA1D1D;
    border-radius: 5px;
    border-bottom: 2px solid #fff;
    color: #FFD700;
}

.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #AA1D1D;
    min-width: 150px;
    z-index: 1000;
    top: 100%;
    left: 0;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    list-style: none; 
    padding: 0;
    margin: 0;
}


.dropdown-content li a {
    display: block;
    padding: 10px;
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 400; 
    font-size: 18px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.menu-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #fff;
    margin-right: 20px; 
}


/* === Responsive === */
@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        background-color: #AA1D1D; /* FIXED: tetap merah saat dikecilkan */
        width: 100%;
        position: absolute;
        top: 70px;
        left: 0;
        z-index: 99;
        padding: 20px;
    }

    .nav-links li a {
        color: white;
    }

    .nav-links.active {
        display: flex;
    }
}




    footer {
    background-color: #AA1D1D;
    color: white;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 262px;
    position: relative;
    overflow: hidden;
    box-sizing: border-box;
    padding: 50px 40px;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex: 1;
    gap: 20px;
}

.footer-left {
    display: flex;
    align-items: center;
}

.footer-logo img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
}

.footer-right {
    flex: 1;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

.footer-info,
.footer-contact,
.footer-sosmed {
    max-width: 250px;
    font-size: 15px;
    line-height: 1.2;
}

.footer-info h4,
.footer-contact h4,
.footer-sosmed h4 {
    margin-bottom: 4px;
    font-size: 16px;
}

.footer-info p,
.footer-contact p,
.footer-sosmed p {
    margin: 4px 0;
    font-size: 15px;
    text-align: left;
}

.footer-contact a,
.footer-sosmed a {
    color: white;
    text-decoration: underline;
    word-break: break-word;
}

.footer-bottom {
    text-align: center;
    font-size: 12px;
    padding-top: 8px;
    margin-top: 40px;
    border-top: 1px solid #ffffff;
    width: 100vw; /* agar garis selebar viewport */
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}


/* Tombol login */
.footer-login {
    position: absolute; /* tetap absolute terhadap footer */
    bottom: 65px; /* geser ke atas agar berada di atas garis */
    right: 5px; /* jarak dari kiri */
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(255, 255, 255, 0.4);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(5px);
    transition: all 0.3s ease;
    z-index: 2; /* pastikan tetap di atas elemen lain */
}


.footer-login a {
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
    text-decoration: none;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer-login:hover {
    background-color: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.6);
}

.footer-login a:hover {
    color: white;
}

/* Responsif */
@media (max-width: 768px) {
    footer {
        height: auto;
        padding: 20px;
    }

    .footer-container {
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .footer-left {
        justify-content: center;
    }

    .footer-logo img {
        width: 100px;
        height: 100px;
    }

    .footer-right {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer-info,
    .footer-contact,
    .footer-sosmed {
        max-width: 100%;
    }

    .footer-bottom {
        font-size: 11px;
        margin-top: 10px;
    }
}
</style>
</head>
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
                <li><a href="{{ route('galeri') }}">Galeri</a></li>
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

    <div class="footer-login">
        <a href="{{ url('/admin/login') }}" title="Login Admin">
            <i class="fa-regular fa-user"></i>
        </a>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Tadaima Ramen and Coffee. All rights reserved</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init();

        const toggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        toggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');
        });
    });

    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function () {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>

@livewireScripts
@stack('scripts')
</body>
</html>
