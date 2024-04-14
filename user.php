<?php
require_once "database.php";

session_start();

// Periksa apakah pengguna sudah login dan memiliki peran user
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .edit-news-form {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f8f9fa;
        padding: 10px;
        z-index: 1000;
        transition: bottom 0.3s ease;
    }

    .edit-news-form.open {
        bottom: 0;
    }
  </style>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            color: #444;
        }

        .page-section {
            padding: 100px 0;
        }

        .section-heading {
            font-size: 40px;
            text-transform: uppercase;
            color: #333;
        }

        .section-subheading {
            font-size: 24px;
            font-style: italic;
            color: #888;
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-5px);
        }

        .portfolio-link {
            display: block;
            position: relative;
        }

        .portfolio-caption {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
        }

        .portfolio-caption-heading {
            font-size: 24px;
            color: #333;
        }

        .portfolio-caption-subheading {
            font-size: 18px;
            color: #888;
        }

        /* Hover Effect */
        .portfolio-hover {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s;
        }

        .portfolio-link:hover .portfolio-hover {
            opacity: 1;
        }

        .portfolio-hover-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: all 0.3s;
        }

        .portfolio-link:hover .portfolio-hover-content {
            opacity: 1;
        }

        .portfolio-link:hover .fa-plus {
            font-size: 3em;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">INDOGAME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Game -->
    <section class="page-section bg-light mb-2" id="buyGames">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase mb-4">Beli Game</h2>
                <h3 class="section-subheading text-muted">All game</h3>
            </div>
            <div class="row">
                <?php
                $data = getAllData();
                foreach ($data as $row) {
                    $id = $row['id_game'];
                    $nama_game = $row['nama_game'];
                    $harga = $row['harga'];
                    $deskripsi = $row['Deskripsi'];
                    $gambar = $row['gambar'];
                ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $id; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $nama_game; ?></div>
                                <div class="portfolio-caption-price"><?php echo 'IDR' . $harga; ?></div>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
    $data = getAllData();
    foreach ($data as $row) {
        $id_game = $row['id_game'];
        $nama_game = $row['nama_game'];
        $harga = $row['harga'];
        $deskripsi = $row['Deskripsi'];
        $gambar = $row['gambar'];
    ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $id_game; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Informasi game -->
                                    <h2 class="text-uppercase"><?php echo $nama_game; ?></h2>
                                    <img class="img-fluid d-block mx-auto" src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" alt="..." />
                                    <p class="item-intro text-muted"><?php echo $deskripsi; ?></p>
                                    <p>Harga: <?php echo $harga; ?></p>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>

                                    <button class="btn btn-success btn-xl text-uppercase ms-2" type="button">
                                        <i class="fas fa-shopping-cart me-1"></i>
                                        Buy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- Game News  -->
    <section class="page-section bg-dark" id="gameNewsCarousel">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading text-uppercase mb-4 text-light">Game News</h2>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $beritaData = getAllNews();
                    $first = true;
                    foreach ($beritaData as $berita) {
                        $idnews = $berita['idnews'];
                        $judul = $berita['judul'];
                        $gambar = $berita['gambarnews'];
                        $isi_berita = $berita['berita'];
                    ?>
                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                            <div class="carousel-overlay"></div>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" class="d-block w-100 mx-auto carousel-image" alt="<?php echo $judul; ?>" style="max-height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="text-light display-4"><?php echo $judul; ?></h2>
                                <p class="text-light lead"><?php echo substr($isi_berita, 0, 150) . '...'; ?></p>
                                <a href="#gameNews" class="btn btn-outline-light btn-lg">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php
                        $first = false;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="page-section bg-dark" id="gameNews">
        <div class="container">
            <div class="text-center mb-5">
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
            <div class="row ">
                <?php
                $beritaData = getAllNews();
                foreach ($beritaData as $berita) {
                    $idnews = $berita['idnews'];
                    $judul = $berita['judul'];
                    $gambar = $berita['gambarnews'];
                    $isi_berita = $berita['berita'];
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card mb-4 border-0 rounded-3 shadow-lg">
                            <img class="card-img-top rounded-3" src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" alt="<?php echo $judul; ?>">
                            <div class="card-body">
                                <h2 class="card-title text-uppercase mb-3"><?php echo $judul; ?></h2>
                                <p class="card-text"><?php echo substr($isi_berita, 0, 200) . '...'; ?></p>

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#beritaModal<?php echo $idnews; ?>">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
    $beritaData = getAllNews();
    foreach ($beritaData as $berita) {
        $idnews = $berita['idnews'];
        $judul = $berita['judul'];
        $gambar = $berita['gambarnews'];
        $isi_berita = $berita['berita'];
    ?>
        <div class="portfolio-modal modal fade" id="beritaModal<?php echo $idnews; ?>" tabindex="-1" aria-labelledby="beritaModalLabel<?php echo $idnews; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Informasi Berita -->
                        <h2 class="text-uppercase mb-4 text-center"><?php echo $judul; ?></h2>
                        <img class="img-fluid mb-4 rounded" src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" alt="<?php echo $judul; ?>" />
                        <p class="lead mb-4"><?php echo $isi_berita; ?></p>

                        <button class="btn btn-primary btn-xl text-uppercase mx-auto" data-bs-dismiss="modal" type="button">
                            <i class="fas fa-times me-1"></i>
                            Tutup Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- Game Reviews -->
    <section id="gameReviews" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Game Reviews</h2>
            <!-- Review Cards -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Review Card 1 -->
                <div class="col">
                    <div class="card border-0 rounded-3 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="review1.jpg" class="img-fluid rounded-start" alt="Review 1">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Review 1</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Review Card 2 -->
                <div class="col">
                    <div class="card border-0 rounded-3 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="review2.jpg" class="img-fluid rounded-start" alt="Review 2">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Review 2</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Review Card 3 -->
                <div class="col">
                    <div class="card border-0 rounded-3 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="review3.jpg" class="img-fluid rounded-start" alt="Review 3">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Review 3</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
