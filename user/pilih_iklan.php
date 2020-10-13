<?php
include 'connect/sesi.php';

if(!isset($_SESSION['waktu'])){
  echo
  "
  <script type='text/javascript'>
    alert('Buat tayangan iklan!');
    window.location='buat_iklan.php';
  </script>
  ";
}

$id_pengiklan = $_SESSION['id_pengiklan'];
$waktu = $_SESSION['waktu'];

if (isset($_POST['transaksi'])) {

  $id_iklan = $_POST['id_iklan'];
  $id_tayang = $_POST['id_tayang'];

  $myque = mysqli_query($conc,"INSERT INTO transaksi (id_iklan,id_pengiklan,id_tayang) VALUES ('$id_iklan','$id_pengiklan','$id_tayang')");
  if ($myque) {
    unset($_SESSION['waktu']);
        echo
        "
        <script type='text/javascript'>
          alert('Data iklan berhasil dibuat');
           window.location='index.php';
        </script>
        ";
    } else {
        echo
        "
        <script type='text/javascript'>
          alert('Gagal membuat data');
          window.location='pilih_iklan.php';
        </script>
        ";
    }
}

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}

$result = mysqli_query($conc,"SELECT * FROM iklan ORDER BY nama_paket");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Buat iklan (2/2)</title>

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
          <h2>Pilih Paket</h2>
          <?php 
            $hasil = mysqli_query($conc, "SELECT * FROM tayang_iklan WHERE (id_pengiklan='$id_pengiklan' AND waktu_buat='$waktu')");
            while($data = mysqli_fetch_assoc($hasil) ){
              $id_tayang = $data['id_tayang'];
              $nama_iklan = $data['nama_iklan'];
              $tautan = $data['tautan_iklan'];
              $gambar = $data['file_gambar'];
            }
          ?>
          <hr/>

            <div class="row">
              <div class="col-sm-6 mx-auto"><label><b>Nama Transaksi :</b></label>
                <p><?php echo $nama_iklan ?></p>
              </div>
              <div class="col-sm-6 mx-auto"><label><b>Tautan :</b></label>
                <p><?php echo $tautan ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mx-auto"><label><b>Gambar :</b></label>
                <img class="img-fluid" src="gambar_iklan/<?php echo $gambar ?>" alt="" width="400" height="400"></div>
            </div>
          
          <hr/>
          <form method="post" action="" class="needs-validation">
            <input type="hidden" name="id_tayang" value="<?php echo $id_tayang?>">  
            <div class="form-group">
              <label for="id_iklan">Pilih Paket :</label>
            <select class="form-control" name="id_iklan" id="id_iklan" required>
            <?php while($user_data = mysqli_fetch_assoc($result) ){?>
              <option value="<?php echo $user_data['id_iklan']; ?>"><?php echo $user_data['nama_paket']; ?> - <?php echo rupiah($user_data['harga']) ?></option>
            <?php } ?>
            </select>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          <button type="submit" name="transaksi" class="btn btn-primary float-right">Selesai</button>
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
            <p><a href="https://goo.gl/maps/ZRJmv3bErEfKwaC79" style="color:black" target="_blank"><i class="fa fa-map-marker"></i>&nbsp; Alamat : Jl. Soekarno-Hatta No. 70 Kota Mungkid<br/>Kabupaten Magelang, Jawa Tengah</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; <a href="https://borobudurnews.com/" style="color: white" target="_blank">Borobudurnews.com</a> 2020</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/scrolling-nav.js"></script>

</body>

</html>