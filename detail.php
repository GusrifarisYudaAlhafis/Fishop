<div id="kiri">
    <?php
    echo kategori($IdCategory);
    ?>
</div>
<div id="kanan">
    <?php
    $IdBarang = $_GET['IdBarang'];

    $query = mysqli_query($koneksi, "SELECT barang.* FROM barang WHERE barang.IdBarang='$IdBarang' AND barang.status='on'");
    $row = mysqli_fetch_assoc($query);

    echo "<div id='detailBarang'>
					<h2>$row[namaBarang]</h2>
					<div id='frameGambar'>
						<img src='".BASE_URL."assets/img/barang/$row[img]' />
					</div>
					<div id='frameHarga'>
						<span>".rupiah($row['price'])."</span>
						<a href='".BASE_URL."tambah-keranjang.php?IdBarang=$row[IdBarang]'>+ add to cart</a>
					</div>
					<div id='keterangan'>
						<b>Keterangan : </b> $row[spesification]
					</div>
				</div>";
    ?>
</div>