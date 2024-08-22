<?php
$servername = "192.168.80.146"; // IP address of the MariaDB server
$username = "root";
$password = "iacsd123";
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
