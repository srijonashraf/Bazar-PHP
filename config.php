<?php
// Database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bazar';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>