<?php

include "connection.php";

$sql = "SELECT * FROM courses";
$execute = mysqli_query($connection, $sql);

$courses = [];

while ($row = mysqli_fetch_assoc($execute)) { 
    $courses[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['price']
    ];
}

header('Content-Type: application/json'); 
echo json_encode(['courses' => $courses]); 
exit; 
