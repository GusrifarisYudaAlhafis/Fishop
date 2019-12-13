<?php

include_once ("../../function/koneksi.php");
include_once ("../../function/helper.php");

adminOnly("barang", $level);

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
$namaBarang = isset($_POST['namaBarang']) ? $_POST['namaBarang'] : false;
$IdBarang = isset($_GET['IdBarang']) ? $_GET['IdBarang'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : false;
$IdCategory = isset($_POST['IdCategory']) ? $_POST['IdCategory'] : false;
$spesification = isset($_POST['spesification']) ? $_POST['spesification'] : false;
$stok = isset($_POST['stok']) ? $_POST['stok'] : false;
$price = isset($_POST['price']) ? $_POST['price'] : false;
$updateImg = "";

if (!empty($_FILES["img"]["name"])) {
    $img = $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_Name"], "../../img/barang/".$img);
    $updateImg = ", img='$img'";
}

if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO barang (namaBarang, IdCategory, spesification, img, price, stok, status) VALUES ('$namaBarang', '$IdCategory', '$spesification', '$img', '$price', '$stok', '$status')");
} elseif ($button == "Update") {
    mysqli_query($koneksi, "UPDATE barang SET IdCategory='$IdCategory', namaBarang='$namaBarang', spesification='$spesification', price='$price', stok='$stok', status='$status' $updateImg WHERE IdBarang='$IdBarang'");
} elseif ($button == "Delete") {
    mysqli_query($koneksi, "DELETE FROM barang WHERE IdBarang='$IdBarang'");
}

header("location:".BASE_URL."index.php?page=my-profile&module=barang&action=list");