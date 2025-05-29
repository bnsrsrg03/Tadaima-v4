<!-- resources/views/components/menu-terlaris.blade.php -->
<div class="menu-terlaris-section position-relative" 
     style="background-image: url('{{ asset('assets/images/about.jpg') }}'); background-size: cover; background-position: center;">
    
    <!-- Overlay -->
    <div style="background-color: rgba(255, 255, 255, 0.9); position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1;"></div>

    <!-- Content -->
    <section class="menu-terlaris overflow-hidden py-5 position-relative" style="z-index: 2;">
        <div class="container">
            <h2 class="text-center mb-4" style="font-size: 2.8rem; font-weight: bold;">Menu Terlaris</h2>
            <p class="text-center mb-5" style="max-width: 900px; margin: auto; font-size: 1.1rem;">
                Di sini, Anda akan menemukan berbagai hidangan utama yang disiapkan dengan penuh perhatian dan keahlian. 
                Nikmati hidangan yang menggugah selera, cocok untuk makan siang, makan malam, atau acara spesial Anda.
            </p>

            <div class="overflow-auto">
                <div class="d-flex gap-4" style="width: max-content;">
                    @foreach ($menus as $menu)
                        <div class="card shadow border-0 flex-shrink-0" style="width: 300px; border-radius: 20px; overflow: hidden;">
                            <img src="{{ asset('storage/app/public/' . $menu->image) }}" class="card-img-top"
                                 alt="{{ $menu->name }}"
                                 style="height: 250px; object-fit: cover;">
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
