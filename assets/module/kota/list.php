<div id="frameTambah">
	<a class="tombolAction" href="<?php echo BASE_URL."index.php?page=my-profile&module=kota&action=form"; ?>">+ Tambah Kota</a>
</div>
<?php

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $dataPerHalaman = 3;
    $mulaiDari = ($pagination-1) * $dataPerHalaman;

	$queryKota = mysqli_query($koneksi, "SELECT * FROM city ORDER BY city ASC LIMIT $mulaiDari, $dataPerHalaman");
	
	if(mysqli_num_rows($queryKota) == 0) {
		echo "<h3>Data kosong</h3>";
	} else {
		echo "<table class='tableList'>";
		echo "<tr class='barisTitle'>
					<th class='kolomNo'>No</th>
					<th class='kiri'>Kota</th>
					<th class='kiri'>Tarif</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
			  </tr>";
			$no = 1 + $mulaiDari;
			while($rowKota=mysqli_fetch_assoc($queryKota)) {
				echo "<tr>
						<td class='kolomNo'>$no</td>
						<td>$rowKota[city]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td class='tengah'>$rowKota[status]</td>
						<td class='tengah'>
							<a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=kota&action=form&IdCity=$rowKota[IdCity]"."'>Edit</a>
                            <a class='tombolAction' href='".BASE_URL."assets/module/kota/action.php?button=Delete&IdCity=$rowKota[IdCity]'>Delete</a>
						</td>
					 </tr>";
				$no++;
			}
		echo "</table>";
        $queryHitungKota = mysqli_query($koneksi, "SELECT * FROM city");
        pagination($queryHitungKota, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=kota&action=list");
	}
?>