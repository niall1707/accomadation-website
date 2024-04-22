<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'accom';
$user = "root";
$password = "";

// Create a new PDO instance to connect to the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
