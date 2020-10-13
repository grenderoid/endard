<?php
include 'connect/sesi.php';

$id_pengiklan = $_SESSION['id_pengiklan'];
$result = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE user_iklan.id_pengiklan='$id_pengiklan' ORDER BY id_transaksi");

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Home - <?php echo $_SESSION['username']; ?></title>
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
            <a class="nav-link js-scroll-trigger" href="#buatiklan">Buat Iklan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#iklan">Iklanku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Kontak</a>
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

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Halo, <?php echo $_SESSION['username']; ?>
      </h1>
      <p class="lead">Selamat datang, selamat berbelanja</p>
    </div>
  </header>


  <section id="buatiklan" class="bg-primary text-white">
    <div class="container align-items-center">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2>Buat Iklan Baru</h2>
          
          <a href="buat_iklan.php" class="btn btn-success btn-lg">Buat Iklan</a><br/><br/>
        </div>
      </div>
    </div>
  </section>


  <section id="iklan" class="bg-light">
    <div class="container align-items-center">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <h2 style="text-align:center;">Iklanku</h2>

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th width="8%">Status</th>
                  <th width="12%">Paket</th>
                  <th width="14%">Judul Iklan</th>
                  <th width="14%">Biaya</th>
                  <th width="13%">Tanggal Tayang</th>
                  <th width="16%">Tanggal Buat</th>
                  <th width="16%">Tanggal Bayar</th>
                  <th width="7%">Bayar</th>
                </tr>
              </thead>
              <tbody>

              <?php
    
                $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
                $limit = 5;
                $limitStart = ($page - 1) * $limit;
                $result1 = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE user_iklan.id_pengiklan='$id_pengiklan' ORDER BY id_transaksi DESC LIMIT ".$limitStart.",".$limit);
                $no = $limitStart + 1;

                while($user_data = mysqli_fetch_array($result1)) {    

                  $no++;
              ?>

                  <tr>
                    <td><?php echo $user_data['status'] ?></td>
                    <td><?php echo $user_data['nama_paket'] ?></td>
                    <td><?php echo $user_data['nama_iklan'] ?></td>
                    <td><?php echo rupiah($user_data['harga']) ?></td>
                    <?php $tanggal_tayang = $user_data['tanggal_tayang']; 
                    if($tanggal_tayang == 0) { ?>
                      <td><b>Belum Tayang</b></td>
                    <?php } else { ?>
                      <td><?php echo date("d-F-Y",strtotime($tanggal_tayang)) ?></td>
                    <?php }
                    $waktu_buat = $user_data['waktu_buat'];
                    ?>
                    <td><?php echo date("G:i:s d-F-Y",strtotime($waktu_buat)) ?></td>
                    <?php
                    $waktu_bayar = $user_data['waktu_bayar'];
                    if($waktu_bayar == 0) { ?>
                      <td><b>Belum Bayar</b></td>
                    <?php } else { ?>
                      <td><?php echo date("G:i:s d-F-Y",strtotime($waktu_bayar)) ?></td>
                    <?php } ?>
                    <td>
                      <a href="bayar_iklan.php?id_transaksi=<?php echo $user_data['id_transaksi'] ?>" class="btn btn-info btn-sm" role="button">Konformasi Pembayaran</a>
                    </td>
                  </tr>
              
              <?php
                }
              ?>
    
              </tbody>
            </table>
          </div>

        <nav>
          <div class="d-flex justify-content-center">
            <ul class="pagination">
              <?php
              $JumlahData = mysqli_num_rows($result);
              $jumlahPage = ceil($JumlahData / $limit);
              $jumlahNumber = 1;
              $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1;
              $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 

              if($JumlahData == 0){
                ?>
                  <div class="col-lg-8 mx-auto">
                    <h4 class="text-black mb-4">KOSONG</h4>
                  </div>
                <?php
                } else {
              ?>
              <li class="page-item">
                
                <?php
                  if($page != 1){ 
                    $LinkPrev = ($page > 1)? $page - 1 : 1;
                ?>
                    <span class="page-link"><a href="index.php?page=<?php echo $LinkPrev; ?>#iklan"><i class="fa fa-angle-double-left"></i></a></span>
                <?php
                  }
                ?>
                </li>

              <?php
                for($i = $startNumber; $i <= $endNumber; $i++){
                  $linkActive = ($page == $i)? ' class="page-item active"' : '';
              ?>
                  <li <?php echo $linkActive; ?>><a class="page-link" href="index.php?page=<?php echo $i; ?>#iklan"><?php echo $i; ?></a></li>
              <?php
                }
              ?>

                <li class="page-item">
              <?php       
                if($page != $jumlahPage){
                  $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
              ?>
                  <li class="page-link"><a href="index.php?page=<?php echo $linkNext; ?>#iklan"><i class="fa fa-angle-double-right"></i></a></li>
              <?php
                }
              ?>
                </li>
            <?php
              }
            ?>
              </ul>
            </div>
          </nav>

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
