<?php
	$conc = mysqli_connect('localhost', 'root', '', 'dbiklan');

	if ($conc->connect_error) {
	    die("Connection failed: " . $conc->connect_error);
	}
	
?>