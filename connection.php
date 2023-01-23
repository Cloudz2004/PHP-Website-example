<?php
$servername = "localhost";
$root = "root";
$username = "projectservers";
$password = "";

$conn = new mysqli($servername, $root, $password, $username);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>