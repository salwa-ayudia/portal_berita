<?php
$conn = mysqli_connect("localhost", "root", "", "portal_berita");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>