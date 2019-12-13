<?php
	
	$IdPesanan= $_GET["IdPesanan"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.namaPenerima, pesanan.hp, pesanan.adress, pesanan.datePemesanan, user.name, city.city, city.tarif FROM pesanan JOIN user ON pesanan.IdUser=user.IdUser JOIN city ON city.IdCity=pesanan.IdCity WHERE pesanan.IdPesanan='$IdPesanan'");
	
	$row=mysqli_fetch_assoc($query);
	
	$datePemesanan = $row['datePemesanan'];
	$namaPenerima = $row['namaPenerima'];
	$hp = $row['hp'];
	$adress = $row['adress'];
	$tarif = $row['tarif'];
	$name = $row['name'];
	$city = $row['city'];
?>
<div id="frameFaktur">
	<h3 align="center">Detail Pesanan</h3>
    <hr>
	<table>
		<tr>
			<td>Nomor Faktur</td>
			<td>:</td>
			<td><?php echo $IdPesanan; ?></td>
		</tr>
		<tr>
			<td>Nama Pemesan</td>
			<td>:</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php echo $namaPenerima; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $adress; ?></td>
		</tr>
		<tr>
			<td>Nomor HP</td>
			<td>:</td>
			<td><?php echo $hp; ?></td>
		</tr>		
		<tr>
			<td>Tanggal Pemesanan</td>
			<td>:</td>
			<td><?php echo $datePemesanan; ?></td>
		</tr>		
	</table>	
</div>
	<table class="tableList">
		<tr class="barisTitle">
			<th class="no">No</th>
			<th class="kiri">Nama Barang</th>
			<th class="tengah">Jumlah</th>
			<th class="kanan">Harga Satuan</th>
			<th class="kanan">Total</th>
		</tr>
		<?php
		
			$queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.namaBarang FROM pesanan_detail JOIN barang ON pesanan_detail.IdBarang=barang.IdBarang WHERE pesanan_detail.IdPesanan='$IdPesanan'");
			
			$no = 1;
			$subtotal = 0;
			while($rowDetail=mysqli_fetch_assoc($queryDetail)) {
				$total = $rowDetail["price"] * $rowDetail["quantity"];
				$subtotal = $subtotal + $total;
				echo "<tr>
						<td class='no'>$no</td>
						<td class='kiri'>$rowDetail[namaBarang]</td>
						<td class='tengah'>$rowDetail[quantity]</td>
						<td class='kanan'>".rupiah($rowDetail["price"])."</td>
						<td class='kanan'>".rupiah($total)."</td>
					  </tr>";
				$no++;
			}
		
			$subtotal = $subtotal + $tarif;
		?>
		<tr>
			<td class="kanan" colspan="4">Biaya Pengiriman</td>
			<td class="kanan"><?php echo rupiah($tarif); ?></td>
		</tr>
		<tr>
			<td class="kanan" colspan="4"><b>Sub total</b></td>
			<td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
		</tr>
	</table>
	<div id="frameKeteranganPembayaran">
		<p>Silahkan Lakukan pembayaran ke Bank BNI Syariah<br/>
		   Nomor Account : 0000-0000-0000 (A/N Gusrifaris Yuda Alhafis).<br/>
		   Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran 
		   <a href="<?php echo BASE_URL."index.php?page=my-profile&module=pesanan&action=konfirmasi-pembayaran&IdPesanan=$IdPesanan"?>">Disini</a>.
		</p>
	</div>