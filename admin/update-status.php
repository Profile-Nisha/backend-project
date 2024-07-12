<?php
session_start();
require 'connection.php';

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $decode['id'];
    $status = $decode['status'];
    $sql = "UPDATE complaints SET status = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    if($stmt->execute()) {
        echo json_encode(["success" => true]);
    }else{
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
    $stmt->close();
    $conn->close();
}else{
    echo json_encode(["success" => false, "error" => "Invalid request method."]);
}



?>