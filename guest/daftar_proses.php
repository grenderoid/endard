<?php
include 'connect/conc.php';

if (isset($_POST['daftar'])) {

	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$no_hp = $_POST['no_hp'];
	$provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kec = $_POST['kec'];

    $curr_date = date('Y-m-d H:i:s');
    $token=hash('sha256', md5(rand(0,100000)+strtotime(date('curr_date')))) ;

    $duplicate = mysqli_query($conc,"SELECT * FROM user_iklan WHERE username='$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "
        <script type='text/javascript'>
            alert('Username telah digunakan.');
            window.location='../index.php#daftar';
        </script>
        ";
    } else {
		$used = mysqli_query($conc,"SELECT * FROM user_iklan WHERE (email='$email' OR no_hp='$no_hp')");
		if (mysqli_num_rows($used) > 0) {
			echo
			"
			<script type='text/javascript'>
				alert('Data telah terdaftar. Silahkan login!');
				window.location='../index.php#daftar';
			</script>
			";
		} else {
			$que = mysqli_query($conc,"INSERT INTO user_iklan (email,username,password,no_hp,provinsi,kota,kecamatan,token) VALUES ('$email','$username','$password','$no_hp','$provinsi','$kota','$kec','$token')");
			if ($que) {
				include("../mail/mail_daftar.php");
				echo
				"
				<script type='text/javascript'>
					alert('Data masuk. Silahkan cek email anda!');
					window.location='../index.php';
				</script>
				";
			} else {
				echo
				"
					<script type='text/javascript'>
						alert('Gagal mendaftar. Terjadi kegagalan.');
						window.location='../index.php';
					</script>
				";
			}
		}
	}
}

?>