<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Artikel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffe4ec, #f6f7fb);
            font-family: 'Segoe UI', sans-serif;
        }

        .content {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            font-weight: bold;
        }

        .card-custom {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 25px;
        }

        .table-wrapper {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        thead {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #ffe4ec;
            transform: scale(1.01);
        }

        .btn-pink {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            border: none;
        }

        .btn-pink:hover {
            opacity: 0.9;
        }

        .table img {
            border-radius: 10px;
            transition: 0.3s;
        }

        .table img:hover {
            transform: scale(1.2);
        }

        .badge-kategori {
            background: #f06292;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
        }

        /* DATATABLE FIX */
        .dataTables_wrapper .row {
            margin: 0 !important;
        }

        .dataTables_length {
            float: left;
        }

        .dataTables_filter {
            float: right;
        }

        /* INFO TEXT */
        .dataTables_info {
            margin-top: 10px;
            color: #555;
        }

        /* PAGINATION */
        .dataTables_paginate {
            margin-top: 10px;
            float: right;
        }

        .page-item.active .page-link {
            background-color: #ff758c !important;
            border-color: #ff758c !important;
            color: white !important;
        }

        .page-link {
            color: #ff758c !important;
        }
    </style>

</head>

<body>

    <div class="content">
        <h2 class="mb-3" style="color:#ec407a;">Data Artikel</h2>

        <div class="mb-3 d-flex gap-2">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="?menu=tambah_artikel" class="btn btn-pink">+ Tambah Artikel</a>
        </div>

        <div class="card-custom">
            <div class="table-wrapper">

                <table id="tabelArtikel" class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn, "
                            SELECT artikel.*, kategori.nama_kategori 
                            FROM artikel 
                            JOIN kategori ON artikel.id_kategori = kategori.id_kategori
                            ORDER BY artikel.tanggal DESC
                        ");

                        while ($d = mysqli_fetch_assoc($data)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>

                                <td>
                                    <?php if (!empty($d['gambar'])) { ?>
                                        <img src="../img/<?= htmlspecialchars($d['gambar']); ?>" width="80">
                                    <?php } else { ?>
                                        <span>-</span>
                                    <?php } ?>
                                </td>

                                <td><?= htmlspecialchars($d['judul']); ?></td>

                                <td>
                                    <span class="badge-kategori">
                                        <?= htmlspecialchars($d['nama_kategori']); ?>
                                    </span>
                                </td>

                                <td>
                                    <?= !empty($d['tanggal']) ? date('d M Y', strtotime($d['tanggal'])) : '-' ?>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="?menu=edit_artikel&id=<?= $d['id_artikel']; ?>"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <a href="hapus_artikel.php?id=<?= $d['id_artikel']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus artikel ini?')">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelArtikel').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                responsive: true,
                ordering: true,

                // ✅ tampilkan info bawah
                info: true,

                // ✅ pagination angka
                pagingType: "simple_numbers",

                language: {
                    lengthMenu: "Show _MENU_ entries",
                    search: "Search:",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    zeroRecords: "Data tidak ditemukan",
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });
        });
    </script>

</body>

</html>