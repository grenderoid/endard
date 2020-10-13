<?php 
include 'connect/conc.php'; 
 
if(isset($_POST['id_kota'])){
	$id = $_POST['id_kota'];
	if($id==0){
	echo '<option value="" disabled selected>(Pilih Kecamatan)</option>';
	echo '<option value="000">(Lainnya)</option>';
	}else{
		$kec = mysqli_query($conc,"SELECT * FROM `districts` WHERE regency_id='$id'");
		while($user_data = mysqli_fetch_array($kec)){
 			echo '<option value="'.$user_data['id'].'">'.$user_data['dist_name'].'</option>';
 		}
 		echo '<option value="000">Lainnya (jika pilihan belum ada)</option>';
	}
}

?>
