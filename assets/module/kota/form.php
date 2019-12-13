<?php

	$IdCity = isset($_GET['IdCity']) ? $_GET['IdCity'] : false;
	
	$city = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($IdCity) {
		$queryKota = mysqli_query($koneksi, "SELECT * FROM city WHERE IdCity='$IdCity'");
		$row=mysqli_fetch_assoc($queryKota);
		$city = $row['city'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		$button = "Update";
	}
?>		
<form action="<?php echo BASE_URL."assets/module/kota/action.php?IdCity=$IdCity"?>" method="POST">
	<div class="elementForm">
		<label>Kota</label>	
		<span>
            <input type="text" name="city" value="<?php echo $city; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Tarif</label>	
		<span>
            <input type="text" name="tarif" value="<?php echo $tarif; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Status</label>	
		<span>
			<input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>
	<div class="elementForm">
		<span>
            <input type="submit" name="button" value="<?php echo $button; ?>" />
        </span>
	</div>
</form>