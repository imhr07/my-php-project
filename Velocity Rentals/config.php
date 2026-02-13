<?php
$servername = getenv("MYSQLHOST");
$username   = getenv("MYSQLUSER");
$password   = getenv("MYSQLPASSWORD");
$dbname     = getenv("MYSQLDATABASE");
$port       = getenv("MYSQLPORT");

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
