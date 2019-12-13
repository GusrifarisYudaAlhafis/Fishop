<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    adminOnly("banner", $level);

    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $banner = isset($_POST['banner']) ? $_POST['banner'] : "";
    $IdBanner = isset($_GET['IdBanner']) ? $_GET['IdBanner'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $link = isset($_POST['link']) ? $_POST['link'] : "";
    $editImg = "";
 
    if($_FILES["img"]["name"] != "") {
        $img = $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], "../../img/slide/".$img);
        $editImg = ", img='$img'";
    }
     
    if($button == "Add") {
        mysqli_query($koneksi, "INSERT INTO banner (banner, link, img, status) VALUES ('$banner', '$link', '$img', '$status')");
    } elseif($button == "Update") {
        mysqli_query($koneksi, "UPDATE banner SET banner='$banner', link='$link', $editImg status='$status' WHERE IdBanner='$IdBanner'");
    } elseif ($button == "Delete") {
        mysqli_query($koneksi, "DELETE FROM banner WHERE IdBanner='$IdBanner'");
    }

    header("location: ".BASE_URL."index.php?page=my-profile&module=banner&action=list");
?>