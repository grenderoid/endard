<?php
    include "connect/conc.php";
    date_default_timezone_set('Asia/Jakarta');

    $curr_date = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>reset</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.reset-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.reset-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.reset-form h2 {
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
<?php

$token=$_GET['t'];
$reset=mysqli_query($conc,"SELECT * FROM user_iklan WHERE token='".$token."'");
$jml_data=mysqli_num_rows($reset);
if ($jml_data>0) {
    while($user_data = mysqli_fetch_array($reset)) {
        $expdate = $user_data['expdate'];
    }
    if($expdate >= $curr_date){
?>
        <div class="reset-form">
            <form action="" method="post">
                <h2 class="text-center">Reset Password</h2>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="reset" class="btn btn-danger btn-block">Reset</button>
                </div>     
            </form>
        </div>
<?php
    } else {
        echo 
        '<div class="alert alert-warning">
        Token sudah kadaluwarsa, silahkan membuat token yang baru!
        </div>';
    }
} else {
    echo 
    '<div class="alert alert-warning">
        Invalid Token!
    </div>';
}


if(isset($_POST['reset'])){

  $password = $_POST['password'];

  $query = mysqli_query($conc,"UPDATE user_iklan SET password='$password', token='', expdate='' WHERE expdate='$expdate' and token='$token'");
  if ($query){
        echo
        "
        <script type='text/javascript'>
            alert('Ubah data berhasil');
            window.location='user/login.php';
        </script>
        ";
    }
    else {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal mengubah data');
                window.location='index.php';
            </script>
        ";
    }
}

?>

</body>
</html>