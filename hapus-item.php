<?php

include_once("assets/function/helper.php");

session_start();

$IdBarang=$_GET['IdBarang'];
$cart = $_SESSION['cart'];

unset($cart[$IdBarang]);

$_SESSION['cart'] = $cart;

header("location:".BASE_URL."keranjang.html");