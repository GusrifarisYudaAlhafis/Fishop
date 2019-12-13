<?php

	$IdPesanan = $_GET["IdPesanan"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE IdPesanan='$IdPesanan'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>
<form action="<?php echo BASE_URL."assets/module/pesanan/action.php?IdPesanan=$IdPesanan"; ?>" method="POST">
	<div class="elementForm">
		<label>Pesanan Id (Faktur Id)</label>    
		<span>
            <input type="number" value="<?php echo $IdPesanan; ?>" name="IdPesanan" readonly="true" />
        </span>
	</div>
	<div class="elementForm">
		<label>Status</label>
		<span>
			<select name="status">
				<?php
					foreach($arrayStatusPesanan AS $key => $value) {
						if ($status == $key) {
							echo "<option value='$key' selected='true'>$value</option>";
						} else {
							echo "<option value='$key'>$value</option>";
						}
					}
				?>
			</select>
		</span>
	</div>
	<div class="elementForm">
		<span>
            <input class="tombolAction" type="submit" value="Edit Status" name="button" />
        </span>
	</div>
</form>