<?php

include_once ("../../function/koneksi.php");
include_once ("../../function/helper.php");

adminOnly("kategori", $level);

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
$category = isset($_POST['category']) ? $_POST['category'] : "";
$IdCategory = isset($_GET['IdCategory']) ? $_GET['IdCategory'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";

if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO category (category, status) VALUES ('$category', '$status')");
} elseif ($button == "Update") {
    mysqli_query($koneksi, "UPDATE category SET category='$category', status='$status' WHERE IdCategory='$IdCategory'");
} elseif ($button == "Delete") {
    mysqli_query($koneksi, "DELETE FROM category WHERE IdCategory='$IdCategory'");
}

header("location:".BASE_URL."index.php?page=my-profile&module=kategori&action=list");