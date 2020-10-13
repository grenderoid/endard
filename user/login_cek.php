<?php 
	session_start();

	include 'connect/conc.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$que = mysqli_query($conc,"SELECT *FROM user_iklan WHERE username='$username' and password='$password'");
	$aktivasi = mysqli_query($conc,"SELECT *FROM user_iklan WHERE username='$username' and password='$password' and aktif='1'");

	$cek = mysqli_num_rows($que);
	$verif = mysqli_num_rows($aktivasi);

	if ($cek > 0) {
		if ($verif > 0) {
			$_SESSION['username'] = $username;
			$user_data=mysqli_fetch_array($que);
			$_SESSION['id_pengiklan'] = $user_data['id_pengiklan'];
			$_SESSION['level'] = $user_data['level'];
			header("location:index.php");
		} else {
			echo
			"
		    <script type='text/javascript'>
	            alert('Silahkan cek email untuk aktivasi akun!');
	            window.location='login.php';
		    </script>
		    ";
		}
	} else {
		echo
		"
	    <script type='text/javascript'>
            alert('Username atau password yang anda gunakan salah.');
	        window.location='login.php';
	    </script>
	    ";
	}
?>