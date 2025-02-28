<?php

$url = "localhost";
$user = "root";
$pass = "";
$db = "api";

$connection = new mysqli($url, $user, $pass, $db);

mysqli_set_charset($connection,"utf8");