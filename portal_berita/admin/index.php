<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['login'])) {
        include 'login.php';
    } else {
        include 'dashboard.php';
    }
    ?>

</body>

</html>