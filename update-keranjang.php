<?php

session_start();

$cart = $_SESSION["cart"];
$IdBarang = $_POST["IdBarang"];
$value = $_POST["value"];

$cart[$IdBarang]["quantity"] = $value;

$_SESSION["cart"] = $cart;