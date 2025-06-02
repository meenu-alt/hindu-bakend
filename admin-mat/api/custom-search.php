<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");

$input = json_decode(file_get_contents("php://input"), true);

$lookingFor = $input["lookingFor"] ?? '';
$minAge = $input["minAge"] ?? '';
$maxAge = $input["maxAge"] ?? '';
$minHeight = $input["minHeight"] ?? '';
$caste = $input["caste"] ?? '';
$religion = $input["religion"] ?? '';
$searchId = $input["searchId"] ?? '';

$conn = new mysqli("localhost", "root", "", "humsafar");

if ($conn->connect_error) {
  echo json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]);
  exit;
}

$sql = "SELECT * FROM users WHERE 1=1";

if ($lookingFor) {
  $sql .= " AND gender = '" . $conn->real_escape_string($lookingFor) . "'";
}
if ($minAge) {
  $sql .= " AND age >= " . intval($minAge);
}
if ($maxAge) {
  $sql .= " AND age <= " . intval($maxAge);
}
if ($minHeight) {
  $sql .= " AND height >= '" . $conn->real_escape_string($minHeight) . "'";
}
if ($caste) {
  $sql .= " AND caste = '" . $conn->real_escape_string($caste) . "'";
}
if ($religion) {
  $sql .= " AND religion = '" . $conn->real_escape_string($religion) . "'";
}
if ($searchId) {
  $sql .= " AND id = '" . $conn->real_escape_string($searchId) . "'";
}

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode(["success" => true, "data" => $data]);
$conn->close();
?>
