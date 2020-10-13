<?php

if (isset($_POST['tambah_iklan'])) {

  $nama_paket = $_POST['nama_paket'];
  $letak_tayang = $_POST['letak_tayang'];
  $durasi_tayang = $_POST['durasi_tayang'];
  $harga = $_POST['harga'];

  $que = mysqli_query($conc,"INSERT INTO iklan (nama_paket,letak_tayang,durasi_tayang,harga) VALUES ('$nama_paket','$letak_tayang','$durasi_tayang','$harga')");
  if ($que) {
    echo
    "
    <script type='text/javascript'>
        alert('Pembuatan data iklan berhasil');
        window.location='iklan.php';
    </script>
    ";
  } else {
    echo
    "
    <script type='text/javascript'>
      alert('Gagal membuat data');
      window.location='iklan.php';
    </script>
    ";
  }
}

?>


<div class="modal fade" id="tambahiklan" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Paket Iklan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="" class="needs-validation">
          <div class="form-group">
            <label for="nama_paket">Nama Paket :</label>
            <input type="text" class="form-control" id="nama_paket" placeholder="Enter nama paket" name="nama_paket" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="letak_tayang">Jumlah Tayang :</label>
            <input type="text" class="form-control" id="letak_tayang" placeholder="Enter jumlah" name="letak_tayang" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="durasi_tayang">Durasi Tayang :</label>
            <input type="text" class="form-control" id="durasi_tayang" placeholder="Enter durasi" name="durasi_tayang" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="harga">Harga :</label>
            <input type="text" class="form-control" id="harga" placeholder="Enter harga" name="harga" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" name="tambah_iklan" class="btn btn-primary">Tambah</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
      
  </div>
</div>