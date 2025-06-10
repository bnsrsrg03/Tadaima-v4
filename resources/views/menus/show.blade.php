@extends('layouts.app') 

@section('content')
<div class="container py-5">
    <div class="row g-5 align-items-start">
        <!-- Gambar Menu -->
        <div class="col-md-6">
            <img src="{{ asset('storage/app/public/' . $menu->image) }}" 
                 alt="{{ $menu->name }}" 
                 class="img-fluid rounded-4 shadow-sm"
                 style="object-fit: cover; max-height: 400px; width: 100%;">
        </div>

        <!-- Detail Menu -->
        <div class="col-md-6">
            <h2 class="fw-bold mb-4" style="font-size: 1.8rem;">{{ $menu->name }}</h2>

            <h5 class="fw-bold mb-1">Deskripsi</h5>
            <p class="text-dark mb-4" style="font-size: 1.1rem; line-height: 1.7;">
                {{ $menu->description ?? '-' }}
            </p>

            @if($menu->kategori)
                <h5 class="fw-bold mb-1">Kategori</h5>
                <p class="mb-4" style="font-size: 1.1rem;">{{ $menu->kategori->name }}</p>
            @endif

            <h5 class="fw-bold mb-1">Harga</h5>
            <p class="text-dark" style="font-size: 1.1rem;">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </p>
        </div>
    </div>


<!-- Form Pesan Makanan -->
<div class="mt-5 d-flex justify-content-center">
    <div class="border rounded shadow-sm p-4" style="max-width: 500px; width: 100%;">
        <h5 class="fw-bold text-center mb-3">Pesan Makanan</h5>

        <div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" class="form-control" required>
            </div>

            <div class="mb-3 row">
                <div class="col-8">
                    <label class="form-label">Menu</label>
                    <input type="text" id="menu" class="form-control" value="{{ $menu->name }}" readonly>
                </div>
                <div class="col-4">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" id="jumlah" class="form-control" min="1" value="1" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="waktu_pengambilan" class="form-label">Waktu Pengambilan</label>
                <input type="text" id="waktu_pengambilan" class="form-control" placeholder="Contoh: Besok jam 12 siang" required>
                <div class="form-text">Isi secara manual sesuai waktu pengambilan</div>
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan Tambahan (opsional)</label>
                <textarea id="catatan" rows="3" class="form-control"></textarea>
            </div>

            <div class="d-grid">
                <button onclick="kirimPesan()" class="btn" style="background-color: #AA1D1D; color: white;">
                    <i class="bi bi-whatsapp"></i> Kirim Pesanan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function kirimPesan() {
        const nama = document.getElementById('nama').value;
        const menu = document.getElementById('menu').value;
        const jumlah = document.getElementById('jumlah').value;
        const waktu = document.getElementById('waktu_pengambilan').value;
        const catatan = document.getElementById('catatan').value;

        const nomorWa = '6281396537191'; 

        let pesan = `Halo, saya ingin memesan:\n\n` +
                    `Nama: ${nama}\n` +
                    `Menu: ${menu}\n` +
                    `Jumlah: ${jumlah}\n` +
                    `Waktu Pengambilan: ${waktu}\n`;

        if (catatan) {
            pesan += `Catatan: ${catatan}`;
        }

        const url = `https://wa.me/${nomorWa}?text=${encodeURIComponent(pesan)}`;
        window.open(url, '_blank');
    }
</script>


    <!-- Penilaian Pembeli -->
    <div class="mt-5 p-4 border rounded shadow-sm">
        <h5 class="fw-bold">Penilaian Pembeli</h5>
        <div class="d-flex align-items-center">
            <span class="fs-2 text-warning me-2">★</span>
            <strong class="fs-4">{{ number_format($menu->rating, 1) }}/5</strong>
        </div>
        <small class="text-muted">{{ $totalPenilaian }} Penilaian, {{ $totalUlasan }} Ulasan</small>

        <div class="mt-3">
            @for ($i = 5; $i >= 1; $i--)
                <div class="d-flex align-items-center mb-1">
                    <span class="me-2">{{ $i }} ★</span>
                    <div class="progress flex-grow-1 me-2" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $ratingPercentage[$i] ?? 0 }}%;"></div>
                    </div>
                    <span>({{ $ratingCount[$i] ?? 0 }})</span>
                </div>
            @endfor
        </div>
    </div>

    <!-- Tombol Buat Penilaian -->
    <div class="mt-4">
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ulasanModal">Buat Penilaian & Ulasan</a>
    </div>

    <!-- Ulasan -->
    <div class="mt-4">
        <h5 class="fw-bold mb-3">Ulasan</h5>
        @forelse ($ulasan as $review)
            <div class="border rounded p-3 mb-3">
                <div class="mb-1 text-warning">
                    @for ($i = 1; $i <= 5; $i++)
                        <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
                    @endfor
                </div>
                <p class="mb-0">{{ $review->comment }}</p>
            </div>
        @empty
            <p>Belum ada ulasan.</p>
        @endforelse

        {{ $ulasan->links() }} <!-- Paginasi -->
    </div>
</div>

<!-- Modal Form Ulasan -->
<div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-primary">
      <div class="modal-body text-center">
        <!-- Rating (bintang) -->
        <div class="mb-3">
          @for ($i = 1; $i <= 5; $i++)
            <i class="fa fa-star-o" id="star-{{ $i }}" onclick="setRating({{ $i }})" style="cursor: pointer; font-size: 24px;"></i>
          @endfor
        </div>

        <!-- Form ulasan -->
        <form action="{{ route('ulasan.store', $menu->id) }}" method="POST">
            @csrf
            <input type="hidden" name="rating" id="rating-value" value="0">
            <textarea name="comment" class="form-control mb-3" rows="4" placeholder="Isi Ulasan" required></textarea>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <!-- Catatan -->
        <p class="text-danger mt-2" style="font-size: 12px;">
            *Setelah mengirim ulasan, ulasan Anda akan ditampilkan secara permanen dan tidak dapat dihapus atau diedit, kecuali oleh admin yang mengelolanya.
        </p>
      </div>
    </div>
  </div>
</div>

@include('components.whatsapp-button')
@endsection

@push('styles')
<!-- Font Awesome for star icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')
<!-- Script untuk mengatur rating -->
<script>
    function setRating(rating) {
        document.getElementById('rating-value').value = rating;
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById('star-' + i);
            if (i <= rating) {
                star.classList.remove('fa-star-o');
                star.classList.add('fa-star');
            } else {
                star.classList.remove('fa-star');
                star.classList.add('fa-star-o');
            }
        }
    }
</script>
@endpush
