<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "Dan_Sugar";

// Create connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>