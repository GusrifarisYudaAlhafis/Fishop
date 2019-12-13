<?php
if ($IdUser == false) {
    $_SESSION["prosesPesanan"] = true;

    header("location: ".BASE_URL."login.html");
    exit;
}
?>
<div id="frameDataPengiriman">
    <h3 class="labelDataPengiriman">Alamat Pengiriman Barang</h3>
    <div id="frameFormPengiriman">
        <form action="<?php echo BASE_URL."proses-pemesanan.php"; ?>" method="POST">
            <div class="elementForm">
                <label>Nama Penerima</label>
                <span>
                    <input type="text" name="namaPenerima" />
                </span>
            </div>
            <div class="elementForm">
                <label>Nomor HP</label>
                <span>
                    <input type="number" name="hp" />
                </span>
            </div>
            <div class="elementForm">
                <label>Alamat Pengiriman</label>
                <span>
                    <textarea name="adress" cols="30" rows="10"></textarea>
                </span>
            </div>
            <div class="elementForm">
                <label>Kota</label>
                <span>
					<select name="city">
						<?php
                        $query = mysqli_query($koneksi, "SELECT * FROM city");

                        while($row=mysqli_fetch_assoc($query)) {
                            echo "<option value='$row[IdCity]'>$row[city] (".rupiah($row["tarif"]).")</option>";
                        }
                        ?>
					</select>
				</span>
            </div>
            <div class="elementForm">
                <span>
                    <input type="submit" name="submit" value="submit" />
                </span>
            </div>
        </form>
    </div>
</div>
<div id="frameDataDetail">
    <h3 class="labelDataPengiriman">Detail Order</h3>
    <div id="frameDetailOrder">
        <table class="tableList">
            <tr>
                <th class='kiri'>Nama Barang</th>
                <th class='tengah'>Jumlah</th>
                <th class='kanan'>Total</th>
            </tr>
            <?php
            $subtotal = 0;
            foreach($cart AS $key => $value) {
                $IdBarang = $key;
                $namaBarang = $value['namaBarang'];
                $price = $value['price'];
                $quantity = $value['quantity'];
                $total = $quantity * $price;
                $subtotal = $subtotal + $total;
                echo "<tr>
							<td class='kiri'>$namaBarang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
            }
            echo "<tr>
						<td class='kanan' colspan='2'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";
            ?>
        </table>
    </div>
</div>