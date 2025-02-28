<?php
include "connection.php";

header('Content-Type: application/json');

$getData = file_get_contents("php://input");
$data = json_decode($getData);

if (isset($data->id)) {
    $id = $data->id;
    $name = $data->name;
    $price = $data->price;
    
    $stmt = $connection->prepare("UPDATE courses SET name=?, price=? WHERE id=?");
    $stmt->bind_param("sdi", $name, $price, $id);

    if ($stmt->execute()) {
        $course = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];
        echo json_encode(['course' => $course]);
    } else {
        echo json_encode(['error' => 'Erro ao atualizar curso']);
    }
} else {
    echo json_encode(['error' => 'Dados inválidos']);
}
