<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tadaima Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Preconnect CDN -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Typography */
        body {
            font-family: 'Inter', sans-serif;
        }

        h2.text-center {
            font-weight: 700;
            font-size: 40px;
            margin-bottom: 3rem;
            color: #AA1D1D;
        }

        h4 {
            font-size: 34px;
            color: #AA1D1D;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        /* Styling garis bawah, beda ukuran tiap konten */
        .hr-1 {
            border: 2px solid orange;
            width: 90%;
            max-width: 480px;
            margin-left: 0;
            margin-bottom: 1rem;
        }

        .hr-2 {
            border: 1.5px solid orange;
            width: 90%;
            max-width: 550px;
            margin-left: 0;
            margin-bottom: 1rem;
        }

        .hr-3 {
            border: 1.5px solid orange;
            width: 90%;
            max-width: 400px;
            margin-left: 0;
            margin-bottom: 1rem;
        }

        /* Paragraph */
        p {
            font-size: 22px;
            text-align: justify;
            line-height: 1.6;
            color: #333;
        }

        /* Image circle */
        .img-fluid.rounded-circle {
            width: 370px;
            height: 370px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .img-fluid.rounded-circle {
                width: 280px;
                height: 280px;
            }

            h2.text-center {
                font-size: 32px;
            }

            h4 {
                font-size: 28px;
            }

            p {
                font-size: 18px;
            }
        }

        @media (max-width: 575.98px) {
            .img-fluid.rounded-circle {
                width: 200px;
                height: 200px;
            }

            h2.text-center {
                font-size: 24px;
            }

            h4 {
                font-size: 22px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid py-5 bg-light shadow-sm">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <h2 class="text-center">
                Kenapa harus di Tadaima ?
            </h2>

            <!-- Konten 1 -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6 text-center" data-aos="fade-right" data-aos-duration="500">
                    <img src="/assets/images/meja2.jpg" class="img-fluid rounded-circle" loading="lazy" alt="Interior tempat nyaman di Tadaima" />
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                    <h4>Tempat yang Bikin Nyaman</h4>
                    <hr class="hr-1" />
                    <p>
                        Dari interior kayu yang hangat, pencahayaan yang tidak terlalu terang, hingga pemilihan furnitur
                        yang sederhana tapi fungsional. Semua dirancang untuk membuat pengunjung merasa tenang dan betah.
                        Setiap sudut ruangan diatur agar tidak terasa sempit, memberikan suasana yang akrab namun tetap lega.
                    </p>
                </div>
            </div>

            <!-- Konten 2 -->
            <div class="row align-items-center mb-5 flex-md-row-reverse">
                <div class="col-md-6 text-center" data-aos="fade-left" data-aos-duration="500">
                    <img src="/assets/images/keluarga.JPG" class="img-fluid rounded-circle" loading="lazy" alt="Tempat cocok untuk makan bersama keluarga dan teman" />
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                    <h4>Cocok untuk Sendiri atau Rame</h4>
                    <hr class="hr-2" />
                    <p>
                        Mau makan sendiri sambil baca buku atau kumpul bareng teman? Semua terasa pas di Tadaima.
                        Baik kamu datang sendiri untuk menikmati semangkuk ramen sambil membaca, atau datang bersama
                        teman dan keluarga, kami menyediakan tempat duduk yang sesuai. Meja tersedia untuk dua orang
                        maupun kelompok, sehingga suasana tetap mendukung apapun kebutuhanmu.
                    </p>
                </div>
            </div>

            <!-- Konten 3 -->
            <div class="row align-items-center">
                <div class="col-md-6 text-center" data-aos="fade-right" data-aos-duration="500">
                    <img src="/assets/images/makanan.JPG" class="img-fluid rounded-circle" loading="lazy" alt="Menu beragam di Tadaima" />
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                    <h4>Menu yang beragam</h4>
                    <hr class="hr-3" />
                    <p>
                        Untuk pengalaman berbeda, kami menyediakan kombinasi menu yang beragam.
                        Meskipun ramen menjadi menu andalan di Tadaima Ramen and Coffee, kami juga
                        menawarkan berbagai hidangan lainnya, seperti cemilan, dan nasi goreng lokal yang khas.
                        Selain itu, pengunjung juga bisa menikmati minuman berupa jus segar dan kopi hangat.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ once: true });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
