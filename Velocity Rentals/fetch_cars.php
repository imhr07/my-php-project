<?php
include_once "config.php";

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 3;

$sql = "SELECT c.car_id,
               c.vehicle_model,
               c.body_type,
               c.fuel,
               c.transmission,
               c.seating,
               c.vehicle_number,
               a.name AS agency_name
        FROM cars c
        INNER JOIN agencies a ON c.agency_id = a.agency_id
        ORDER BY c.car_id ASC
        LIMIT :offset, :limit";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();

$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($cars);
