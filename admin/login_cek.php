<?php 
	session_start();

	include 'connect/conc.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$que = mysqli_query($conc,"SELECT *FROM admin WHERE username='$username' and password='$password'"); 

	$cek = mysqli_num_rows($que);
	
	if($cek > 0){
		$_SESSION['username'] = $username;
		$user_data=mysqli_fetch_array($que);
		$_SESSION['id_admin'] = $user_data['id_admin'];
		$_SESSION['level'] = $user_data['level'];
		header("location:index.php");
	}else{
		echo
		"
		<script type='text/javascript'>
	        alert('Username atau password yang anda gunakan salah.');
	        window.location='login.php';
	    </script>
	    ";
	}
?>