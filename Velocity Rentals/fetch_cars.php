<?php
include_once "config.php";

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit  = 3;

$sql = "SELECT c.car_id,
               c.vehicle_model,
               c.body_type,
               c.fuel,
               c.transmission,
               c.seating_capacity,
               c.vehicle_number,
               c.rent_per_day,
               c.images,
               a.name AS agency_name
        FROM cars c
        INNER JOIN agencies a ON c.agency_id = a.agency_id
        ORDER BY c.car_id ASC
        LIMIT $offset, $limit";

$result = $conn->query($sql);

$cars = [];

while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}

header('Content-Type: application/json');
echo json_encode($cars);
