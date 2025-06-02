<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from your React app
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Content-Type: application/json");
header("Content-Type: application/json; charset=UTF-8");
// DB connection
$conn = new mysqli("localhost", "root", "", "humsafar");

if (isset($_GET['id'])) {
 $id = $_GET['id'];
 $stmt = $conn->prepare("*select* from members profile_id= ?");
 $stmt ->execute([$id0]);
 $profile = $stmt->fetch(PDO::FETCH_ASSOC);

 if ($profile) {
    echo json_encode(["status" =>"success", "data" => $profile]);
 }
 else {
    echo json_encode(["status"=> "error", "message"=> "profile not found"]);
 } }
 else {
   echo json_encode(["status" => "error", "message" => "No Id Provided"]);
 }

?>