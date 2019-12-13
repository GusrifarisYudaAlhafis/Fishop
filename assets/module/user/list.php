<?php

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $dataPerHalaman = 3;
    $mulaiDari = ($pagination-1) * $dataPerHalaman;

    $no=1 + $mulaiDari;
      
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY name ASC LIMIT $mulaiDari, $dataPerHalaman");
      
    if(mysqli_num_rows($queryAdmin) == 0) {
        echo "<h3>Data kosong</h3>";
    } else {
        echo "<table class='tableList'>";
        echo "<tr class='barisTitle'>
                    <th class='kolomNo'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>HP</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
              </tr>";
            while($rowUser=mysqli_fetch_array($queryAdmin)) {
                echo "<tr>
                        <td class='kolomNo'>$no</td>
                        <td>$rowUser[name]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[hp]</td>
                        <td>$rowUser[level]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'>
                            <a class='tombolAction' href='".BASE_URL."index.php?page=my-profile&module=user&action=form&IdUser=$rowUser[IdUser]"."'>Edit</a>
                            <a class='tombolAction' href='".BASE_URL."assets/module/user/action.php?button=Delete&IdUser=$rowUser[IdUser]'>Delete</a>
                        </td>
                     </tr>";
                $no++;
            }
        echo "</table>";
        $queryHitungUser = mysqli_query($koneksi, "SELECT * FROM user");
        pagination($queryHitungUser, $dataPerHalaman, $pagination, "index.php?page=my-profile&module=user&action=list");
    }
?>