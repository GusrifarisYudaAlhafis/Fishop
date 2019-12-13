<?php

session_start();

include_once ("assets/function/koneksi.php");
include_once ("assets/function/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$IdCategory = isset($_GET['IdCategory']) ? $_GET['IdCategory'] : false;

$IdUser = isset($_SESSION['IdUser']) ? $_SESSION['IdUser'] : false;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$totalBarang = count($cart);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fishop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/fontawesome-free-5.11.2-web/css/all.min.css"; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/style.css"; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."assets/css/banner.css"; ?>">
    <script src="<?php echo BASE_URL."assets/javascript/jquery-3.1.1.min.js"?>"></script>
    <script src="<?php echo BASE_URL."assets/javascript/Slides-SlidesJS-3/source/jquery.slides.min.js"?>"></script>
    <script src="<?php echo BASE_URL."assets/javascript/script.js"?>"></script>
    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 350,
                play: { auto : true,
                    interval : 3000
                },
                navigation : false
            });
        });
    </script>
</head>
<body>
<div id="container">
    <header>
        <a href="<?php echo BASE_URL; ?>">
            <img width="144px" height="44px" src="<?php echo BASE_URL."assets/img/logo.png"; ?>" alt="Logo">
        </a>
        <div id="menu">
            <div id="user">
                <?php
                if ($IdUser) {
                    echo "Hi <b>$name</b>, 
                          <a href='".BASE_URL."index.php?page=my-profile&module=pesanan&action=list'>My Profile</a>
                          <a href='".BASE_URL."logout.php'>Logout</a>";
                } else {
                    echo "<a href='".BASE_URL."login.html'>Login</a>
                          <a href='".BASE_URL."register.html'>Register</a>";
                }
                ?>
            </div>
            <a id="buttonCart" href="<?php echo BASE_URL."keranjang.html"; ?>">
                <img src="<?php echo BASE_URL."assets/img/cart.png"; ?>" alt="Keranjang">
                <?php
                if($totalBarang != 0){
                    echo "<span class='totalBarang'>$totalBarang</span>";
                }
                ?>
            </a>
        </div>
    </header>
    <div id="content">
        <?php $filename = "$page.php";
        if (file_exists($filename)) {
            include_once ($filename);
        } else {
            include_once ("main.php");
        }
        ?>
    </div>
    <footer>
        <p>Fishop &copy 2019</p>
    </footer>
</div>
</body>
</html>