<?php
session_start();

include 'conc.php';

if(!isset($_SESSION['level']) || trim($_SESSION['level']) == '' || $_SESSION['level'] != 'pengiklan' || !isset($_SESSION['id_pengiklan'])){
	session_destroy();
	echo
	"
	<script type='text/javascript'>
		alert('Silahkan lakukan login terlebih dulu');
		window.location='login.php';
	</script>
	";
}

$result = mysqli_query($conc, "SELECT * FROM user_iklan WHERE id_pengiklan = '".$_SESSION['id_pengiklan']."'");

?>