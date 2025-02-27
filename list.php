<?php

include "connection.php";

$sql = "SELECT * FROM courses";

$execute = mysqli_query($connection, $sql);

$courses = [];

$index = 0;

while ($row = mysqli_fetch_array($execute)) {
    $courses[$index]['id'] = $row['id'];
    $courses[$index]['name'] = $row['name'];
    $courses[$index]['price'] = $row['price'];
    $index++;
}

json_encode(['courses' => $courses]);

var_dump($courses);
