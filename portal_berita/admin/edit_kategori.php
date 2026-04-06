<?php
session_start();
include "koneksi.php";

// cegah akses langsung
if(!isset($_POST['update'])){
    header("Location: kategori.php");
    exit;
}

$id = $_POST['id_kategori'];
$nama = $_POST['nama'];

mysqli_query($conn, "
    UPDATE kategori 
    SET nama_kategori='$nama'
    WHERE id_kategori='$id'
");

header("Location: index.php?menu=kategori");
exit;
?>

<!-- <!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f6f7fb; }

.content {
    max-width: 600px;
    margin: auto;
    padding: 20px;
}

.card-custom {
    border-radius: 25px;
    background: #eeeeee;
    padding: 25px;
    box-shadow: inset 0 4px 15px rgba(0,0,0,0.05);
}

.form-box {
    background: white;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.btn-pink {
    background: #f06292;
    color: white;
}
.btn-pink:hover {
    background: #ec407a;
    color: white;
}

.btn {
    border-radius: 10px;
}
</style>
</head>

<body>

<div class="content">

    <h2 class="mb-3" style="color:#ec407a;">Edit Kategori</h2>

    <div class="card-custom">
        <div class="form-box">

            <form method="POST">

                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama" 
                           value="<?= $data['nama_kategori'] ?>" 
                           class="form-control" required>
                </div>

                <button name="update" class="btn btn-pink">Update</button>
                <a href="?menu=kategori" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

</body>
</html> -->