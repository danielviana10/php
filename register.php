<?php

include "connection.php";

$getData = file_get_contents("php://input");

$data = json_decode($getData);

$name = $data->courses->name;
$price = $data->courses->price;

$sql = "INSERT INTO courses (name, price) VALUES ('$name', $price)";
mysqli_query($connection, $sql);

$course = [
    'nameCourse' => $name,
    'priceCourse' => $price
];

json_encode(['course' => $course]);