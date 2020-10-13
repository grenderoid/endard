<?php
include 'connect/conc.php';
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['reset'])) {

	$username = $_POST['username'];
    $email = $_POST['email'];
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expdate = date("Y-m-d H:i:s",$expFormat);

    $curr_date = date('Y-m-d H:i:s');
    $token=hash('sha256', md5(rand(0,100000)+strtotime(date('curr_date')))) ;

    $query = mysqli_query($conc,"SELECT *FROM user_iklan WHERE email='$email' and username='$username'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        $que = mysqli_query($conc,"UPDATE user_iklan SET token='$token', expdate='$expdate' WHERE email='$email'");  
        if ($que) {
            include("../mail/mail_reset.php");
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
                alert('Terjadi kesalahan');
                window.location='../index.php';
            </script>
            ";
        }
    } else {
        echo
        "
        <script type='text/javascript'>
            alert('Data tidak ada di sistem');
            window.location='../index.php';
        </script>
        ";
    }
}

?>