<!-- resources/views/components/menu-terlaris.blade.php -->
<div class="menu-terlaris-section position-relative" 
     style="background-image: url('{{ asset('assets/images/about.jpg') }}'); background-size: cover; background-position: center;">
    
    <!-- Overlay -->
    <div style="background-color: rgba(255, 255, 255, 0.7); position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1;"></div>

    <!-- Content -->
    <section class="menu-terlaris overflow-hidden py-5 position-relative" style="z-index: 2;">
        <div class="container position-relative">
            <h2 class="text-center mb-4" style="font-size: 2.8rem; font-weight: bold;">Menu Terlaris</h2>
            <p class="text-center mb-5" style="max-width: 900px; margin: auto; font-size: 1.1rem;">
                Di sini, Anda akan menemukan berbagai hidangan utama yang disiapkan dengan penuh perhatian dan keahlian. 
                Nikmati hidangan yang menggugah selera, cocok untuk makan siang, makan malam, atau acara spesial Anda.
            </p>

<!-- Tombol Panah Kiri -->
<button class="custom-arrow left-arrow" onclick="scrollMenu('left')">
    &#x276E;
</button>

<!-- Tombol Panah Kanan -->
<button class="custom-arrow right-arrow" onclick="scrollMenu('right')">
    &#x276F;
</button>


            <!-- Scrollable Container -->
            <div class="overflow-hidden" style="pointer-events: none;"> <!-- blokir interaksi langsung -->
                <div id="menuScroll" class="d-flex gap-4 hide-scrollbar no-pointer"
                     style="transform: translateX(0); transition: transform 0.4s ease;">
                   @foreach ($menus as $menu)
    <div class="card shadow border-0 flex-shrink-0" style="width: 300px; border-radius: 20px; overflow: hidden;">
        <!-- Gambar bisa diklik untuk masuk ke detail -->
        <a href="{{ route('menus.show', $menu->id) }}">
            <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top"
                 alt="{{ $menu->name }}"
                 style="height: 250px; object-fit: cover;">
        </a>
        <div class="card-body text-center">
            <h5 class="card-title">{{ $menu->name }}</h5>
            <p class="card-text fw-bold" style="font-size: 1.2rem;">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
@endforeach

                </div>
            </div>
        </div>
    </section>
</div>

<!-- CSS untuk menyembunyikan scrollbar dan mencegah gesture -->
<style>
.hide-scrollbar {
    -ms-overflow-style: none; 
    scrollbar-width: none;
}
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-pointer {
    pointer-events: auto; /* supaya hanya bisa dipanggil via JS */
    user-select: none;
    touch-action: none;
}

.custom-arrow {
    width: 50px;
    height: 50px;
    background-color: #AA1D1D;; /* Merah terang */
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 2rem;
    font-weight: bold;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;

    transition: background-color 0.3s ease, transform 0.2s ease;
}

.custom-arrow:hover {
    background-color: #e60000;
    transform: translateY(-50%) scale(1.1);
}

/* Posisi kiri dan kanan */
.left-arrow {
    left: -20px;
}

.right-arrow {
    right: -20px;
}

@media (max-width: 768px) {
    .menu-terlaris-section h2 {
        font-size: 2rem;
    }

    .menu-terlaris-section p {
        font-size: 1rem;
        padding: 0 15px;
    }

    .custom-arrow {
        width: 40px;
        height: 40px;
        font-size: 1.5rem;
    }

    .left-arrow {
        left: 0;
    }

    .right-arrow {
        right: 0;
    }

    #menuScroll {
        gap: 1rem !important;
    }

    #menuScroll .card {
        width: 250px !important;
    }

    img.card-img-top {
        height: 180px !important;
    }
}

@media (max-width: 480px) {
    .menu-terlaris-section h2 {
        font-size: 1.6rem;
    }

    .menu-terlaris-section p {
        font-size: 0.95rem;
    }

    .custom-arrow {
        width: 35px;
        height: 35px;
        font-size: 1.3rem;
    }

    #menuScroll .card {
        width: 220px !important;
    }

    img.card-img-top {
        height: 160px !important;
    }
}

</style>



<!-- JavaScript Scroll pakai Transform -->
<script>
    let scrollIndex = 0;
    const scrollStep = 320; // lebar item + gap
    const scrollContainer = document.getElementById('menuScroll');

    function scrollMenu(direction) {
        const totalItems = scrollContainer.children.length;
        const maxIndex = totalItems - 1;

        if (direction === 'left' && scrollIndex > 0) {
            scrollIndex--;
        } else if (direction === 'right' && scrollIndex < maxIndex) {
            scrollIndex++;
        }

        scrollContainer.style.transform = `translateX(-${scrollIndex * scrollStep}px)`;
    }
</script>
