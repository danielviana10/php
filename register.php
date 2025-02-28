<?php
include "connection.php";

header('Content-Type: application/json');

$getData = file_get_contents("php://input");
$data = json_decode($getData);

if (isset($data->name)) {
    $name = $data->name;
    $price = $data->price;

    $stmt = $connection->prepare("INSERT INTO courses (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);

    if ($stmt->execute()) {
        $course = [
            'id' => $stmt->insert_id, 
            'name' => $name,
            'price' => $price
        ];
        echo json_encode(['course' => $course]);
    } else {
        echo json_encode(['error' => 'Erro ao registrar curso']);
    }
} else {
    echo json_encode(['error' => 'Dados inválidos']);
}