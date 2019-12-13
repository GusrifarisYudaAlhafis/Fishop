<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");