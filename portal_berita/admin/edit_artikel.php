<?php
include "koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT * FROM artikel WHERE id_artikel = $id
"));

$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $id_kategori = $_POST['kategori'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../img/" . $gambar);

        mysqli_query($conn, "
        UPDATE artikel 
        SET judul='$judul', isi='$isi', gambar='$gambar', id_kategori='$id_kategori'
        WHERE id_artikel=$id
        ");
    } else {
        mysqli_query($conn, "
        UPDATE artikel 
        SET judul='$judul', isi='$isi', id_kategori='$id_kategori'
        WHERE id_artikel=$id
        ");
    }

    header("Location: index.php?menu=artikel");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #ffe4ec, #f6f7fb);
            font-family: 'Segoe UI', sans-serif;
        }

        /* CONTENT */
        .content {
            max-width: 900px;
            margin: auto;
            padding: 30px 20px;
        }

        /* TITLE */
        .title {
            font-weight: bold;
            color: #ec407a;
        }

        /* CARD GLASS */
        .form-container {
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease;
        }

        /* INPUT */
        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid #eee;
            transition: 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #ff7eb3;
            box-shadow: 0 0 8px rgba(255, 126, 179, 0.3);
        }

        /* LABEL */
        label {
            font-weight: 500;
            margin-bottom: 5px;
        }

        /* BUTTON */
        .btn-pink {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 8px 18px;
            transition: 0.3s;
        }

        .btn-pink:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        /* IMAGE */
        .current-img {
            width: 120px;
            border-radius: 12px;
            margin-top: 10px;
            transition: 0.3s;
        }

        .current-img:hover {
            transform: scale(1.1);
        }

        /* PREVIEW */
        .preview-img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin-top: 10px;
            display: none;
        }

        /* ANIMASI */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="content">

        <h2 class="mb-4 title">Edit Artikel</h2>

        <div class="form-container">

            <form method="POST" enctype="multipart/form-data">

                <!-- JUDUL -->
                <div class="mb-3">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" required>
                </div>

                <!-- ISI -->
                <div class="mb-3">
                    <label>Isi Artikel</label>
                    <textarea name="isi" id="editor"><?= $data['isi'] ?></textarea>

                    <script>
                        CKEDITOR.replace('editor');
                    </script>
                </div>

                <!-- KATEGORI -->
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
                            <option value="<?= $k['id_kategori'] ?>"
                                <?= $k['id_kategori'] == $data['id_kategori'] ? 'selected' : '' ?>>
                                <?= $k['nama_kategori'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- GAMBAR SEKARANG -->
                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    <img src="../img/<?= $data['gambar'] ?>" class="current-img">
                </div>

                <!-- GANTI GAMBAR -->
                <div class="mb-3">
                    <label>Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">

                    <!-- PREVIEW -->
                    <img id="preview" class="preview-img">
                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">
                    <button class="btn btn-pink" name="update">Update</button>
                    <a href="index.php?menu=artikel" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>

    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('preview');
                img.src = reader.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>