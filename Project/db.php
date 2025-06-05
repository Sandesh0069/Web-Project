<?php
// db.php

$host = 'localhost';
$user = 'root';         // Change if using another user
$pass = '';             // Set your DB password
$db   = 'project';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
