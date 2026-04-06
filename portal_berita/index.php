<?php
include "admin/koneksi.php";

// KATEGORI
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// FILTER ARTIKEL
if (isset($_GET['kategori'])) {
    $id_kategori = intval($_GET['kategori']);

    $artikel = mysqli_query($conn, "
        SELECT artikel.*, kategori.nama_kategori 
        FROM artikel 
        LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
        WHERE artikel.id_kategori = $id_kategori
        ORDER BY tanggal DESC
    ");

    $judulHalaman = "Kategori";
} else {
    $artikel = mysqli_query($conn, "
        SELECT artikel.*, kategori.nama_kategori 
        FROM artikel 
        LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
        ORDER BY tanggal DESC
    ");

    $judulHalaman = "Semua Artikel";
}

// HEADLINE
$headline = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori 
FROM artikel 
LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
ORDER BY tanggal DESC LIMIT 1
");
$h = mysqli_fetch_assoc($headline);

// POPULER
$populer = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori 
FROM artikel 
LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
ORDER BY views DESC LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>CIU News</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffe4ec, #f6f7fb);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: rgba(248, 200, 220, 0.8);
            backdrop-filter: blur(10px);
        }

        .navbar .nav-link:hover {
            color: #ff4d88 !important;
        }

        .headline-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .headline-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            filter: brightness(80%);
        }

        .headline-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
        }

        .headline-title {
            font-size: 28px;
            font-weight: bold;
        }

        .headline-card {
            cursor: pointer;
            transition: 0.4s;
        }

        .headline-card:hover {
            transform: scale(1.02);
            filter: brightness(1.05);
        }

        .headline-card::after {
            content: "Klik untuk membaca →";
            position: absolute;
            bottom: 10px;
            right: 20px;
            color: white;
            font-size: 12px;
            opacity: 0;
            transition: 0.3s;
        }

        .headline-card:hover::after {
            opacity: 1;
        }

        .card-news {
            border-radius: 15px;
            transition: 0.3s;
            background: white;
        }

        .card-news:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-news img {
            height: 180px;
            object-fit: cover;
        }

        /* 🔥 POPULER BARU */
        .populer-box {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
        }

        .populer-item {
            padding: 10px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .populer-item:hover {
            background: #ffe4ec;
            transform: translateX(5px);
        }

        .badge-hot {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white !important;
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 8px;
        }

        h4 {
            color: #ec407a;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">🌸 CIU News</a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">For You</a>
                </li>

                <?php mysqli_data_seek($kategori, 0); ?>
                <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=kategori&id=<?= $k['id_kategori'] ?>">
                            <?= $k['nama_kategori'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">

        <?php if ($h) { ?>

            <?php
            $menu = isset($_GET['menu']) ? $_GET['menu'] : 'home';

            if ($menu == 'kategori') {
                include "kategori.php";
            } else if ($menu == 'detail') {
                include "detail.php";
            } else {
            ?>

                <!-- HEADLINE -->
                <a href="index.php?menu=detail&id=<?= $h['id_artikel'] ?>" style="text-decoration:none;">
                    <div class="headline-card mb-4">

                        <?php if (!empty($h['gambar'])) { ?>
                            <img src="img/<?= $h['gambar']; ?>" class="headline-img">
                        <?php } ?>

                        <div class="headline-content">
                            <div class="badge bg-danger mb-2"><?= $h['nama_kategori'] ?></div>
                            <div class="headline-title"><?= $h['judul'] ?></div>
                        </div>

                    </div>
                </a>

                <div class="row">

                    <!-- ARTIKEL -->
                    <div class="col-md-8">
                        <h4 class="mb-3">📰 Artikel Terbaru</h4>

                        <div class="row">
                            <?php while ($a = mysqli_fetch_assoc($artikel)) { ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card-news">

                                        <?php if (!empty($a['gambar'])) { ?>
                                            <img src="img/<?= $a['gambar']; ?>" class="w-100">
                                        <?php } ?>

                                        <div class="p-3">
                                            <small class="text-muted">
                                                <?= $a['nama_kategori'] ?> • <?= date('d M Y', strtotime($a['tanggal'])) ?>
                                            </small>

                                            <h6 class="mt-2">
                                                <a href="index.php?menu=detail&id=<?= $a['id_artikel'] ?>"
                                                    style="text-decoration:none;color:black;">
                                                    <?= $a['judul'] ?>
                                                </a>
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- 🔥 POPULER UPGRADE -->
                    <div class="col-md-4">
                        <h4 class="mb-3">🔥 Trending News</h4>

                        <div class="populer-box">
                            <?php while ($p = mysqli_fetch_assoc($populer)) { ?>
                                <div class="populer-item">

                                    <span class="badge-hot mb-1 d-inline-block">🔥 Hot News</span><br>

                                    <a href="index.php?menu=detail&id=<?= $p['id_artikel'] ?>"
                                        style="text-decoration:none;color:black;font-weight:500;">
                                        <?= $p['judul'] ?>
                                    </a>

                                    <div>
                                        <small class="text-muted">
                                            <?= $p['nama_kategori'] ?> • <?= date('d M Y', strtotime($p['tanggal'])) ?>
                                        </small>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>
            <h3 class="text-center">Belum ada berita 😢</h3>
        <?php } ?>

    </div>

    <?php include "footer.php" ?>

</body>

</html>