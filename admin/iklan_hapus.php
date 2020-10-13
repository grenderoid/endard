<?php

if (isset($_POST['hapus_iklan'])) {

  $id_iklan = $_POST['id_iklan'];
    
  $exe = mysqli_query($conc,"UPDATE transaksi SET id_iklan='NULL' WHERE id_iklan='$id_iklan'");

  $que = mysqli_query($conc,"DELETE FROM iklan WHERE id_iklan='$id_iklan'");  
  if ($que) {
    echo
    "
    <script type='text/javascript'>
      alert('Data telah dihapus');
      window.location='iklan.php';
    </script>
    ";
  } else {
    echo
    "
    <script type='text/javascript'>
      alert('Gagal dihapus');
      window.location='iklan.php';
    </script>
    ";
  }
}

?>


<div class="modal fade" id="hapusiklan<?php echo $user_data['id_iklan']; ?>" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Paket Iklan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <input type="hidden" name="id_iklan" value="<?php echo $user_data['id_iklan']; ?>">
            <p>Anda ingin menghapus paket iklan ini?</p>
      </div>
      <div class="modal-footer">
          <button type="submit" name="hapus_iklan" class="btn btn-primary">Ya</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
      
  </div>
</div>