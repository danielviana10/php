<?php

include "connection.php";

$getData = file_get_contents("php://input");

$data = json_decode($getData);

$id = $data->courses->id;
$name = $data->courses->name;
$price = $data->courses->price;

$sql = "UPDATE courses SET name='$name', price=$price WHERE id=$id";
mysqli_query($connection, $sql);

$course = [
    'idCourse' => $id,
    'nameCourse' => $name,
    'priceCourse' => $price
];

json_encode(['course' => $course]);
