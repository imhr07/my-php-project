<?php
$servername = "shuttle.proxy.rlwy.net";
$username = "root";
$password = "RBcFkmAKBSdPxDstXrxPQZoZDCEITXHt";
$dbname = "railway";
$port = 35739;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
