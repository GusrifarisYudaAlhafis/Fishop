<?php

    $IdUser = isset($_GET['IdUser']) ? $_GET['IdUser'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE IdUser='$IdUser'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$name = $row["name"];
	$email = $row["email"];
	$hp = $row["hp"];
	$adress = $row["adress"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo BASE_URL."assets/module/user/action.php?IdUser=$IdUser"?>" method="POST">
	<div class="elementForm">
		<label>Nama</label>
		<span>
            <input type="text" name="name" value="<?php echo $name; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Email</label>	
		<span>
            <input type="email" name="email" value="<?php echo $email; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Nomor HP</label>
		<span>
            <input type="number" name="hp" value="<?php echo $hp; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Alamat</label>	
		<span>
            <textarea name="adress" cols="30" rows="10"><?php echo $adress; ?></textarea>
        </span>
	</div>
	<div class="elementForm">
		<label>Level</label>
		<span>
			<input type="radio" value="superadmin" name="level" <?php if($level == "superadmin"){ echo "checked"; } ?> /> Superadmin
			<input type="radio" value="customer" name="level" <?php if($level == "customer"){ echo "checked"; } ?> /> Customer			
		</span>
	</div>
	<div class="elementForm">
		<label>Status</label>	
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off		
		</span>
	</div>
	<div class="elementForm">
		<span>
            <input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>
</form>