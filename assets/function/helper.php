<?php

define("BASE_URL", "http://localhost/fishop/");

$arrayStatusPesanan[0] = "Menunggu Pembayaran";
$arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
$arrayStatusPesanan[2] = "Lunas";
$arrayStatusPesanan[3] = "Pembayaran Di Tolak";

function rupiah($nilai = 0) {
    $string = "Rp.".number_format($nilai);
    return $string;
}

function kategori($IdCategory = false) {
    global $koneksi;

    $string = "<nav id='menuKategori'>";

    $string .= "<ul>";

    $query = mysqli_query($koneksi, "SELECT * FROM category WHERE status='on'");

    while($row=mysqli_fetch_assoc($query)) {
        $category = strtolower($row['category']);
        if ($IdCategory == $row['IdCategory']) {
            $string .= "<li><a class='active' href='".BASE_URL."$row[IdCategory]/$category.html'>$row[category]</a></li>";
        } else {
            $string .= "<li><a href='".BASE_URL."$row[IdCategory]/$category.html'>$row[category]</a></li>";
        }
    }

    $string .= "</ul>";

    $string .= "</nav>";

    return $string;
}

function adminOnly($module, $level) {
    if ($level != "superadmin") {
        $adminPages = array("kategori", "barang", "kota", "user", "banner");
        if (in_array($module, $adminPages)) {
            header("location:".BASE_URL);
        }
    }
}

function pagination($query, $dataPerHalaman, $pagination, $url) {
    $totalData = mysqli_num_rows($query);
    $totalHalaman = ceil($totalData / $dataPerHalaman);
    $batasPosisiNomor = 6;
    $batasJumlahHalaman = 10;
    $mulaiPagination = 1;
    $batasAkhirPagination = $totalHalaman;
    echo "<ul class='pagination'>";

    if ($pagination > 1) {
        $prev = $pagination - 1;
        echo "<li><a href='".BASE_URL."$url&pagination=$prev'><< Prev</a></li>";
    }

    if ($totalHalaman >= $batasJumlahHalaman) {
        if ($pagination > $batasPosisiNomor) {
            $mulaiPagination = $pagination - ($batasPosisiNomor - 1);
        }
        $batasAkhirPagination = ($mulaiPagination - 1) + $batasJumlahHalaman;
        if ($batasAkhirPagination > $totalHalaman) {
            $batasAkhirPagination = $totalHalaman;
        }
    }

    for ($i = $mulaiPagination; $i <= $batasAkhirPagination; $i++) {
        if ($pagination == $i) {
            echo "<li><a class='active' href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
        } else {
            echo "<li><a href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
        }
    }

    if ($pagination < $totalHalaman) {
        $next = $pagination + 1;
        echo "<li><a href='".BASE_URL."$url&pagination=$next'>Next >></a></li>";
    }

    echo "</ul>";
}