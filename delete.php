<?php

include "connection.php";

$getData = file_get_contents("php://input");

$data = json_decode($getData);

$id = $data->courses->id;

$sql = "DELETE FROM courses WHERE id=$id";
mysqli_query($connection, $sql);

