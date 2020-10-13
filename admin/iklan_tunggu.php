<?php
include 'connect/sesi.php';

unset($_SESSION['id_pengiklan']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iklan Tunggu</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">ADMIN </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="gambar.php" class="list-group-item list-group-item-action bg-light">Gambar Slide</a>
        <a href="iklan.php" class="list-group-item list-group-item-action bg-light">Paket Iklan
          <span class="badge badge-default badge-pill"><?php
            $result = mysqli_query($conc, "SELECT * FROM iklan");
            $JumlahData = mysqli_num_rows($result);
            echo $JumlahData;
            ?>
          </span>
        </a>
        <a href="iklan_masuk.php" class="list-group-item list-group-item-action bg-light">Iklan Masuk
          <span class="badge badge-default badge-pill"><?php
            $result = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE transaksi.status='Baru'");
            $JumlahData = mysqli_num_rows($result);
            echo $JumlahData;
            ?>
          </span>
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Iklan Tunggu
          <span class="badge badge-default badge-pill"><?php
            $result = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE transaksi.status='Sudah Bayar' ORDER BY waktu_bayar asc");
            $JumlahData = mysqli_num_rows($result);
            echo $JumlahData;
            ?>
          </span>
        </a>
        <a href="iklan_selesai.php" class="list-group-item list-group-item-action bg-light">Iklan Selesai
          <span class="badge badge-default badge-pill"><?php
            $result = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE transaksi.status='Selesai' ORDER BY tanggal_tayang desc");
            $JumlahData = mysqli_num_rows($result);
            echo $JumlahData;
            ?>
          </span>
        </a>
        <a href="pengiklan.php" class="list-group-item list-group-item-action bg-light">Pengiklan
          <span class="badge badge-default badge-pill"><?php
            $result = mysqli_query($conc, "SELECT * FROM user_iklan INNER JOIN provinces ON user_iklan.provinsi=provinces.id INNER JOIN regencies ON user_iklan.kota=regencies.id INNER JOIN districts ON user_iklan.kecamatan=districts.id WHERE aktif = '1' ORDER BY username asc");
            $JumlahData = mysqli_num_rows($result);
            echo $JumlahData;
            ?>
          </span>
        </a>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-success" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Website</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i>
                <?php echo $_SESSION['username']; ?>
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
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Iklan Tunggu</h1>
        
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th width="12%">Username</th>
                <th width="12%">Paket</th>
                <th width="15%">Judul Iklan</th>
                <th width="8%">Gambar</th> 
                <th width="12%">Status</th>
                <th width="20%">Waktu Bayar</th>
                <th width="8%">Bukti Bayar</th> 
                <th width="13%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
              <?php
    
                $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
                $limit = 8;
                $limitStart = ($page - 1) * $limit;
                $result1 = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE transaksi.status='Sudah Bayar' ORDER BY waktu_bayar asc LIMIT ".$limitStart.",".$limit);
                $no = $limitStart + 1;

                while($user_data = mysqli_fetch_array($result1)) {       

                  $no++;
              ?>
                  <tr>
                    <td><?php echo $user_data['username'] ?></td>
                    <td><?php echo $user_data['nama_paket'] ?></td>
                    <td><?php echo $user_data['nama_iklan'] ?></td>
                    <td>
                      <a href="../user/gambar_iklan/<?php echo $user_data['file_gambar']?>" class="btn btn-info btn-sm" type="button" alt="gambar" target="_blank"><i class="fa fa-picture-o fa-sm"></i></a>
                    </td>
                    <td><?php echo $user_data['status'] ?></td>
                    <td><?php echo date("G:i:s d-F-Y",strtotime($user_data['waktu_bayar'])) ?></td>
                    <td>
                      <a href="../user/bukti_bayar/<?php echo $user_data['bukti_bayar'] ?>" class="btn btn-info btn-sm" type="button" alt="bukti_bayar" target="_blank"><i class="fa fa-picture-o fa-sm"></i></a>
                    </td>
                    <td>
                      <a href="#"" class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#ubahstatus<?php echo $user_data['id_transaksi'] ?>">Update Status</a>
                    </td>
                  </tr>        

                <?php
                  include 'ubah_status.php';       
                }
              ?>
            </tbody>
          </table>
        </div>

        <nav>
          <div class="d-flex justify-content-center">
            <ul class="pagination">
              <?php
                $result = mysqli_query($conc, "SELECT * FROM transaksi INNER JOIN user_iklan ON transaksi.id_pengiklan=user_iklan.id_pengiklan INNER JOIN tayang_iklan ON transaksi.id_tayang=tayang_iklan.id_tayang INNER JOIN iklan ON transaksi.id_iklan=iklan.id_iklan WHERE transaksi.status='Sudah Bayar' ORDER BY waktu_bayar asc");
                $JumlahData = mysqli_num_rows($result);
                $jumlahPage = ceil($JumlahData / $limit);
                $jumlahNumber = 1;
                $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1;
                $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 

                if ($JumlahData == 0) {
              ?>
                  <div class="col-lg-8 mx-auto">
                    <h4 class="text-black mb-4">KOSONG</h4>
                  </div>
              <?php
                } else {
              ?>
                  <li class="page-item">
                
                <?php
                  if ($page != 1) { 
                    $LinkPrev = (($page > 1) || ($JumlahData == 0))? $page - 1 : 1;
                ?>
                    <span class="page-link"><a href="iklan_tunggu.php?page=<?php echo $LinkPrev; ?>"><i class="fa fa-angle-double-left"></i></a></span>
                <?php
                  }
                ?>
                  </li>

              <?php              
                for ($i = $startNumber; $i <= $endNumber; $i++) {
                  $linkActive = ($page == $i)? ' class="page-item active"' : '';
              ?>
                  <li <?php echo $linkActive; ?>><a class="page-link" href="iklan_tunggu.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
                }
              ?>

                <li class="page-item">
              <?php       
                if ($page != $jumlahPage) { 
                  $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
                ?>
                  <li class="page-link"><a href="iklan_tunggu.php?page=<?php echo $linkNext; ?>"><i class="fa fa-angle-double-right"></i></a></li>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
