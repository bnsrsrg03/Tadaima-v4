<div class="container-fluid py-5 bg-light shadow-sm">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">


        <h2 class="text-center mb-5" style="font-family: 'Inter', sans-serif; font-size: 35px; font-weight: bold;">
            Kenapa harus di Tadaima ?
        </h2>

        <!-- Konten 1 -->
            <div class="row align-items-center">
            <div class="col-md-6 text-center" data-aos="fade-right" data-aos-duration="500">
                <img src="/assets/images/about.jpg" class="img-fluid rounded-circle"
                     style="width: 300px; height: 300px; object-fit: cover;" loading="lazy" alt="Menu beragam">
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                <h4 style="font-family: 'Inter', sans-serif; font-size: 27px; color: #AA1D1D;">
                    Menu yang beragam
                </h4>
                <hr style="border: 1px solid orange; width: 300px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 18px; text-align: justify;">
                    Untuk pengalaman berbeda, kami menyediakan kombinasi menu yang beragam.
                    Meskipun ramen menjadi menu andalan di Tadaima Ramen and Coffee, kami juga
                    menawarkan berbagai hidangan lainnya, seperti cemilan, dan nasi goreng lokal yang khas.
                    Selain itu, pengunjung juga bisa menikmati minuman berupa jus segar dan kopi hangat.
                </p>
            </div>
        </div>
      

        <!-- Konten 2 -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6 text-center" data-aos="fade-left" data-aos-duration="500">
                <img src="/assets/images/keluarga.JPG" class="img-fluid rounded-circle"
                     style="width: 300px; height: 300px; object-fit: cover;" loading="lazy" alt="Cocok ramean">
            </div>
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                <h4 style="font-family: 'Inter', sans-serif; font-size: 27px; color: #AA1D1D;">
                    Cocok untuk Sendiri atau Rame
                </h4>
                <hr style="border: 1px solid orange; width: 450px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 18px; text-align: justify;">
                    Mau makan sendiri sambil baca buku atau kumpul bareng teman? Semua terasa pas di Tadaima.
                    Baik kamu datang sendiri untuk menikmati semangkuk ramen sambil membaca, atau datang bersama
                    teman dan keluarga, kami menyediakan tempat duduk yang sesuai. Meja tersedia untuk dua orang
                    maupun kelompok, sehingga suasana tetap mendukung apapun kebutuhanmu.
                </p>
            </div>
        </div>

        <!-- Konten 3 -->
       <div class="row align-items-center mb-5">
            <div class="col-md-6 text-center" data-aos="fade-right" data-aos-duration="500">
                <img src="/assets/images/meja2.jpg" class="img-fluid rounded-circle"
                     style="width: 300px; height: 300px; object-fit: cover;" loading="lazy" alt="Tempat nyaman">
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                <h4 style="font-family: 'Inter', sans-serif; font-size: 27px; color: #AA1D1D;">
                    Tempat yang Bikin Nyaman
                </h4>
                <hr style="border: 2px solid orange; width: 400px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 18px; text-align: justify;">
                    Dari interior kayu yang hangat, pencahayaan yang tidak terlalu terang, hingga pemilihan furnitur
                    yang sederhana tapi fungsional. Semua dirancang untuk membuat pengunjung merasa tenang dan betah.
                    Setiap sudut ruangan diatur agar tidak terasa sempit, memberikan suasana yang akrab namun tetap lega.
                </p>
            </div>
        </div>

    </div>
</div>


</div>

<!-- AOS JS -->

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        once: true // agar animasi hanya terjadi sekali
    });
</script>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<style>
img.rounded-circle {
    max-width: 100%;
    height: auto;
}

/* Responsif untuk layar kecil */
@media (max-width: 767.98px) {
 h2 {
    font-size: 25px !important;
    padding: 0 15px;
}

h4 {
    font-size: 20px !important;
    text-align: center;
}


    p {
        font-size: 18px !important;
        text-align: justify;
        padding: 0 15px;
    }

    .row.align-items-center {
        flex-direction: column !important;
        text-align: center;
    }

    .col-md-6 {
        padding-bottom: 20px;
    }

    hr {
        margin-left: auto;
        margin-right: auto;
        width: 80% !important;
    }
}

/* Responsif ekstra untuk layar sangat kecil */
@media (max-width: 575.98px) {
    img.rounded-circle {
        width: 200px !important;
        height: 200px !important;
    }

    hr {
        width: 60% !important;
    }
}
</style>
