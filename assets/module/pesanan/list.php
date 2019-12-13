<?php

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $dataPerHalaman = 3;
    $mulaiDari = ($pagination-1) * $dataPerHalaman;

	if ($level == "superadmin")  {
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.name FROM pesanan JOIN user ON pesanan.IdUser=user.IdUser ORDER BY pesanan.datePemesanan DESC LIMIT $mulaiDari, $dataPerHalaman");
	} else {
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.name FROM pesanan JOIN user ON pesanan.IdUser=user.IdUser WHERE pesanan.IdUser='$IdUser' ORDER BY pesanan.datePemesanan DESC LIMIT $mulaiDari, $dataPerHalaman");
	}
	
	if (mysqli_num_rows($queryPesanan) == 0) {
		echo "<h3>Data kosong</h3>";
	} else {
		echo "<table class='tableList'>
				<tr class='barisTitle'>
					<th class='kiri'>Nomor Pesanan</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Nama</th>
					<th class='kiri'>Action</th>
				</tr>";
		
		$adminButton = "";
		while($row=mysqli_fetch_assoc($queryPesanan)) {
			if ($level == "superadmin") {
				$adminButton = "<a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=pesanan&action=status&IdPesanan=$row[IdPesanan]'>Update Status</a>";
			}
		
			$status = $row['status'];
			echo "<tr>
					<td class='kiri'>$row[IdPesanan]</td>
					<td class='kiri'>$arrayStatusPesanan[$status]</td>
					<td class='kiri'>$row[name]</td>
					<td class='kiri'>
						<a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=pesanan&action=detail&IdPesanan=$row[IdPesanan]'>Detail Pesanan</a>
						$adminButton
					</td>
				 </tr>";
		}
		
		echo "</table>";
        $queryHitungPesanan = mysqli_query($koneksi, "SELECT * FROM pesanan");
        pagination($queryHitungPesanan, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=pesanan&action=list");
	}
	
?>