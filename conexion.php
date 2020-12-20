<?php 
$servername = "192.168.2.10";
$username = "root";
$password = "";
$dbname = "aforo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>