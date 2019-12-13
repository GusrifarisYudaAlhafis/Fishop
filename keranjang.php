<?php
if ($totalBarang == 0) {
    echo "<h3>Data kosong</h3>";
} else {
    $no=1;

    echo "<table class='tableList'>
				<tr class='barisTitle'>
					<th class='tengah'>No</th>
					<th class='kiri'>Gambar</th>
					<th class='kiri'>Nama Barang</th>
					<th class='tengah'>Jumlah</th>
					<th class='kanan'>Harga Satuan</th>
					<th class='kanan'>Total</th>
				</tr>";

    $subtotal = 0;
    foreach($cart AS $key => $value){
        $IdBarang = $key;

        $namaBarang = $value["namaBarang"];
        $quantity = $value["quantity"];
        $img = $value["img"];
        $price = $value["price"];

        $total = $quantity * $price;
        $subtotal = $subtotal + $total;

        echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='".BASE_URL."assets/img/barang/$img' height='100px' /></td>
					<td class='kiri'>$namaBarang</td>
					<td class='tengah'><input class='updateQuantity' type='number' name='$IdBarang' value='$quantity' /></td>
					<td class='kanan'>".rupiah($price)."</td>
					<td class='kanan hapusItem'>".rupiah($total)." <a href='".BASE_URL."hapus-item.php?IdBarang=$IdBarang'>X</a></td>
				</tr>";

        $no++;
    }

    echo "<tr>
				<td class='kanan' colspan='5'><b>Sub Total</b></td>
				<td class='kanan'><b>".rupiah($subtotal)."</b></td>
			  </tr>";

    echo "</table>";

    echo "<div id='frameButtonKeranjang'>
				<a id='lanjutBelanja' href='".BASE_URL."'>< Lanjut Belanja</a>
				<a id='lanjutPemesanan' href='".BASE_URL."data-pemesan.html'>Lanjut Pemesanan ></a>
			  </div>";
}
?>
<script>
    $(".updateQuantity").on("input", function(e){
        var IdBarang = $(this).attr("name");
        var value = $(this).val();

        $.ajax({
            method: "POST",
            url: "update-keranjang.php",
            data: "IdBarang="+IdBarang+"&value="+value
        })
            .done(function(data){
                location.reload();
            });
    });
</script>