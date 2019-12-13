<div id="frameTambah">
	<a class="tombolAction" href="<?php echo BASE_URL."index.php?page=my-profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
</div>
<?php

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $dataPerHalaman = 3;
    $mulaiDari = ($pagination-1) * $dataPerHalaman;

    $no=1 + $mulaiDari;
        
    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY IdBanner DESC LIMIT $mulaiDari, $dataPerHalaman");
        
    if(mysqli_num_rows($queryBanner) == 0) {
        echo "<h3>Data kosong</h3>";
    } else {
        echo "<table class='tableList'>";
        echo "<tr class='barisTitle'>
                    <th class='kolomNo'>No</th>
                    <th class='kiri'>Banner</th>
                    <th class='kiri'>Link</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
              </tr>";
            while($rowBanner=mysqli_fetch_array($queryBanner)) {
                echo "<tr>
                        <td class='kolomNo'>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td>
                            <a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a>
                        </td>
                        <td class='tengah'>$rowBanner[status]</td>
                        <td class='tengah'>
                            <a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=banner&action=form&IdBanner=$rowBanner[IdBanner]"."'>Edit</a>
                            <a class='tombolAction' href='".BASE_URL."assets/module/banner/action.php?button=Delete&IdBanner=$rowBanner[IdBanner]'>Delete</a>
                        </td>
                     </tr>";
                $no++;
            }
        echo "</table>";
        $queryHitungBanner = mysqli_query($koneksi, "SELECT * FROM banner");
        pagination($queryHitungBanner, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=banner&action=list");
    }
?>