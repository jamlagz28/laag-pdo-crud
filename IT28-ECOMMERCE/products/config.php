<?php

$host = 'localhost';
$dbname = 'it28-ecommerce';
$username = 'root';
$password = '';
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u593341949_dev_demo');
define('DB_PASSWORD', 'Admin_demo123');
define('DB_NAME', 'u593341949_db_demo');
*/
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}