<?php
include_once "config.php";

// Get offset safely
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 3; // Number of cars per load

// Query to fetch cars
$sql = "SELECT c.car_id,
               c.vehicle_model,
               c.body_type,
               c.fuel,
               c.transmission,
               c.seating_capacity,
               c.rent_per_day,
               c.images,
               a.name AS agency_name
        FROM cars c
        INNER JOIN agencies a ON c.agency_id = a.agency_id
        ORDER BY c.car_id ASC
        LIMIT ?, ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();

$result = $stmt->get_result();

$cars = [];

while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}

$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($cars);
