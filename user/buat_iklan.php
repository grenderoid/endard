<?php
include 'connect/sesi.php';

date_default_timezone_set('Asia/Jakarta');
$id_pengiklan = $_SESSION['id_pengiklan'];

if (isset($_POST['transaksi'])) {

	date_default_timezone_set('Asia/Jakarta');
	$nama_iklan = $_POST['judul'];
	$tautan = $_POST['tautan'];
	$waktu = date("Y-m-d H:i:s");
	$temp = $_FILES['gambar']['tmp_name'];
  $name = $_SESSION['username'].'-'.rand(0,9999).$_FILES['gambar']['name'];
  $size = $_FILES['gambar']['size'];
  $type = $_FILES['gambar']['type'];
  $folder = "gambar_iklan/";
	if ($size < 4096000 and ($type =='image/jpeg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
		$que = mysqli_query($conc,"INSERT INTO tayang_iklan (nama_iklan,tautan_iklan,file_gambar,waktu_buat,id_pengiklan) VALUES ('$nama_iklan','$tautan','$name','$waktu','$id_pengiklan')");
		if ($que) {
			$_SESSION['waktu'] = $waktu;
			echo
  		"
  		<script type='text/javascript'>
  			alert('Lanjut pemilihan tipe iklan');
				window.location='pilih_iklan.php';
  		</script>
  		";
		} else {
			echo
  		"
  		<script type='text/javascript'>
  			alert('Maaf terjadi kesalahan');
				window.location='buat_iklan.php';
  		</script>
  		";
		}
  } else {
    echo
		"
		<script type='text/javascript'>
			alert('Tipe gambar salah atau ukuran gambar melebihi 4MB');
			window.location='buat_iklan.php';
		</script>
		";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Buat iklan (1/2)</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><span style="color: red">B</span>News Iklan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
              <?php
                  echo $_SESSION['username'];
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Lihat</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section>
    <div class="container align-items-center">
      <div class="row">
        <div class="col-sm-6 mx-auto">
          
        	<h2>Buat Transaksi</h2>
        	<hr/>
		        <form method="post" enctype="multipart/form-data" action="" class="needs-validation">
              <div class="form-group">
                <label for="judul">Judul :</label>
                <input type="text" class="form-control" id="judul" placeholder="Enter judul" name="judul" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <label for="tautan">Tautan Iklan :</label>
                <input type="text" class="form-control" id="tautan" placeholder="Enter tautan" name="tautan" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <label for="gambar">Gambar :</label>
                <div class="col-sm-9">
                  <input type="file" id="gambar" name="gambar" required>
                </div>
              </div>
              <button type="submit" name="transaksi" class="btn btn-primary float-right">Lanjut</button>
            </form>

        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <div class="tentang" id="tentang">
            <h2>Tentang Kami</h2>
            <hr>
            <p><a style="color:firebrick" href="https://borobudurnews.com" target="_blank">Borobudurnews.com</a> merupakan media online dengan jumlah pembaca terbesar di wilayah Magelang dan eks Karisidenan Kedu.
            Berdiri sejak 2017, borobudurnews menjadi ruang untuk memperoleh informasi tercepat dan terakurat.</p>
          </div>
        </div>
        <div class="col-sm-5" style="padding-left:4%">
          <div class="kontak" id="kontak" style="padding-left:5%">
            <h2>Kontak</h2>
            <hr>
            <p><a href="https://mail.google.com/mail/?view=cm&fs=1&to=borobudurnews@gmail.com" style="color:black" target="_blank"><i class="fa fa-envelope"></i> Email : borobudurnews@gmail.com</a></p>
            <p><a style="color:black"><i class="fa fa fa-phone"></i> Telepon / WA : 0813-2751-5396</a></p>
            <p><a href="https://goo.gl/maps/ZRJmv3bErEfKwaC79" style="color:black" target="_blank" target="_blank"><i class="fa fa-map-marker"></i>&nbsp; Alamat : Jl. Soekarno-Hatta No. 70 Kota Mungkid<br/>Kabupaten Magelang, Jawa Tengah</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white" >Copyright &copy; <a href="https://borobudurnews.com/" style="color: white" target="_blank">Borobudurnews.com</a> 2020</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/scrolling-nav.js"></script>

</body>

</html>