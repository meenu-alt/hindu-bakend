<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from your React app
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Content-Type: application/json");
header("Content-Type: application/json; charset=UTF-8");
// DB connection
$conn = new mysqli("localhost", "root", "", "humsafar");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}

// Query data   
$sql = "SELECT * FROM users"; // change table name accordingly
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$conn->close();
?>
