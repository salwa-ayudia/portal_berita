<?php
session_start();

// buat random text
$kode = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 4);
$_SESSION['captcha'] = $kode;

// buat image
$img = imagecreate(120, 40);
$bg = imagecolorallocate($img, 255, 255, 255);
$text_color = imagecolorallocate($img, 0, 0, 0);

// tulis captcha
imagestring($img, 5, 30, 10, $kode, $text_color);

// output image
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
