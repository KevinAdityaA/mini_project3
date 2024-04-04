<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Bagian Header -->
<header class="bg-dark text-white py-4">
    <div class="container text-center">
        <h1>Welcome to IndoGame</h1>
    </div>
</header>

<!-- Bagian Navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Tombol hamburger untuk tampilan mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Kontainer untuk link navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#News">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#About">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kirim">Contact</a>
                </li>
            </ul>
            <a class="btn btn-outline-light" href="login.php">Login</a>
        </div>
    </div>
</nav>


<!-- Bagian Konten Home -->
<section id= "Home">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.akamai.steamstatic.com/steam/apps/638970/capsule_616x353.jpg?t=1685702171" 
                class="d-block w-100" alt="..." style="max-height: 500px;">
            </div>
            <div class="carousel-item">
                <img src="https://awsimages.detik.net.id/community/media/visual/2023/04/02/game-tanah-air-troublemaker-resmi-rilis-diskon-20-di-steam_169.jpeg?w=600&q=90"
                class="d-block w-100" alt="..." style="max-height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discover the World of Gaming</h5>
                    <p>Explore our collection of exciting games and immerse yourself in thrilling adventures.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://awsimages.detik.net.id/community/media/visual/2022/11/10/2-game-lokal-ini-akan-rilis-di-ps4-dan-ps5-pada-tahun-2023_169.png?w=600&q=90"
                class="d-block w-100" alt="..." style="max-height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discover the World of Gaming</h5>
                    <p>Explore our collection of exciting games and immerse yourself in thrilling adventures.</p>
                </div>
            </div>
            <!-- Tambahkan gambar-gambar tambahan di sini sesuai kebutuhan -->
        </div>
    </div>  
</section>

<!-- Bagian Konten Game News -->
<section id="News" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Game News</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2024/03/19/steam-spring-sale-2024-digelar-diskonnya-gede-banget-hingga-95_169.jpeg?w=700&q=90" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">"Steam Spring Sale 2024 Digelar, Diskonnya Gede Banget Hingga 95%"</h3>
                        <p class="card-text">Ngabuburit makin seru sembari main game PC yang murahnya di luar nalar. Soalnya, Valve kembali menggelar Steam Spring Sale, dengan potongan harga mencapai 95%. Penawaran menarik tersebut berlangsung sejak tanggal 14 Maret lalu, dan akan segera berakhir pada 21 Maret mendatang. Jadi ini merupakan momen paling tepat bagi gamer, yang ingin menambah koleksi game-nya. Sebab di sini tidak hanya harganya murah, tetapi juga kualitas permainan yang disuguhkan luar biasa. Banyak game AAA yang didiskon, seperti God of War sekarang dibanderol Rp 364.500 dari Rp 729 ribu."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2024/03/28/genshin-impact.jpeg?w=700&q=90" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">"Kembangkan Talenta Digital Indonesia, Genshin Impact Sumbang Rp 157 Juta</h3>
                        <p class="card-text">Hoyoverse, pembuat Genshin Impact, mengadakan serangkaian acara di Jakarta, Bandung, Semarang dan Surabaya mulai 31 Maret hingga 7 April 2024. Dalam acara tersebut, Hoyoverse menjajakan merchandise Genshin Impact, dan para pengunjung acara bisa menikmati berbagai aktivitas dan tantangan berhadiah merchandise, juga bertemu cosplayer. Sebagian dari semua hasil penjualan merchandise di serangkaian acara tersebut, ditambah dengan USD 10.000, atau sekitar Rp 157 juta akan disumbangkan ke inisiatif Youth Digital Acceleration Program, yang bertujuan mengembangkan talenta digital Indonesia, milik Yayasan Cinta Anak Bangsa (YCAB) Foundation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2024/03/06/nintendo-menang-gugatan-kreator-emulator-yuzu-bayar-rp-378-miliar_169.png?w=700&q=90" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">"Nintendo Menang Gugatan Pembajakan, Kreator Yuzu Bayar Rp 38 M"</h3>
                        <p class="card-text">Jakarta - Akhirnya setelah seminggu melayangkan gugatan, Nintendo berhasil menang di pengadilan melawan Tropic Haze, perusahaan yang sudah lama memfasilitasi pembajakan game miliknya. Nintendo dikabarkan akan menerima uang ganti rugi senilai USD 2,4 juta atau sekitar Rp 38 miliar. Tropic Haze melakukannya melalui emulator yang mereka kembangkan bernama Yuzu. Dari situ perusahaan ini menghindari beberapa lapisan enkripsi Switch, agar dapat memainkan game-nya di perangkat lain seperti Steam Deck. Dalam gugatannya, Nintendo berpendapat bahwa Tropic Haze bertanggung jawab atas distribusi The Legend of Zelda: Tears of the Kingdom secara ilegal. Mereka mengklaim bahwa itu telah dibajak hingga satu juta kali sebelum dirilis, dilansir detikINET dari IGN, Rabu (6/3/2024). Baca artikel detikinet, "Nintendo Menang Gugatan Pembajakan, Kreator Yuzu Bayar Rp 38 M"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="About" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">About Us</h2>
        <div class="row">
            <div class="col-lg-6 text-center mx-auto">
                <p>Indo Game adalah platform daring yang menyajikan berita terkini seputar dunia game, ulasan mendalam, dan layanan pembelian game secara langsung, yang dirancang khusus untuk memenuhi kebutuhan para penggemar game di Indonesia. Dengan liputan yang komprehensif tentang perkembangan industri game, ulasan yang informatif, serta kemudahan dalam pembelian game, Indo Game memberikan pengalaman lengkap bagi pengguna untuk tetap terhubung dengan dunia game yang berkembang pesat. Selain itu, dengan menyediakan ruang komunitas yang aktif, platform ini juga memfasilitasi interaksi antar penggemar game, menciptakan lingkungan yang ramah dan mendukung untuk berbagi informasi dan pengalaman seputar game.</p>
            </div>
        </div>
    </div>
</section>

<section id="kirim" class="bg-dark">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Contact Us</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 text-white">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" rows="3" placeholder="Masukkan pesan anda"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Bagian Footer -->
<footer class="bg-dark text-white py-3">
    <div class="container text-center">
        <p>&copy; 2024 Website Game. All rights reserved.</p>
    </div>
</footer>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
