<?php

include_once("assets/function/koneksi.php");
include_once("assets/function/helper.php");

session_start();

$namaPenerima = $_POST["namaPenerima"];
$hp = $_POST["hp"];
$adress = $_POST["adress"];
$city = $_POST["city"];

$IdUser = $_SESSION['IdUser'];
date_default_timezone_set('Asia/Jakarta');
$waktuSaatIni = date("Y-m-d H:i:s");

$query = mysqli_query($koneksi, "INSERT INTO pesanan (namaPenerima, IdUser, hp, IdCity, adress, datePemesanan, status)
												VALUES ('$namaPenerima', '$IdUser', '$hp', '$city', '$adress', '$waktuSaatIni', '0')");

if ($query) {
    $lastPesananId = mysqli_insert_id($koneksi);

    $cart = $_SESSION['cart'];

    foreach($cart AS $key => $value) {
        $IdBarang = $key;
        $quantity = $value['quantity'];
        $price = $value['price'];

        mysqli_query($koneksi, "INSERT INTO pesanan_detail(IdPesanan, IdBarang, quantity, price)
												   VALUES ('$lastPesananId', '$IdBarang', '$quantity', '$price')");
    }

    unset($_SESSION["cart"]);

    header("location:".BASE_URL."index.php?page=my-profile&module=pesanan&action=detail&IdPesanan=$lastPesananId");
}