<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.actv-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.actv-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.actv-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="actv-form">
    <?php
        include "connect/conc.php";
        $token=$_GET['t'];
        $aktivasi=mysqli_query($conc,"SELECT * FROM user_iklan WHERE token='".$token."' and aktif='0'");
        $jml_data=mysqli_num_rows($aktivasi);
        if ($jml_data>0) {
            mysqli_query($conc,"UPDATE user_iklan SET aktif='1', token='' WHERE token='".$token."' and aktif='0'");
            echo 
            "
            <script type='text/javascript'>
                alert('Akun anda telah aktif.');
                window.location='user/login.php';
            </script>
            ";

        }else{
            echo 
            "
            <script type='text/javascript'>
                alert('Gagal aktivasi.');
                window.location='user/login.php';
            </script>
            ";
        }
    ?>
</div>
</body>
</html>