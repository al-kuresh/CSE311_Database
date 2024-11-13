<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'student_management_system';

// Create a MySQLi object
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


?>
