<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");

    adminOnly("user", $level);

    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $IdUser = isset($_GET['IdUser']) ? $_GET['IdUser'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$hp = isset($_POST["hp"]) ? $_POST["hp"] : "";
	$adress = isset($_POST["adress"]) ? $_POST["adress"] : "";
	$level = isset($_POST["level"]) ? $_POST["level"] : "";

	if ($button == "Update") {
        mysqli_query($koneksi, "UPDATE user SET name='$name', email='$email', hp='$hp', adress='$adress', level='$level', status='$status' WHERE IdUser='$IdUser'");
    } elseif ($button == "Delete") {
        mysqli_query($koneksi, "DELETE FROM user WHERE IdUser='$IdUser'");
    }

    header("location: ".BASE_URL."index.php?page=my-profile&module=user&action=list");
?>