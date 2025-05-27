@extends('layouts.app')

@section('content')

<!-- Header -->
<div class="hero-section">
    <img src="/assets/images/keluarga.JPG" alt="Background Ulasan">
    <div class="hero-text">
        Ceritakan Kesan Anda <br> Bersama Kami
    </div>
</div>

<!-- Dua kolom -->
<div class="ulasan-wrapper">
    <!-- Form -->
    <div class="form-section">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('ulasan.store') }}" method="POST">
            @csrf
            <p class="comment-label">Berikan Ulasan Anda</p>
            <textarea name="comment" id="comment" placeholder="Isi disini">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="alert-error">{{ $message }}</div>
            @enderror

          <button type="button" class="submit-btn" onclick="showModal()">Kirim</button>


        </form>
    </div>
    <div id="confirmModal" class="modal">
    <div class="modal-content">
        <p>Setelah mengirim ulasan, ulasan Anda akan ditampilkan secara permanen dan tidak dapat dihapus atau diedit, kecuali oleh admin yang mengelolanya</p>
        <div class="modal-actions">
            <button onclick="closeModal()">Kembali</button>
            <button onclick="submitForm()">Kirim ulasan</button>
        </div>
    </div>
</div>

    <!-- Deskripsi -->
    <div class="desc-section">
        <h2>Ceritakan Rasa, <br> Bagikan Suasana</h2>
        <p>
            Kami sangat menghargai ulasan yang jujur, santun, dan membangun dari anda. Ulasan anda sangat penting untuk membangun kepercayaan pengunjung lain, mengumpulkan masukan berharga, serta memperbaiki layanan dan kualitas kami berdasarkan feedback yang anda berikan.
        </p>
    </div>
</div>

<!-- Daftar Ulasan -->
<div id="ulasans" class="ulasan-list">
    @foreach($ulasans as $ulasan)
        <div class="ulasan-item">
       
           <div class="ulasan-content">
    {{ $ulasan->comment }}
</div>

        </div>
    @endforeach

    <!-- Pagination -->
<div class="pagination-links">
  



<script>
    function showModal() {
        document.getElementById("confirmModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("confirmModal").style.display = "none";
    }

    function submitForm() {
        document.querySelector("form").submit();
    }
</script>

<style>
    .hero-section {
        position: relative;
        width: 100%;
        height: 557px;
        overflow: hidden;
    }

    .hero-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Georgia;
    font-size: 45px;
    font-weight: bold;
    text-align: center;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
}

.comment-label {
    font-size: 18px;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

    .ulasan-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #e5e5e5;
    padding: 70px 20px;
    font-family: Arial, sans-serif;
    box-sizing: border-box;
    flex-wrap: nowrap;
    height: 701px; 
}

.form-section {
    position: absolute; 
    top: 200px; 
    left: 60px; 
    width: 654px;
    height: 293px;
    padding: 20px;
    background-color: white;
    border-radius: 4px;
    z-index: 2;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


.desc-section {
    width: 785px;
    height: 537px;
    background-color: #A85454;
    color: white;
    padding: 50px 30px 30px 150px; 
    border-radius: 4px;
    box-sizing: border-box;
    z-index: 1;
    margin-left: 500px;
}
.submit-btn {
    background-color: #0d9cd4;
    padding: 6px 14px;
    font-size: 12px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    float: right;
    transition: opacity 0.2s ease;
}

.submit-btn:hover {
    opacity: 0.9; /* efek halus saat hover tanpa mengubah ukuran atau warna */
}

.submit-btn:active {
    transform: none; /* hilangkan efek klik membesar/kecil */
}




@media (max-width: 992px) {
    .ulasan-wrapper {
        flex-direction: column;
        align-items: center;
        flex-wrap: wrap;
    }
}



    .form-section textarea {
        width: 100%;
        height: 200px;
        padding: 10px;
        font-size: 16px;
        border-radius: 8px;
        border: none;
        resize: none;
    }

    .form-section button {
        position: absolute;
        bottom: 45px;
        right: 25px;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

   



    .desc-section h2 {
    font-family: Arial, sans-serif; 
    font-size: 45px; 
    font-weight: bold;
    margin-bottom: 10px;
}


.desc-section p {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    line-height: 1.7;
}

    .ulasan-list {
        max-width: 900px;
        margin: 20px auto;
    }

    .ulasan-item {
        display: flex;
        background-color: white;
        margin-bottom: 15px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }



    .ulasan-content {
    background-color: #f1f1f1;
    border-radius: 10px;
      padding: 20px 15px;
    word-break: break-word;
    flex: 1;
    margin-top: 20px;
}


    .alert-success {
        color: green;
        font-weight: bold;
        margin: 15px auto;
        max-width: 800px;
    }

    .alert-error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    @media (max-width: 992px) {
        .ulasan-wrapper {
            flex-direction: column;
            align-items: center;
        }

        .form-section,
        .desc-section {
            width: 100%;
            max-width: 700px;
        }
    }
    .modal {
    display: none; 
    position: fixed; 
    z-index: 10; 
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.4);
    justify-content: center; align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 16px;
    width: 300px;
    text-align: center;
}

.modal-actions {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

.modal-actions button {
    padding: 8px 16px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
}

.modal-actions button:first-child {
    background-color: #f0f0f0;
}

.modal-actions button:last-child {
    background-color: #28b6ff;
    color: white;
}

@media (max-width: 768px) {
    .hero-text {
        font-size: 28px;
        padding: 0 20px;
        text-align: center;
    }

    .ulasan-wrapper {
        flex-direction: column;
        align-items: center;
        padding: 40px 15px;
        height: auto;
    }

    .form-section {
        position: static;
        width: 100%;
        max-width: 100%;
        margin-bottom: 30px;
        height: auto;
        padding: 20px;
    }

    .desc-section {
        width: 100%;
        max-width: 100%;
        margin-left: 0;
        padding: 30px 20px;
        height: auto;
        text-align: left;
    }

    .desc-section h2 {
        font-size: 32px;
    }

    .desc-section p {
        font-size: 18px;
    }

    .ulasan-list {
        padding: 0 15px;
    }

    .ulasan-content {
        padding: 20px 15px;
        margin-top: 0;
    }

    .modal-content {
        width: 90%;
    }
}
@media (max-width: 768px) {
    .form-section button {
        position: static;
        display: flex;
        justify-content: flex-end;
        width: 100%;
        padding-right: 20px;
        font-size: 28px;
        margin-top: 10px;
    }
}
.pagination-links nav {
    display: flex;
    justify-content: center;
    margin-top: 30px;
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


</style>
@include('components.whatsapp-button')
@endsection
