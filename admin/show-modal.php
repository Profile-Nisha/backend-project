<?php
require 'connection.php';
$input = file_get_contents('php://input');
$decode = json_decode($input, true);

if (isset($decode['id'])) {
    $id = $decode['id'];
    $sql = "SELECT * FROM complaints WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $data = $row;
    echo json_encode($data);
}


?>