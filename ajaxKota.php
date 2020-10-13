<?php 
include 'connect/conc.php'; 
 
if(isset($_POST['id_provinsi'])){
	$id = $_POST['id_provinsi'];
	if($id==0){
	echo '<option value="" disabled selected>(Pilih Kabupaten/Kota)</option>';
	echo '<option value="000">(Lainnya)</option>';
	}else{
		$kota = mysqli_query($conc,"SELECT * FROM `regencies` WHERE province_id='$id'");
		while($user_data = mysqli_fetch_array($kota)){
 			echo '<option value="'.$user_data['id'].'">'.$user_data['reg_name'].'</option>';
 		}
 		echo '<option value="000">Lainnya (jika pilihan belum ada)</option>';
	}
}

?>
