<?php
session_start();

include 'conc.php';

if(!isset($_SESSION['level']) || trim($_SESSION['level']) == '' || $_SESSION['level'] != 'Admin' || !isset($_SESSION['id_admin'])){
	session_destroy();
	echo
	"
	<script type='text/javascript'>
		alert('Silahkan lakukan login terlebih dulu');
		window.location='login.php';
	</script>
	";
}

$result = mysqli_query($conc, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id_admin']."'");

?>