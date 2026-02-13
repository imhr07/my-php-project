<?php
session_start();
require_once "../config.php";

// Check if customer logged in
if (!isset($_SESSION['customer_id'])) {
    header("location: ../signin.php");
    exit();
}

// Sanitize function
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $car_id = isset($_POST['car_id']) ? intval($_POST['car_id']) : 0;
    $start_date = isset($_POST['start_date']) ? sanitizeInput($_POST['start_date']) : '';
    $number_of_days = isset($_POST['number_of_days']) ? intval($_POST['number_of_days']) : 0;

    // Validate start date
    if (empty($start_date)) {
        die("Please select start date.");
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $start_date)) {
        die("Invalid start date format.");
    }

    // Validate number of days
    if ($number_of_days < 1 || $number_of_days > 10) {
        die("Number of days should be between 1 and 10.");
    }

    $customer_id = intval($_SESSION['customer_id']);

    // Calculate end date
    $end_date = date('Y-m-d', strtotime($start_date . " +$number_of_days days"));

    // Insert booking
    $sql = "INSERT INTO bookings (car_id, customer_id, start_date, end_date) 
            VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("iiss", $car_id, $customer_id, $start_date, $end_date);

        if ($stmt->execute()) {
            header("location: booking_success.html");
            exit();
        } else {
            die("Error while saving booking.");
        }

        $stmt->close();
    }

    $conn->close();
}
?>
