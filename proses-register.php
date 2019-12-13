<?php

include_once ("assets/function/koneksi.php");
include_once ("assets/function/helper.php");

$level = "customer";
$status = "on";
$name = $_POST['name'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$adress = $_POST['adress'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];

unset($_POST['password']);
unset($_POST['rePassword']);
$dataForm = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

if (empty($name) || empty($email) || empty($hp) || empty($adress) || empty($password) || empty($rePassword)) {
    header("location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
} elseif ($password != $rePassword) {
    header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
} elseif (mysqli_num_rows($query) == 1) {
    header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
} else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level, name, email, adress, hp, password, status) VALUES ('$level', '$name', '$email', '$adress', '$hp', '$password', '$status')");
    header("location:".BASE_URL."login.html");
}