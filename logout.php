<?php

session_start();

unset($_SESSION['IdUser']);
unset($_SESSION['name']);
unset($_SESSION['level']);

header("location: index.php");