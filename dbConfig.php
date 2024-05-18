<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "php_my_sql_db";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    // Create a PDO connection
    $conn = new PDO($dsn, $user, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display error message if connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>