@extends('layouts.app') 

@section('content')

<div class="container py-4">
    <h2 class="fw-bold mb-4">{{ $menu->name }}</h2>

    <div class="row">
        <div class="col-md-7">
            <div class="mb-3">
                <h5 class="fw-bold">Deskripsi</h5>
                <p>{{ $menu->description ?? '-' }}</p>
            </div>

            @if($menu->kategori)
                <div class="mb-3">
                    <h5 class="fw-bold">Kategori</h5>
                    <p>{{ $menu->kategori->name }}</p>
                </div>
            @endif

            <div class="mb-3">
                <h5 class="fw-bold">Harga</h5>
                <p style="color: #AA1D1D; font-weight: bold;">
                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                </p>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <img src="{{ asset('storage/' . $menu->image) }}"
                    alt="{{ $menu->name }}"
                    class="img-fluid rounded-4 shadow-sm"
                    style="object-fit: cover; max-height: 250px; width:500px;">
            </div>

      <!-- Tombol Kembali & Ulasan -->
<div class="d-flex gap-2 mt-4">
  <a href="{{ url()->previous() }}" class="btn btn-secondary">
    ← Kembali
</a>


    <!-- Tombol Buat Ulasan -->
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ulasanModal">
        Buat Penilaian & Ulasan
    </a>
</div>

        </div>

        <!--Form Pemesanan -->
        <div class="col-md-5">
            <div class="border rounded shadow-sm p-4">
                <h5 class="fw-bold text-center mb-3">Format Pemesanan</h5>

                <div>
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold fs-6">Nama</label>
                        <input type="text" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-8">
                            <label class="form-label fw-bold fs-6">Menu</label>
                            <input type="text" id="menu" class="form-control" value="{{ $menu->name }}" readonly>
                        </div>
                        <div class="col-4">
                            <label for="jumlah" class="form-label fw-bold fs-6">Jumlah</label>
                            <input type="number" id="jumlah" class="form-control" min="1" value="1" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="waktu_pengambilan" class="form-label fw-bold fs-6">Waktu Pengambilan</label>
                        <input type="text" id="waktu_pengambilan" class="form-control" required>
                        <div class="form-text">Tidak menyediakan sistem pengantaran</div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label fw-bold fs-6">Catatan Tambahan (opsional)</label>
                        <textarea id="catatan" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="d-grid">
                        <button onclick="kirimPesan()" class="btn" style="background-color: #AA1D1D; color: white;">
                            <i class="fab fa-whatsapp"></i> Kirim Pesanan
                        </button>
                    </div>
                </div>
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
     <div class="container mt-1 px-3 px-md-5">
    <div class="mt-5 p-4 border rounded-4 shadow-sm bg-white">
        <h4 class="fw-bold mb-3">Penilaian Pembeli</h4>

        <div class="d-flex align-items-center mb-2">
            <span class="fs-1 text-warning me-2">★</span>
            <strong class="fs-3">{{ number_format($menu->rating, 1) }}/5</strong>
        </div>
        <p class="text-muted">{{ $totalPenilaian }} Penilaian • {{ $totalUlasan }} Ulasan</p>

        <!-- Distribusi Rating -->
        <div class="mt-3">
            @for ($i = 5; $i >= 1; $i--)
                <div class="d-flex align-items-center mb-2">
                    <div class="text-nowrap me-2" style="width: 50px;">{{ $i }} ★</div>
                    <div class="progress flex-grow-1 me-2 rounded-pill" style="height: 10px;">
                        <div class="progress-bar bg-warning" role="progressbar" 
                             style="width: {{ $ratingPercentage[$i] ?? 0 }}%; transition: width 0.5s;">
                        </div>
                    </div>
                    <div style="width: 40px;">({{ $ratingCount[$i] ?? 0 }})</div>
                </div>
            @endfor
        </div>
    </div>
 
  <!-- Ulasan -->
<div class="mt-4" id="ulasan">
  
    <h4 class="fw-bold mb-3">Ulasan</h4>
@forelse ($ulasan as $review)
    <div class="review-card bg-white">
        <div class="mb-1 text-warning">
            @for ($i = 1; $i <= 5; $i++)
                <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
            @endfor
        </div>

        @if($review->comment)
            <p class="mb-0">{{ $review->comment }}</p>
        @else
            <p class="text-muted mb-0"><em>(Tidak ada komentar)</em></p>
        @endif
    </div>
@empty
    <p>Belum ada ulasan.</p>
@endforelse




        <div class="pagination-links">
            {{ $ulasan->links() }}
        </div>
    </div>

</div>

<!-- Modal Form Ulasan -->
<div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-primary">
      <div class="modal-body text-center">
        <div class="mb-3">
          @for ($i = 1; $i <= 5; $i++)
            <i class="fa fa-star-o text-warning" id="star-{{ $i }}" onclick="setRating({{ $i }})"
               style="cursor: pointer; font-size: 28px;"></i>
          @endfor
        </div>

        <form action="{{ route('ulasan.store', $menu->id) }}" method="POST" onsubmit="return validateRating();">
          @csrf
          <input type="hidden" name="rating" id="rating-value" value="0">

          <textarea name="comment" class="form-control mb-3" rows="4" placeholder="Tulis komentar Anda..."></textarea>

          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <p class="text-danger mt-2" style="font-size: 12px;">
          *Rating bintang wajib diisi. Setelah mengirim ulasan, data akan ditampilkan secara permanen dan hanya dapat dihapus oleh admin.
        </p>
      </div>
    </div>
  </div>
</div>



@include('components.whatsapp-button')
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')
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
<script>
    function validateRating() {
        const rating = document.getElementById('rating-value').value;

        // Hapus pesan lama jika ada
        const oldAlert = document.getElementById('rating-alert');
        if (oldAlert) {
            oldAlert.remove();
        }

        if (rating === '0') {
            const msg = document.createElement('div');
            msg.id = 'rating-alert';
            msg.style.color = 'red';
            msg.style.marginTop = '10px';
            msg.innerText = 'Silakan pilih rating bintang terlebih dahulu.';

            // Sisipkan setelah elemen rating
            const ratingEl = document.getElementById('rating-value');
            ratingEl.parentNode.insertBefore(msg, ratingEl.nextSibling);

            return false;
        }

        return true;
    }
</script>


@endpush
<style>
.review-card {
    background-color: #fff;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 24px;

    box-shadow:
        0 4px 8px rgba(0, 0, 0, 0.05),
        0 12px 24px rgba(0, 0, 0, 0.1),
        0 0 8px rgba(255, 215, 0, 0.05); 

    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
}

.review-card:hover {
    transform: translateY(-6px);
    box-shadow:
        0 6px 16px rgba(0, 0, 0, 0.07),
        0 20px 40px rgba(0, 0, 0, 0.12),
        0 0 12px rgba(255, 215, 0, 0.08); 
}


.pagination-links nav {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}
.pagination-links nav > div:first-child {
    display: none !important;
}

.pagination-links nav ul {
    display: flex;
    list-style: none;
    padding: 0;
    gap: 10px;
    flex-wrap: wrap;
}

.pagination-links nav li {
    display: inline-block;
}

.pagination-links nav li a, 
.pagination-links nav li span {
    padding: 8px 12px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 12px;
    text-decoration: none;
    color: #444;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    min-width: 45px;
    text-align: center;
    font-size: 16px !important;
    line-height: 1;
}

.pagination-links nav li a:hover {
    background-color: #28b6ff;
    color: white;
    transform: translateY(-2px);
}
.pagination-links nav li.active span {
    background-color: #337ab7;
    color: white;
    font-weight: bold;
    border: 1px solid #2e6da4;
    border-radius: 4px;
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
}



.pagination-links nav li.disabled span {
    background-color: #f8f8f8;
    color: #bbb;
    cursor: not-allowed;
    box-shadow: none;
    border: 1px solid #eee;
    border-radius: 4px;
}
@media (max-width: 576px) {
    .pagination-links nav ul {
        gap: 5px;
    }

    .pagination-links nav li a, 
    .pagination-links nav li span {
        padding: 8px 12px;
        font-size: 14px;
    }
}
.pagination-links svg {
    width: 16px;
    height: 16px;
}
.pagination-links nav > div > div:first-child {
    display: none !important;
}

</style>