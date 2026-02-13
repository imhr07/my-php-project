<?php
session_start();
require_once "../config.php"; 

if (!isset($_SESSION['agency_id'])) {
    header("Location: login.php");
    exit; 
}

$agency_id = $_SESSION['agency_id'];

$stmt = $conn->prepare("SELECT bookings.booking_id,
                               customers.name AS customer_name,
                               customers.email AS customer_email,
                               customers.mobile AS customer_mobile,
                               cars.vehicle_model,
                               cars.vehicle_number,
                               bookings.start_date,
                               bookings.booking_date,
                               bookings.end_date
                        FROM bookings
                        INNER JOIN cars ON bookings.car_id = cars.car_id
                        INNER JOIN customers ON bookings.customer_id = customers.customer_id
                        WHERE cars.agency_id = ?
                        ORDER BY bookings.booking_id DESC");

$stmt->bind_param("i", $agency_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agency Bookings</title>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}

/* Modern Navbar */
.navbar {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
}

.navbar-brand {
    font-weight: 600;
    letter-spacing: 1px;
}

.nav-btn {
    padding: 6px 14px;
    margin-left: 10px;
    border-radius: 25px;
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
    background: rgba(255,255,255,0.1);
}

.nav-btn:hover {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    transform: translateY(-2px);
}

/* Card Container */
.booking-card {
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* Table Styling */
.table thead {
    background: linear-gradient(135deg, #0072ff, #00c6ff);
    color: #fff;
}

.table tbody tr:hover {
    background: #f1f7ff;
    transition: 0.2s;
}

.badge-date {
    background: #17a2b8;
    padding: 6px 10px;
    border-radius: 15px;
    color: #fff;
    font-size: 12px;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="fas fa-car"></i> Velocity Rentals
        </a>

        <div class="ml-auto">
            <a href="../index.php" class="nav-btn">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="../logout.php" class="nav-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">

<?php if ($result->num_rows > 0): ?>

<div class="booking-card">
    <h3 class="mb-4"><i class="fas fa-calendar-check"></i> Agency Bookings</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Booking Time</th>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Vehicle</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $count = 1;
            while ($row = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?= $count++; ?></td>

                    <td>
                        <span class="badge-date">
                            <?= $row['booking_date']; ?>
                        </span>
                    </td>

                    <td>
                        <strong><?= $row['customer_name']; ?></strong><br>
                        <?= $row['customer_email']; ?>
                    </td>

                    <td><?= $row['customer_mobile']; ?></td>

                    <td>
                        <?= $row['vehicle_model']; ?><br>
                        <small><?= $row['vehicle_number']; ?></small>
                    </td>

                    <td>
                        <?= $row['start_date']; ?> <br>
                        <i class="fas fa-arrow-down"></i> <br>
                        <?= $row['end_date']; ?>
                    </td>
                </tr>

            <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</div>

<?php else: ?>

<div class="booking-card text-center">
    <h4>No bookings yet 🚗</h4>
    <p class="text-muted">Once customers rent cars, bookings will appear here.</p>
</div>

<?php endif; ?>

</div>

</body>
</html>
