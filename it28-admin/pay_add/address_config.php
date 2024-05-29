<?php
// Database configuration using PDO

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
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>