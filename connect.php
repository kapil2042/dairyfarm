<?php

$conn=mysqli_connect("localhost", "root", "", "dairyfarm");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>