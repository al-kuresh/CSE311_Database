<?php
$svName = "localhost";
$userName = "root";
$password = "";
$database = "student_management_system";

try {
    $conct = new PDO("mysql:host=$svName;dbname=$database;charset=utf8mb4", $userName, $password);
    $conct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    exit("A database error occurred. Please try again later.");
}
?>