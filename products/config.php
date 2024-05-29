<?php
/*
$host = 'localhost';
$dbname = 'u593341949_db_laag';
$username = 'u593341949_dev_laag';
$password = '20221463Laag';
*/
$host = 'localhost';
$dbname = 'laag';
$username = 'root';
$password = '';

try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}