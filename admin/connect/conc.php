  
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbiklan";

$conc = new mysqli($servername, $username, $password, $database);

if ($conc->connect_error) {
	die("Connection failed: " . $conc->connect_error);
}
?>
