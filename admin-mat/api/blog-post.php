<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "humsafar");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}

$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM blog WHERE blog_id = $blog_id";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Blog not found"]);
}

$conn->close();
?>
