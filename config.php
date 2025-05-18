<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_lab7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo $conn->connect_error;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful! jkjkS";
}
?>