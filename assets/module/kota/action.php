<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");

    adminOnly("kota", $level);

    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $IdCity = isset($_GET['IdCity']) ? $_GET['IdCity'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $tarif = isset($_POST['tarif']) ? $_POST['tarif'] : "";

	if($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO city (city, tarif, status) VALUES ('$city', '$tarif', '$status')");
	} else if($button == "Update") {
		mysqli_query($koneksi, "UPDATE city SET city='$city', tarif='$tarif', status='$status' WHERE IdCity='$IdCity'");
	} elseif ($button == "Delete") {
        mysqli_query($koneksi, "DELETE FROM city WHERE IdCity='$IdCity'");
    }
	
	header("location:".BASE_URL."index.php?page=my-profile&module=kota&action=list");