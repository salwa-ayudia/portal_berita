<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        tbody tr:hover {
            background: #ffe4ec;
            transform: scale(1.01);
        }

        .btn-pink {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            border: none;
        }

        .bg-pink {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
        }

        .page-item.active .page-link {
            background-color: #ff758c !important;
            border-color: #ff758c !important;
        }

        .page-link {
            color: #ff758c;
        }

        /* HOVER ARTIKEL */
        .list-group-item {
            border-radius: 12px !important;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .list-group-item:hover {
            background: linear-gradient(135deg, #ffe4ec, #ffd6e7);
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 8px 20px rgba(255, 117, 140, 0.2);
        }

        /* efek judul lebih hidup */
        .list-group-item:hover div {
            color: #ec407a;
            font-weight: 500;
        }

        /* badge ikut animasi */
        .list-group-item:hover .badge {
            transform: scale(1.1);
            transition: 0.3s;
        }
    </style>

</head>

<body>

    <div class="content">

        <h2 class="mb-3" style="color:#ec407a;">Data Kategori</h2>

        <div class="mb-3 d-flex gap-2">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-pink" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Kategori
            </button>
        </div>

        <!-- ================== TABEL ================== -->
        <div class="card-custom">
            <div class="table-wrapper">

                <table id="tabelKategori" class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        while ($d = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_kategori'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm btn-edit"
                                        data-id="<?= $d['id_kategori'] ?>"
                                        data-nama="<?= $d['nama_kategori'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit">
                                        Edit
                                    </button>

                                    <a href="hapus_kategori.php?id=<?= $d['id_kategori'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- ================== ARTIKEL PER KATEGORI ================== -->
        <div class="card-custom mt-4">
            <div class="table-wrapper">

                <h4 class="mb-3" style="color:#ec407a;">📚 Artikel Berdasarkan Kategori</h4>

                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM kategori");

                while ($k = mysqli_fetch_assoc($kategori)) {

                    $artikel = mysqli_query($conn, "
                    SELECT * FROM artikel 
                    WHERE id_kategori = " . $k['id_kategori'] . "
                    ORDER BY tanggal DESC
                ");
                ?>

                    <div class="mb-4">
                        <h5 style="color:#ff758c;">📌 <?= htmlspecialchars($k['nama_kategori']); ?></h5>

                        <?php if (mysqli_num_rows($artikel) > 0) { ?>
                            <ul class="list-group">
                                <?php while ($a = mysqli_fetch_assoc($artikel)) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <div>
                                            <?= htmlspecialchars($a['judul']); ?><br>
                                            <small class="text-muted">
                                                <?= !empty($a['tanggal']) ? date('d M Y', strtotime($a['tanggal'])) : '-' ?>
                                            </small>
                                        </div>

                                        <span class="badge bg-pink">
                                            👁 <?= $a['views'] ?? 0 ?>
                                        </span>

                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <p class="text-muted">Belum ada artikel</p>
                        <?php } ?>

                    </div>

                <?php } ?>

            </div>
        </div>

    </div>

    <!-- ================= MODAL EDIT ================= -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="edit_kategori.php" method="POST">

                    <div class="modal-header">
                        <h5>Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id_kategori" id="id_kategori">
                        <input type="text" name="nama" id="nama_kategori" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="update" class="btn btn-pink">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="tambah_kategori.php" method="POST">

                    <div class="modal-header">
                        <h5>Tambah Kategori</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-pink" name="simpan">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelKategori').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                pagingType: "simple_numbers",
                info: true
            });
        });

        // isi modal edit
        $(document).on("click", ".btn-edit", function() {
            $("#id_kategori").val($(this).data("id"));
            $("#nama_kategori").val($(this).data("nama"));
        });
    </script>

</body>

</html>