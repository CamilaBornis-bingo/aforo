<?php 
$servername = "localhost";
$username = "gtorres";
$password = "gtorres";
$dbname = "aforo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


?>