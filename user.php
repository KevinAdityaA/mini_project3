<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Game Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#buyGames">Buy Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gameNews">Game News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gameReviews">Game Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- Buy Games Section -->
    <section id="buyGames" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Beli Game</h2>
            <!-- Game Cards -->
            <div class="row">
                <!-- Game Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="https://awsimages.detik.net.id/community/media/visual/2023/04/02/game-tanah-air-troublemaker-resmi-rilis-diskon-20-di-steam_169.jpeg?w=600&q=90" 
                        class="card-img-top" alt="Game 1">
                        <div class="card-body">
                            <h5 class="card-title">Troublemaker</h5>
                            <p class="card-text">Troublemaker adalah game aksi-petualangan-beat-'em-up tentang bagian paling penting dan menakutkan dalam hidup setiap orang: SMA. Sebagai Budi, siswa baru yang pindah ke salah satu sekolah menengah terbaik di Indonesia, benar-benar berjuang untuk mencapai puncak rantai makanan sosial melalui turnamen pertarungan siswa tahunan sekolah, yang diberi nama Raise Your Gang.</p>
                            <a href="#" class="btn btn-primary stretched-link buy-game" data-game="Game 1">Beli</a>
                        </div>
                    </div>
                </div>
                <!-- Game Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="https://cdn.eraspace.com/pub/media/mageplaza/blog/post/e/z/ezgif-1-769bdac2cc.jpg" 
                        class="card-img-top" alt="Game 2">
                        <div class="card-body">
                            <h5 class="card-title">God of War Ragnarök</h5>
                            <p class="card-text">God of War Ragnarök adalah permainan laga petualangan yang dikembangkan oleh Santa Monica Studio dan diterbitkan oleh Sony Interactive Entertainment. Cerita pada permainan video ini didasarkan pada kisah mitologi Nordik, yang berlatarkan di Skandinavia kuno, serta menampilkan tokoh protagonis utama Kratos dan putranya yang beranjak remaja Atreus. Mengakhiri era seri Norse, permainan video ini menggambarkan suasana Ragnarök, peristiwa hari akhir yang merupakan puncak dari mitologi Nordik dan diramalkan akan terjadi di permainan video sebelumnya setelah Kratos membunuh dewa Aesir dan anak dari Freya, Baldur.</p>
                            <a href="#" class="btn btn-primary stretched-link buy-game" data-game="Game 2">Beli</a>
                        </div>
                    </div>
                </div>
                <!-- Game Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="https://image.api.playstation.com/vulcan/ap/rnd/202108/0410/UAnLUUMdxA9cow8TEe8IfhuC.png" 
                        class="card-img-top" alt="Game 3">
                        <div class="card-body">
                            <h5 class="card-title">Elden Ring</h5>
                            <p class="card-text">Elden Ring adalah permainan bermain peran aksi dimainkan dalam perspektif orang ketiga dengan gameplay yang berfokus pada pertempuran dan eksplorasi; ini menampilkan elemen yang mirip dengan yang ditemukan di permainan lain yang dikembangkan oleh FromSoftware, seperti seri Souls, Bloodborne, dan Sekiro: Shadows Die Twice.</p>
                            <a href="#" class="btn btn-primary stretched-link buy-game" data-game="Game 3">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Game News Section -->
    <section id="gameNews" class="bg-dark py-5">
        <div class="container">
            <h2 class="text-center mb-4 text-light">Game News</h2>
            <!-- News Cards -->
            <div class="row">
                <!-- News Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white border-0">
                        <img src="news1.jpg" 
                        class="card-img" alt="News 1">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title">Exciting New Features Coming to Game 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- News Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white border-0">
                        <img src="news2.jpg"
                        class="card-img" alt="News 2">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title">New Expansion Pack Announced for Game 2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Game Reviews Section -->
    <section id="gameReviews" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Game Reviews</h2>
            <!-- Review Cards -->
            <div class="row">
                <!-- Review Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="review1.jpg" class="card-img-top" alt="Review 1">
                        <div class="card-body">
                            <h5 class="card-title">Review 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Review Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="review2.jpg" class="card-img-top" alt="Review 2">
                        <div class="card-body">
                            <h5 class="card-title">Review 2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Review Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="review3.jpg" class="card-img-top" alt="Review 3">
                        <div class="card-body">
                            <h5 class="card-title">Review 3</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
