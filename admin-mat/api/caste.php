<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "humsafar");

if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

$response = [
    'success' => true,
    'data' => [
        'caste' => [],
        'gothra' => [],
        'cities' => [],
        'countries' => [],
        'income' => [],
        'language' => [],
        'states' => []
    ]
];

// Helper function to fetch data
function fetchData($conn, $table, $column) {
    $data = [];
    $sql = "SELECT $column FROM $table";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row[$column];
        }
    }
    return $data;
}

try {
    $response['data']['caste'] = fetchData($conn, 'caste', 'caste');
    $response['data']['gothra'] = fetchData($conn, 'gothra', 'name');
    $response['data']['cities'] = fetchData($conn, 'cities', 'city_name');
    $response['data']['countries'] = fetchData($conn, 'countries', 'country_name');
    $response['data']['income'] = fetchData($conn, 'income', 'name');
    $response['data']['language'] = fetchData($conn, 'language', 'language');
    $response['data']['states'] = fetchData($conn, 'states', 'state_name');
} catch (Exception $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

$conn->close();

echo json_encode($response);
?>