<?php
$search = isset($_GET["search"]) ? $_GET["search"] : false;
$where = "";
$searchURL = "";
if ($search) {
    $searchURL = "&search=$search";
    $where = "WHERE barang.namaBarang LIKE '%$search%'";
}
?>
<div id="frameTambah">
    <div id="left">
        <form action="<?php echo BASE_URL."index.php";?>" method="GET">
            <input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
            <input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
            <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
            <input type="text" name="search" value="<?php echo $search; ?>">
            <input type="submit" value="Search">
        </form>
    </div>
    <div id="right">
        <a class="tombolAction" href="<?php echo BASE_URL."index.php?page=my-profile&module=barang&action=form"; ?>">+ Tambah Barang</a>
    </div>
</div>
<?php
$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
$dataPerHalaman = 3;
$mulaiDari = ($pagination-1) * $dataPerHalaman;

$query = mysqli_query($koneksi, "SELECT barang.*, category.category FROM barang JOIN category ON barang.IdCategory=category.IdCategory $where ORDER BY barang.IdBarang DESC LIMIT $mulaiDari, $dataPerHalaman");

if (mysqli_num_rows($query) == 0) {
    echo "<h3>Data kosong</h3>";
} else {
    echo "<table class='tableList'>";
    echo "<tr class='barisTitle'>
            <th class='kolomNo'>No</th>
            <th class='kiri'>Barang</th>
            <th class='kiri'>Kategori</th>
            <th class='kiri'>Harga</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";
    $no=1 + $mulaiDari;
    while ($row=mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td class='kolomNo'>$no</td>
                <td class='kiri'>$row[namaBarang]</td>
                <td class='kiri'>$row[category]</td>
                <td class='kiri'>".rupiah($row['price'])."</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'>
                    <a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=barang&action=form&IdBarang=$row[IdBarang]'>Edit</a>
                    <a class='tombolAction' href='".BASE_URL."assets/module/barang/action.php?button=Delete&IdBarang=$row[IdBarang]'>Delete</a>
                </td>
              </tr>";
        $no++;
    }
    echo "</table>";
    $queryHitungBarang = mysqli_query($koneksi, "SELECT * FROM barang $where");
    pagination($queryHitungBarang, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=barang&action=list$searchURL");
}