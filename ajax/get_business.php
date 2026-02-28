<?php
include '../config/db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM businesses WHERE id=$id");
$row = $result->fetch_assoc();

echo json_encode($row);