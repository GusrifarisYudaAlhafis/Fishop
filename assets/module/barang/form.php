<?php

$IdBarang = isset($_GET['IdBarang']) ? $_GET['IdBarang'] : false;

$namaBarang = "";
$IdCategory = "";
$spesification = "";
$stok = "";
$price = "";
$img = "";
$status = "";
$button = "Add";

if ($IdBarang) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE IdBarang='$IdBarang'");
    $row = mysqli_fetch_assoc($query);
    $namaBarang = $row['namaBarang'];
    $IdCategory = $row['IdCategory'];
    $spesification = $row['spesification'];
    $stok = $row['stok'];
    $price = $row['price'];
    $img = $row['img'];
    $status = $row['status'];
    $button = "Update";
    $img = "<img src='".BASE_URL."assets/img/barang/$img' alt='Barang' style='width: 200px; vertical-align: middle'/>";
}
?>
<script src="<?php echo BASE_URL."assets/javascript/ckeditor/ckeditor.js"; ?>"></script>
<form action="<?php echo BASE_URL."assets/module/barang/action.php?IdBarang=$IdBarang"; ?>" method="POST" enctype="multipart/form-data">
    <div class="elementForm">
        <label>Kategori</label>
        <span>
            <select name="IdCategory">
                <?php
                $query = mysqli_query($koneksi, "SELECT IdCategory, category FROM category WHERE status='on' ORDER BY category ASC");
                while ($row=mysqli_fetch_assoc($query)) {
                    if ($IdCategory == $row['IdCategory']) {
                        echo "<option value='$row[IdCategory]' selected='true'>$row[category]</option>";
                    } else {
                        echo "<option value='$row[IdCategory]'>$row[category]</option>";
                    }
                }
                ?>
            </select>
        </span>
    </div>
    <div class="elementForm">
        <label>Nama Barang</label>
        <span>
            <input type="text" name="namaBarang" value="<?php echo $namaBarang; ?>">
        </span>
    </div>
    <div style="margin-bottom: 10px">
        <label style="font-weight: bold">Spesifikasi</label>
        <span>
            <textarea id="editor" name="spesification" cols="30" rows="10"><?php echo $spesification; ?></textarea>
        </span>
    </div>
    <div class="elementForm">
        <label>Stok</label>
        <span>
            <input type="text" name="stok" value="<?php echo $stok; ?>">
        </span>
    </div>
    <div class="elementForm">
        <label>Harga</label>
        <span>
            <input type="text" name="price" value="<?php echo $price; ?>">
        </span>
    </div>
    <div class="elementForm">
        <label>Gambar</label>
        <span>
            <input type="file" name="img"> <?php echo $img; ?>
        </span>
    </div>
    <div class="elementForm">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") { echo "checked='true'"; } ?>> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") { echo "checked='true'"; } ?>> Off
        </span>
    </div>
    <div class="elementForm">
        <span>
            <input type="submit" name="button" value="<?php echo $button; ?>">
        </span>
    </div>
</form>
<script>
    CKEDITOR.replace("editor");
</script>