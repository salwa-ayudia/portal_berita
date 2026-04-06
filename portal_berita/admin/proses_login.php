<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha_input = $_POST['captcha'];

// cek captcha
if(strtoupper($captcha_input) != $_SESSION['captcha']){
    $_SESSION['error'] = "captcha";
    header("Location: login.php");
    exit;
}

// cek login
$query = mysqli_query($conn, "
SELECT * FROM users 
WHERE username='$username' AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if($data){
    $_SESSION['admin'] = $data['username'];
    $_SESSION['login'] = True;
    header("Location: index.php");
} else {
    $_SESSION['error'] = "login";
    header("Location: login.php");
}
?>