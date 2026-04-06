<?php
include __DIR__ . "/admin/koneksi.php";

$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .navbar {
        background-color: #f8c8dc;
    }

    .navbar .nav-link {
        color: #444 !important;
    }

    .navbar .nav-link:hover {
        color: #ff6f91 !important;
    }

    .headline-title {
        font-size: 30px;
        font-weight: bold;
    }

    .headline-img {
        width: 100%;
        border-radius: 15px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">🌸 CIU News</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">For You</a>
                    </li>
                    <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?menu=kategori&id=<?= $k['id_kategori'] ?>">
                                <?= $k['nama_kategori'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>