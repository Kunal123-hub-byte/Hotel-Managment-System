<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP is empty
$database = "lodgix_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
