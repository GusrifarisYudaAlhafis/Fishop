<?php

include_once("assets/function/koneksi.php");
include_once("assets/function/helper.php");

session_start();

$IdBarang = $_GET['IdBarang'];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : false;

$query = mysqli_query($koneksi, "SELECT namaBarang, img, price FROM barang WHERE IdBarang='$IdBarang'");
$row=mysqli_fetch_assoc($query);

$cart[$IdBarang] = array("namaBarang" => $row["namaBarang"],
    "img" => $row["img"],
    "price" => $row["price"],
    "quantity" => 1);

$_SESSION["cart"] = $cart;

header("location:".BASE_URL);