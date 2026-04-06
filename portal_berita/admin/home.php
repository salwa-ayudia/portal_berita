<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Dashboard Overview</h4>
    </div>

    <!-- STAT -->
    <div class="content">

        <div class="row g-3">
            <div class="col-md-4">
                <div class="stat-card bg-artikel shadow">
                    <h6><i class="bi bi-newspaper"></i> Total Artikel</h6>
                    <h2><?= $jumlah_artikel ?></h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card bg-kategori shadow">
                    <h6><i class="bi bi-folder"></i> Total Kategori</h6>
                    <h2><?= $jumlah_kategori ?></h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card bg-views shadow">
                    <h6><i class="bi bi-eye"></i> Total Views</h6>
                    <h2><?= $total_views ?? 0 ?></h2>
                </div>
            </div>
        </div>

        <!-- CHART -->
        <div class="mt-4">
            <h5>📊 Statistik Artikel</h5>
            <div class="card p-3 shadow-sm">
                <canvas id="chart"></canvas>
            </div>
        </div>

        <!-- ARTIKEL TERBARU -->
        <div class="mt-4">
            <h5>📰 Artikel Terbaru</h5>
            <input type="text" id="search" class="form-control mb-3" placeholder="Cari artikel...">

            <div class="card p-3 shadow-sm">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($r = mysqli_fetch_assoc($recent)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $r['judul'] ?></td>
                                <td><?= date('d M Y', strtotime($r['tanggal'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>