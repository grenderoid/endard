<?php

  if (isset($_POST['status_ubah'])) {

    $id_transaksi = $_POST['id_transaksi'];
    $tanggal_tayang = $_POST['waktutayang'];

    $que = mysqli_query($conc,"UPDATE transaksi SET status='Selesai', tanggal_tayang='$tanggal_tayang' WHERE id_transaksi='$id_transaksi'");  
    if ($que) {
      echo
      "
      <script type='text/javascript'>
        alert('Status telah diupdate');
        window.location='iklan_selesai.php';
      </script>
      ";
    } else {
      echo
      "
      <script type='text/javascript'>
        alert('Gagal update');
        window.location='iklan_tunggu.php';
      </script>
      ";
    }
  }

?>


<div class="modal fade" id="ubahstatus<?php echo $user_data['id_transaksi']; ?>" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <input type="hidden" name="id_transaksi" value="<?php echo $user_data['id_transaksi']; ?>">
            <p>Anda ingin mengubah status iklan ini?</p>
            <label for="waktutayang">Masukkan tanggal:</label>
            <input type="date" id="waktutayang" name="waktutayang" min="2010-01-02"><br>
      </div>
      <div class="modal-footer">
          <button type="submit" name="status_ubah" class="btn btn-primary">Ya</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
      
  </div>
</div>