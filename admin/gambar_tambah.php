<?php

date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['tambah_gambar'])) {

  $level = $_POST['level'];
  $temp = $_FILES['gambar']['tmp_name'];
  $name = rand(0,9999).$_FILES['gambar']['name'];
  $size = $_FILES['gambar']['size'];
  $type = $_FILES['gambar']['type'];
  $folder = "gambar_slide/";
  list($width,$height) = getimagesize($temp);
  $waktu = date("Y-m-d");

  if ($size < 4096000 and ($type =='image/jpeg' or $type == 'image/png')) {
    if ($width == 1100 and $height == 400) {
      move_uploaded_file($temp, $folder . $name);
      $que = mysqli_query($conc,"INSERT INTO gambar_slide (level,gambar,waktu) VALUES ('$level','$name','$waktu')");
      if ($que) {
        echo
        "
        <script type='text/javascript'>
            alert('Penambahan gambar berhasil'); 
            window.location='gambar.php';
        </script>
        ";
      } else {
        echo
        "
        <script type='text/javascript'>
          alert('Gagal menambah');
          window.location='gambar.php';
        </script>
        ";
      }
    } else {
      echo
      "
      <script type='text/javascript'>
        alert('Ukuran gambah bukan 1100x400');
        window.location='gambar.php';
      </script>
      ";
      }
  } else {
    echo
    "
    <script type='text/javascript'>
      alert('Tipe gambar salah atau ukuran gambar melebihi 4MB');
      window.location='gambar.php';
    </script>
    ";
  }
}

?>


<div class="modal fade" id="tambahgambar" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Paket Iklan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="" class="needs-validation">
          <div class="form-group">
            <label for="id_iklan">Tempat tayang :</label>
            <select class="form-control" name="level" id="level" required="">
              <option value="Home">Home</option>
              <option value="Pengguna">Pengguna</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar :</label>
            <div class="col-sm-9">
              <input type="file" id="gambar" name="gambar" required>
            </div>
            <p style="color: grey">(Tinggi 400px, lebar 1100px)</p>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" name="tambah_gambar" class="btn btn-primary">Tambah</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
      
  </div>
</div>
