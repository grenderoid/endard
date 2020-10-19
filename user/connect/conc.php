<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbiklan";

$conc = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
