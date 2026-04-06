<div class="row">

    <!-- HEADLINE -->
    <div class="col-md-8">
        <div class="row">
            
            <div class="col-md-6">
                <a href="detail.php?id=<?= $h['id_artikel'] ?>" style="text-decoration:none; color:black;">
                    <div class="headline-title">
                        <?= $h['judul']; ?>
                    </div>
                </a>

                <p class="text-muted">
                    <?= $h['nama_kategori']; ?>
                </p>

                <p>
                    <?= substr($h['isi'], 0, 150); ?>...
                </p>
            </div>

            <div class="col-md-6">
                <a href="detail.php?id=<?= $h['id_artikel'] ?>">
                    <img src="img/<?= $h['gambar']; ?>" class="headline-img">
                </a>
            </div>

        </div>

        <!-- BERITA BAWAH -->
        <div class="row mt-4">
            <?php
            $bawah = mysqli_query($conn, "
                SELECT * FROM artikel ORDER BY tanggal DESC LIMIT 3 OFFSET 1
            ");
            while($b = mysqli_fetch_assoc($bawah)) {
            ?>
                <div class="col-md-4 small-card">
                    <a href="detail.php?id=<?= $b['id_artikel'] ?>">
                        <img src="img/<?= $b['gambar']; ?>" class="img-fluid">
                        <p class="mt-2"><?= $b['judul']; ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- SIDEBAR TERPOPULER -->
    <div class="col-md-4">
        <div class="populer-box">
            <h5>🔥 Terpopuler</h5>
            <hr>

            <?php 
            $no = 1;
            while($p = mysqli_fetch_assoc($populer)) { 
            ?>
                <div class="populer-item">
                    <span><?= str_pad($no, 2, "0", STR_PAD_LEFT); ?></span>
                    
                    <a href="detail.php?id=<?= $p['id_artikel'] ?>">
                        <?= $p['judul']; ?>
                    </a>
                    
                    <br>
                    <small class="text-muted"><?= $p['nama_kategori']; ?></small>
                </div>
            <?php $no++; } ?>

        </div>
    </div>

</div>