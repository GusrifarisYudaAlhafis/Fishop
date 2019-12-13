<div id="kiri">
    <?php
    echo kategori($IdCategory);
    ?>
</div>
<div id="kanan">
    <div id="slides">
        <?php
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY IdBanner DESC LIMIT 3");
        while ($rowBanner=mysqli_fetch_assoc($queryBanner)) {
            echo "<a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."assets/img/slide/$rowBanner[img]' /></a>";
        }
        ?>
    </div>
    <nav id="frameBarang">
        <ul>
            <?php
            if ($IdCategory) {
                $IdCategory = "AND barang.IdCategory='$IdCategory'";
            }

            $query = mysqli_query($koneksi, "SELECT barang.*, category.category FROM barang JOIN category ON barang.IdCategory=category.IdCategory WHERE barang.status='on' $IdCategory ORDER BY rand() DESC LIMIT 9");

            $no=1;
            while($row=mysqli_fetch_assoc($query)) {
                $category = strtolower($row['category']);
                $barang = strtolower($row['namaBarang']);
                $barang = str_replace(" ", "-", $barang);
                $style=false;
                if ($no == 3) {
                    $style="style='margin-right:0px'";
                    $no=0;
                }

                echo "<li $style>
							<p class='price'>".rupiah($row['price'])."</p>
							<a href='".BASE_URL."$row[IdBarang]/$category/$barang.html'>
								<img src='".BASE_URL."assets/img/barang/$row[img]' />
							</a>
							<div class='keteranganGambar'>
								<p>
								<a href='".BASE_URL."$row[IdBarang]/$category/$barang.html'>$row[namaBarang]</a>
								</p>
								<span>Stok : $row[stok]</span>
							</div>
							<div class='buttonAddCart'>
								<a href='".BASE_URL."tambah-keranjang.php?IdBarang=$row[IdBarang]'>+ add to cart</a>
							</div>";

                $no++;
            }
            ?>
        </ul>
    </nav>
</div>