<?php

if ($IdUser) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location:".BASE_URL."login.html");
}

adminOnly($module, $level);
?>
<div id="bgPageProfile">
    <nav id="menuProfile">
        <ul>
            <?php
            if ($level == "superadmin") {
            ?>
                <li>
                    <a <?php
                        if ($module == "kategori") {
                            echo "class='active'";
                        }
                        ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=kategori&action=list"; ?>">Kategori</a>
                </li>
                <li>
                    <a <?php
                        if ($module == "barang") {
                            echo "class='active'";
                        }
                        ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=barang&action=list"; ?>">Barang</a>
                </li>
                <li>
                    <a <?php
                        if ($module == "kota") {
                            echo "class='active'";
                        }
                        ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=kota&action=list"; ?>">Kota</a>
                </li>
                <li>
                    <a <?php
                        if ($module == "user") {
                            echo "class='active'";
                        }
                        ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=user&action=list"; ?>">User</a>
                </li>
                <li>
                    <a <?php
                        if ($module == "banner") {
                            echo "class='active'";
                        }
                        ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=banner&action=list"; ?>">Banner</a>
                </li>
            <?php
            }
            ?>
            <li>
                <a <?php if ($module == "pesanan") {
                    echo "class='active'";
                    }
                    ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=pesanan&action=list"; ?>">Pesanan</a>
            </li>
        </ul>
    </nav>
    <div id="profileContent">
        <?php
        $file = "assets/module/$module/$action.php";
        if (file_exists($file)) {
            include_once ($file);
        } else {
            echo "<h3>Maaf, halaman tidak ditemukan</h3>";
        }
        ?>
    </div>
</div>