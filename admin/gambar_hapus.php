<?php

if (isset($_POST['hapus_gambar'])) {

  $id = $_POST['id'];
  
  $que = mysqli_query($conc,"DELETE FROM gambar_slide WHERE id = '$id'");  
  if ($que) {
    echo
    "
    <script type='text/javascript'>
      alert('Gambar telah dihapus');
      window.location='gambar.php';
    </script>
    ";
  } else {
    echo
    "
    <script type='text/javascript'>
      alert('Gambar gagal dihapus');
      window.location='gambar.php';
    </script>
    ";
  }
}

?>


<div class="modal fade" id="hapusgambar<?php echo $user_data['id']; ?>" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Gambar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
            <p>Anda ingin menghapus gambar ini?</p>
      </div>
      <div class="modal-footer">
          <button type="submit" name="hapus_gambar" class="btn btn-primary">Ya</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
      
  </div>
</div>