<?php

if (isset($_POST['ubah_iklan'])) {

  $id_iklan = $_POST['id_iklan'];
  $nama_paket = $_POST['nama_paket'];
  $letak_tayang = $_POST['letak_tayang'];
  $durasi_tayang = $_POST['durasi_tayang'];
  $harga = $_POST['harga'];

  $que = mysqli_query($conc,"UPDATE iklan SET nama_paket='$nama_paket', letak_tayang='$letak_tayang', durasi_tayang='$durasi_tayang', harga ='$harga' WHERE id_iklan='$id_iklan'");
  if ($que) {
    echo
    "
    <script type='text/javascript'>
      alert('Ubah data berhasil');
      window.location='iklan.php';
    </script>
    ";
  } else {
    echo
    "
    <script type='text/javascript'>
      alert('Gagal mengubah data');
      window.location='iklan.php';
    </script>
    ";
  }
}

?>


<div class="modal fade" id="ubahiklan<?php echo $user_data['id_iklan']; ?>" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Paket Iklan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="" class="needs-validation">
          <input type="hidden" name="id_iklan" value="<?php echo $user_data['id_iklan']; ?>">
          <div class="form-group">
            <label for="nama_paket">Nama Paket :</label>
            <input type="text" class="form-control" id="nama_paket" value="<?php echo $user_data['nama_paket']; ?>" name="nama_paket" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="letak_tayang">Jumlah Tayang :</label>
            <input type="text" class="form-control" id="letak_tayang" value="<?php echo $user_data['letak_tayang']; ?>" name="letak_tayang" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="durasi_tayang">Durasi Tayang :</label>
            <input type="text" class="form-control" id="durasi_tayang" value="<?php echo $user_data['durasi_tayang']; ?>" name="durasi_tayang" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="harga">Harga :</label>
            <input type="text" class="form-control" id="harga" value="<?php echo $user_data['harga']; ?>" name="harga" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" name="ubah_iklan" class="btn btn-primary">Ubah</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
      
  </div>
</div>