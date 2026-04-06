<?php
include "koneksi.php";

$id = intval($_GET['id']);

// ambil nama kategori
$nama = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT nama_kategori FROM kategori WHERE id_kategori = $id
"));

$data = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori 
FROM artikel
LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
WHERE artikel.id_kategori = $id
ORDER BY tanggal DESC
");
?>

<div class="container mt-4">
<h4>Kategori <?= $nama['nama_kategori']; ?></h4>

<div class="row">
<?php while($a = mysqli_fetch_assoc($data)) { ?>

    <div class="col-md-4 mb-4">
        <div class="card h-100">

            <a href="index.php?menu=detail&id=<?= $a['id_artikel'] ?>" style="text-decoration:none; color:black;">
                
                <img src="img/<?= $a['gambar'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <h5><?= $a['judul'] ?></h5>
                    <small><?= $a['nama_kategori'] ?></small>
                    <p><?= substr($a['isi'],0,80) ?>...</p>
                </div>

            </a>

        </div>
    </div>

<?php } ?>
</div>
</div>