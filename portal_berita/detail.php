<?php
include "admin/koneksi.php";

// cek id
if (!isset($_GET['id'])) {
    die("Artikel tidak ditemukan");
}

$id = intval($_GET['id']);

// ambil data artikel
$query = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori 
FROM artikel 
LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
WHERE artikel.id_artikel = $id
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Artikel tidak ditemukan");
}

// tambah views
mysqli_query($conn, "UPDATE artikel SET views = views + 1 WHERE id_artikel = $id");

// populer
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
    <title><?php echo $data['judul']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdf6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* artikel */
        .artikel-box {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
        }

        .artikel-img {
            width: 100%;
            border-radius: 15px;
            margin: 15px 0;
        }

        /* sidebar (SAMA KAYAK INDEX) */
        .populer-box {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
        }

        .populer-item {
            margin-bottom: 10px;
        }

        .populer-item span {
            color: #ff6f91;
            font-weight: bold;
        }

        .btn-pink {
            background: #ff6f91;
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            border: none;
        }

        .btn-pink:hover {
            background: #e85c80;
        }

        .badge-hot {
            color: white !important;
        }

        .highlight-ciu {
            color: #ff4d88;
            font-weight: bold;
        }

        .highlight-cirebon {
            color: #ff4d88;
            font-weight: bold;
        }

        .artikel-box p {
            text-align: justify;
            margin-bottom: 12px;
            line-height: 1.7;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="row">

            <!-- 📰 ARTIKEL -->
            <div class="col-md-8">
                <div class="artikel-box shadow-sm">
                    <h2><?= $data['judul']; ?></h2>

                    <p class="text-muted">
                        <?= $data['nama_kategori']; ?> |
                        <?= date('d M Y', strtotime($data['tanggal'])); ?> |
                        <?= $data['views']; ?> views
                    </p>

                    <img src="img/<?= $data['gambar']; ?>" class="artikel-img">

                    <?php
                    $isi = $data['isi'];

                    $isi = str_replace("CIU News", "<span class='highlight-ciu'>CIU News</span>", $isi);
                    $isi = str_replace("Cirebon", "<span class='highlight-cirebon'>Cirebon</span>", $isi);

                    echo $isi;
                    ?>
                </div>
            </div>

            <!-- 🔥 SIDEBAR -->
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
    </div>

</body>

</html>