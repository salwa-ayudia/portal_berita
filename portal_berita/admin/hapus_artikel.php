<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil gambar dulu (biar bisa dihapus dari folder)
$data = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT gambar FROM artikel WHERE id_artikel=$id
"));

// hapus file gambar
if($data['gambar'] != ""){
    unlink("../img/".$data['gambar']);
}

// hapus dari database
mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel=$id");

header("Location: index.php?menu=artikel");
?>