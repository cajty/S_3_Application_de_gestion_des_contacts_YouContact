<?php
$databaseHost = 'localhost';
$databaseName = 'youcontact';
$databaseUsername = 'root';
$databasePassword = '';
// Create connection
$conn = mysqli_connect($databaseHost , $databaseUsername, $databasePassword , $databaseName );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno());
}
?>
