<div id="frameTambah">
    <a class="tombolAction" href="<?php echo BASE_URL."index.php?page=my-profile&module=kategori&action=form"; ?>">+ Tambah Kategori</a>
</div>
<?php

$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
$dataPerHalaman = 3;
$mulaiDari = ($pagination-1) * $dataPerHalaman;

$queryKategori = mysqli_query($koneksi, "SELECT * FROM category LIMIT $mulaiDari, $dataPerHalaman");

if (mysqli_num_rows($queryKategori) == 0) {
    echo "<h3>Data kosong</h3>";
} else {
    echo "<table class='tableList'>";
    echo "<tr class='barisTitle'>
            <th class='kolomNo'>No</th>
            <th class='kiri'>Kategori</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";
    $no=1 + $mulaiDari;
    while ($row=mysqli_fetch_assoc($queryKategori)) {
        echo "<tr>
                <td class='kolomNo'>$no</td>
                <td class='kiri'>$row[category]</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'>
                    <a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=kategori&action=form&IdCategory=$row[IdCategory]'>Edit</a>
                    <a class='tombolAction' href='".BASE_URL."assets/module/kategori/action.php?button=Delete&IdCategory=$row[IdCategory]'>Delete</a>
                </td>
              </tr>";
        $no++;
    }
    echo "</table>";
    $queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM category");
    pagination($queryHitungKategori, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=kategori&action=list");
}
?>