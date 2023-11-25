<?php

// Create connection
$conn = mysqli_connect('127.0.0.1', 'root', '', 'youcontact');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno() . ": " . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}

// ... rest of your code ...

?>
