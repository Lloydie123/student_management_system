<?php

// Database configuration
$host = "localhost"; // e.g., localhost
$db_name = "student_portal";
$username = "root";
$password = "";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password, $options);
} catch (PDOException $e) {
    // Handle database connection error
    die("Connection failed: " . $e->getMessage());
}



session_start();





?>