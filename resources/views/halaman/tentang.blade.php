@extends('layouts.app')

@section('content')

<!-- Sejarah -->
<section class="sejarah-singkat">
  <div class="container">
    <h2 class="judul-sejarah">
      Sejarah Singkat Berdirinya Rumah Makan Tadaima
      <span class="underline"></span>
    </h2>
    <div class="konten-sejarah">
      <div class="gambar">
        <img src="/assets/images/sejarah2.JPG" alt="Gambar Owner">
      </div>
      <div class="teks">
       <p>
    Tadaima Ramen and Coffee adalah sebuah rumah makan bernuansa Jepang yang berdiri di Jl. Gereja No. 3C, Balige, Sumatera Utara. Didirikan pada tahun 2023, Tadaima masih memiliki satu cabang dan menjadi rumah makan yang menghadirkan sajian ramen di kota Balige.
</p>
<p>
    Nama 'Tadaima' sendiri diambil dari bahasa Jepang yang berarti “Aku Pulang”, sebuah filosofi orang Jepang yang biasanya diucapkan saat seseorang kembali ke rumah. Dengan filosofi tersebut, Tadaima berharap setiap pengunjung bisa merasakan suasana yang hangat dan akrab seperti di rumah sendiri saat menikmati makanan di sini. Tadaima Ramen and Coffee menyediakan berbagai pilihan menu seperti ramen, dessert, kopi, es krim, dan beberapa menu lokal lainnya seperti nasi dan snack.
</p>
<p>
    Tholhas Tampubolon, selaku pendiri Tadaima Ramen and Coffee, melihat bahwa Balige memiliki potensi besar dalam bidang kuliner. Meski masih tergolong daerah berkembang, minat masyarakat terhadap kuliner modern terus meningkat. Dari situlah muncul ide untuk mendirikan rumah makan dengan konsep yang berbeda, menggabungkan cita rasa Jepang dengan suasana lokal yang ramah dan nyaman.
</p>
<p>
    Dengan desain interior yang hangat dan suasana yang tenang, Tadaima menjadi tempat yang cocok untuk berkumpul, bersantai, atau sekadar menikmati semangkuk ramen hangat. Kehadiran Tadaima diharapkan tidak hanya menjadi pilihan kuliner baru, tetapi juga menjadi bagian dari gaya hidup masyarakat Balige yang semakin terbuka terhadap budaya dan pengalaman baru.
</p>

      </div>
    </div>
  </div>
</section>

<!-- Jam Operasional -->
@php
  use Carbon\Carbon;

  // Buat array kosong untuk menampung hasil grouping
  $grouped = [];

  foreach ($jamOperasional as $jam) {
    $open = Carbon::parse($jam->open_time)->format('H:i');
    $close = Carbon::parse($jam->close_time)->format('H:i');
    $key = $open . ' - ' . $close;
    $grouped[$key][] = $jam->day;
  }

  // Fungsi bantu untuk menyatukan hari berturut-turut
  function formatHari($days) {
    $mapHari = ['senin','selasa','rabu','kamis','jumat','sabtu','minggu'];
    $days = array_map('strtolower', $days);
    $index = array_flip($mapHari);
    sort($days);

    $days = array_unique($days);
    usort($days, function($a, $b) use ($index) {
        return $index[$a] <=> $index[$b];
    });

    $ranges = [];
    $temp = [];

    foreach ($days as $i => $day) {
      if (empty($temp)) {
        $temp[] = $day;
      } else {
        $prev = end($temp);
        if ($index[$day] == $index[$prev] + 1) {
          $temp[] = $day;
        } else {
          $ranges[] = $temp;
          $temp = [$day];
        }
      }
    }
    if (!empty($temp)) {
      $ranges[] = $temp;
    }

    $result = [];
    foreach ($ranges as $range) {
      if (count($range) > 1) {
        $result[] = ucfirst($range[0]) . ' - ' . ucfirst(end($range));
      } else {
        $result[] = ucfirst($range[0]);
      }
    }

    return implode(', ', $result);
  }
@endphp

<section class="jam-operasional" style="background-color: #b30000; padding: 20px 0;">
  <div class="container text-center">
    <h4 class="text-white font-bold mb-1 text-3xl">Jam Operasional</h4>
    <p class="text-white mb-0">
      @foreach ($grouped as $time => $days)
        {{ formatHari($days) }} : {{ $time }}<br>
      @endforeach
    </p>
  </div>
</section>

<!-- karyawan -->
<section class="tim-kami overflow-hidden">
  <div class="container mx-auto">
    <h2 class="text-center font-bold mb-10 text-black drop-shadow-lg">
      Profil Karyawan
    </h2>
    <div class="overflow-hidden relative w-full">
      <div class="flex animate-scroll gap-4 w-max">
        @foreach ($karyawans as $karyawan)
          <div class="flex flex-col items-center flex-shrink-0">
            <div class="overflow-hidden">
              <img src="{{ asset('storage/app/public/' . ($karyawan->image ?? 'images/default.jpg')) }}"
                   alt="{{ $karyawan->name }}" class="img-karyawan">
            </div>
            <p class="mt-2 text-center text-black font-medium truncate w-full card-title">
              {{ $karyawan->name }}
            </p>
            <p class="text-center text-gray-600 truncate w-full card-text">
              {{ $karyawan->position }}
            </p>
          </div>
        @endforeach

        @foreach ($karyawans as $karyawan)
          <div class="flex flex-col items-center flex-shrink-0">
            <div class="overflow-hidden">
              <img src="{{ asset('storage/app/public/' . ($karyawan->image ?? 'images/default.jpg')) }}"
                   alt="{{ $karyawan->name }}" class="img-karyawan">
            </div>
            <p class="mt-2 text-center text-black font-medium truncate w-full card-title">
              {{ $karyawan->name }}
            </p>
            <p class="text-center text-gray-600 truncate w-full card-text">
              {{ $karyawan->position }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<style>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll {
  animation: scroll 25s linear infinite;
  display: flex;
}
</style>







<!-- Peta Lokasi -->
<section class="lokasi" data-aos="fade-up">
  <div class="overflow-hidden rounded-xl" style="height: 50 0px;">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15943.982830402778!2d99.0586125!3d2.3333355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e055e68f70a19%3A0x2fd966f88a685ae!2sTadaima%20Ramen%20and%20Coffee!5e0!3m2!1sid!2sid!4v1715765589627!5m2!1sid!2sid" 
      width="100%" 
      height="100%" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>


@include('components.whatsapp-button')

<!-- AOS Init -->
<script>
  AOS.init({ once: true });
</script>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".galeriSwiper", {
    slidesPerView: 1,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,
    grabCursor: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: { slidesPerView: 1 },
      992: { slidesPerView: 1 }
    }
  });
</script>


<style>
  /*sejarah*/
.sejarah-singkat {
  padding: 80px 24px;
  background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                    url('/assets/images/sejarah.JPG');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed; 
  color: #000000;
  font-family: 'Inter', sans-serif;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  transition: background 0.3s ease-in-out;
}

  
  .container {
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .judul-sejarah {
    font-size: 40px;
    text-align: center;
    font-weight: bold;
    margin-bottom: 40px;
    position: relative;
    font-family: 'Inter', sans-serif;
  }
  
  .konten-sejarah {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    gap: 40px;
    padding: 20px;
  }
  
  .konten-sejarah .gambar {
    margin-top: 40px; 
  }
  
  .konten-sejarah .gambar img {
    width: 400px;
    height: 600px;
    object-fit: cover;
    border-radius: 12px;
  }
  
  .konten-sejarah .teks {
    max-width: 900px;
    font-size: 18px;
    font-family: 'Inter', sans-serif;
    line-height: 1.8;
    text-align: justify;
    overflow: visible;
    font-weight: 500;
  }
  
  
  @media (min-width: 1024px) {
    .konten-sejarah {
      flex-direction: row;
      align-items: flex-start;
    }
  
    .konten-sejarah .gambar {
      flex: 1;
    }
  
    .konten-sejarah .teks {
      flex: 2;
      padding-left: 40px;
    }
  }
  
  .sejarah-singkat .konten-sejarah {
  display: flex;
  gap: 20px;
  align-items: flex-start;
}

.sejarah-singkat .gambar img {
  max-width: 100%;
  height: auto;
  display: block;
  border-radius: 8px;
}


/*Profil Karyawan*/
.tim-kami {
    position: relative;
    padding: 4rem 0;
    z-index: 0;
  }
  
  .tim-kami::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 60%;
    width: 100%;
    background: linear-gradient(to right, #AA1D1D, #F17C7C); 
    z-index: -1;
  }
  
  .tim-kami .container h2 {
    text-align: center;
    font-weight: 700;
    margin-bottom: 2.5rem;
  }

  .tim-kami .row {
    --bs-gutter-x: 1.5rem;
  }
  @media (min-width: 1200px) {
    .tim-kami .col-karyawan { flex: 0 0 20%; max-width: 20%; }
  }
  @media (min-width: 768px) and (max-width: 1199.98px) {
    .tim-kami .col-karyawan { flex: 0 0 33.3333%; max-width: 33.3333%; }
  }
  @media (max-width: 767.98px) {
    .tim-kami .col-karyawan { flex: 0 0 100%; max-width: 100%; }
  }
  

  .tim-kami .card {
    border: none;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .tim-kami .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  }
 
  .tim-kami .card-img-top {
    width: 414px;
    height: 350px;
    object-fit: cover;
  }
  
  .tim-kami .card-body {
    padding: 1rem;
    background-color: #fff;
  }
  .tim-kami .card-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #020202;
  }
  .tim-kami .card-text {
    font-size: 16px;
    color: #000000;
    text-transform: capitalize;
  }

  .img-karyawan {
    width: 310px;
    height: 413px;
    object-fit: cover;
    object-position: center;
    border-radius: 0.75rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }
  
  
/* Media query untuk layar kecil (HP) */
@media (max-width: 768px) {
  .sejarah-singkat .konten-sejarah {
    flex-direction: column;
  }
  .sejarah-singkat .gambar,
  .sejarah-singkat .teks {
    width: 100%;
  }
  .sejarah-singkat .gambar {
    margin-bottom: 15px;
  }
}


  .swiper-slide .card:hover img {
    transform: scale(1.05);
  }
  .custom-nav {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, rgb(179, 33, 0), rgb(179, 33, 0));
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 20px;
    transition: 0.3s;
  }
  .custom-nav:hover {
    background: linear-gradient(135deg, rgb(179, 33, 0), rgba(255, 0, 0, 0.61));
    transform: scale(1.1);
  }
  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 20px;
    font-weight: bold;
  }
</style>
<button id="scrollToTopBtn"
  class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full border-2 border-red-600 text-red-600 bg-transparent hover:bg-red-600 hover:text-white flex items-center justify-center transition duration-300"
  aria-label="Kembali ke atas">
  <i class="fas fa-chevron-up" style="font-size: 27px;"></i>
</button>

<!-- Script Scroll to Top -->
<script>
  const btn = document.getElementById("scrollToTopBtn");
  window.onscroll = () => {
    btn.style.display = (window.scrollY > 300) ? "flex" : "none";
  };
  btn.onclick = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
</script>

@endsection
