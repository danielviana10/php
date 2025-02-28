<?php
include "connection.php";

header('Content-Type: application/json');

$id = $_GET['id'];

if (isset($id)) {
    $stmt = $connection->prepare("DELETE FROM courses WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Curso deletado com sucesso']);
    } else {
        echo json_encode(['error' => 'Erro ao deletar curso']);
    }
} else {
    echo json_encode(['error' => 'ID do curso não fornecido']);
}
