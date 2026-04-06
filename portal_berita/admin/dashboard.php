<?php
include "koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// total views
$total_views = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT SUM(views) as total FROM artikel
"))['total'];

// statistik
$jumlah_artikel = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM artikel"));
$jumlah_kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));

// artikel terbaru
$recent = mysqli_query($conn, "SELECT * FROM artikel ORDER BY tanggal DESC LIMIT 5");

// chart
$data_chart = mysqli_query($conn, "
    SELECT kategori.nama_kategori, COUNT(artikel.id_artikel) as jumlah
    FROM kategori
    LEFT JOIN artikel ON artikel.id_kategori = kategori.id_kategori
    GROUP BY kategori.id_kategori
");

$label = [];
$jumlah = [];

while ($d = mysqli_fetch_assoc($data_chart)) {
    $label[] = $d['nama_kategori'];
    $jumlah[] = $d['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffe4ec, #f6f7fb);
            font-family: 'Segoe UI', sans-serif;
        }

        /* NAVBAR STYLE INDEX */
        .navbar {
            background: rgba(248, 200, 220, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link,
        .navbar .navbar-brand {
            color: #333 !important;
        }

        .navbar .nav-link:hover {
            color: #ff4d88 !important;
        }

        /* CONTENT */
        .content {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        /* CARD */
        .stat-card {
            border-radius: 15px;
            padding: 20px;
            color: white;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            width: 150%;
            height: 150%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(25deg);
            top: -80%;
            left: -80%;
            transition: 0.5s;
        }

        .stat-card:hover::before {
            top: -20%;
            left: -20%;
        }

        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
        }

        .stat-card h2 {
            font-size: 32px;
            margin-top: 10px;
        }

        /* GRADIENT WARNA */
        .bg-artikel {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
        }

        .bg-kategori {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb);
        }

        .bg-views {
            background: linear-gradient(135deg, #43cea2, #185a9d);
        }

        /* TABLE */
        .table tr:hover {
            background-color: #ffe4ec;
        }

        /* CARD BOX */
        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🌸 CIU News Admin Panel</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                ☰
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=kategori">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php include "menu.php"; ?>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('chart').getContext('2d');

        // 🔥 gradient warna
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, "#fcfca9");
        gradient.addColorStop(1, "#ff7eb3");

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: 'Jumlah Artikel',
                    data: <?= json_encode($jumlah) ?>,
                    backgroundColor: gradient,
                    borderRadius: 12,
                    borderSkipped: false,
                    hoverBackgroundColor: "#ff7eb3"
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: "#fff",
                        titleColor: "#000",
                        bodyColor: "#333",
                        borderColor: "#ff758c",
                        borderWidth: 1,
                        padding: 10,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: "#666"
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: "rgba(0,0,0,0.05)"
                        },
                        ticks: {
                            stepSize: 1,
                            color: "#666"
                        }
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'easeOutQuart'
                }
            }
        });
    </script>

    <!-- SEARCH -->
    <script>
        document.getElementById("search").addEventListener("keyup", function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
            });
        });
    </script>

    <?php include '../footer.php'; ?>
</body>

</html>