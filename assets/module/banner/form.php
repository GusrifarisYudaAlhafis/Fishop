<?php
       
    $IdBanner = isset($_GET['IdBanner']) ? $_GET['IdBanner'] : "";
       
    $banner = "";
    $link = "";
    $img = "";
    $status = "";
    $button = "Add";
       
    if($IdBanner != "") {
        $button = "Update";
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE IdBanner='$IdBanner'");
        $row=mysqli_fetch_array($queryBanner);
		$banner = $row["banner"];
		$link = $row["link"];
		$img = "<img src='".BASE_URL."assets/img/slide/$row[img]' alt='Banner' style='width: 200px; vertical-align: middle' />";
		$status = $row["status"];
    }   
?>
<form action="<?php echo BASE_URL."assets/module/banner/action.php?IdBanner=$IdBanner"?>" method="POST" enctype="multipart/form-data">
	<div class="elementForm">
		<label>Banner</label>	
		<span>
            <input type="text" name="banner" value="<?php echo $banner; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Link</label>	
		<span>
            <input type="text" name="link" value="<?php echo $link; ?>" />
        </span>
	</div>
	<div class="elementForm">
		<label>Gambar</label>
		<span>
            <input type="file" name="img" /><?php echo $img; ?>
        </span>
	</div>
	<div class="elementForm">
		<label>Status</label>	
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off		
		</span>
	</div>
	<div class="elementForm">
		<span>
            <input type="submit" name="button" value="<?php echo $button; ?>" />
        </span>
	</div>
</form>