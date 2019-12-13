<?php

$IdCategory = isset($_GET['IdCategory']) ? $_GET['IdCategory'] : false;

$category = "";
$status = "";
$button = "Add";

if ($IdCategory) {
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM category WHERE IdCategory='$IdCategory'");
    $row = mysqli_fetch_assoc($queryKategori);
    $category = $row['category'];
    $status = $row['status'];
    $button = "Update";
}
?>
<form action="<?php echo BASE_URL."assets/module/kategori/action.php?IdCategory=$IdCategory"; ?>" method="POST">
    <div class="elementForm">
        <label>Kategori</label>
        <span>
            <input type="text" name="category" value="<?php echo $category; ?>">
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