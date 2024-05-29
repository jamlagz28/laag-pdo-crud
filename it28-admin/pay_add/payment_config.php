<?php
// Database configuration

$servername = "localhost";
$username = "u593341949_dev_laag";
$password = "20221463Laag";
$database = "u593341949_db_laag";
/*
$servername = "localhost";
$username = "root";
$password = "";
$database = "laag";
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>