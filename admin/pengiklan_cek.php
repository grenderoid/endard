<?php
include 'connect/sesi.php';

$id_pengiklan  = $_GET['id_pengiklan'];
$_SESSION['id_pengiklan'] = $id_pengiklan;

header("location:pengiklan_iklan.php");

?>