<?php

include_once ("assets/function/koneksi.php");
include_once ("assets/function/helper.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' && password='$password' && status='on'");

if (mysqli_num_rows($query) == 0) {
    header("location:".BASE_URL."index.php?page=login&notif=true");
} else {
    $row = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['IdUser'] = $row['IdUser'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['level'] = $row['level'];
    if (isset($_SESSION["prosesPesanan"])) {
        unset($_SESSION["prosesPesanan"]);
        header("location: ".BASE_URL."data-pemesan.html");
    } else {
        header("location: ".BASE_URL."index.php?page=my-profile&module=pesanan&action=list");
    }
}