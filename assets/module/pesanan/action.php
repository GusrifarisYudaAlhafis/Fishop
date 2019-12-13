<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	session_start();
	
	$IdPesanan = $_GET['IdPesanan'];
	$button = $_POST['button'];
	
	if ($button == "Konfirmasi") {
		$IdUser = $_SESSION["IdUser"];
		$noRekening = $_POST['noRekening'];
		$nameAccount = $_POST['nameAccount'];
		$dateTransfer = $_POST['dateTransfer'];
		
		$queryPembayaran = mysqli_query($koneksi, "INSERT INTO konfirmasi_pembayaran (IdPesanan, noRekening, nameAccount, dateTransfer)
																			VALUES ('$IdPesanan', '$noRekening', '$nameAccount', '$dateTransfer')");
																			
		if ($queryPembayaran) {
			mysqli_query($koneksi, "UPDATE pesanan SET status='1' WHERE IdPesanan='$IdPesanan'");
		}
	} else if($button == "Edit Status") {
		$status = $_POST["status"];
		mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE IdPesanan='$IdPesanan'");
		if ($status == "2") {
			$query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE IdPesanan='$IdPesanan'");
			while($row=mysqli_fetch_assoc($query)) {
				$IdBarang = $row["IdBarang"];
				$quantity = $row["quantity"];
				mysqli_query($koneksi, "UPDATE barang SET stok=stok-$quantity WHERE IdBarang='$IdBarang'");
			}
		}
	}
	
	header("location:".BASE_URL."index.php?page=my-profile&module=pesanan&action=list");