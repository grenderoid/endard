<?php
include 'connect/conc.php';

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Header -->
        <?php include 'header.php'; ?>
    </head>
    <body id="page-top">
        <!-- Nav -->
        <?php include 'navigator.php'; ?>
        <!-- Head -->
        <?php include 'masthead.php'; ?>
        <!-- About -->
        <?php include 'aboutus.php'; ?>
        <!-- Produk -->
        <?php include 'produk.php'; ?>
        <!-- Daftar -->
        <section class="signup-section" id="daftar">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-edit fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Daftar Sekarang</h2>
                        <form class="form-inline d-flex" method="POST" action="guest/daftar_proses.php">
                            <div class="form-group col-sm-6">
                                <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="username" name="username" type="text" placeholder="Username" minlength="6" maxlength="25" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="password" name="password" type="password" placeholder="Password" minlength="6" maxlength="25" required />
                            </div>
                            <div class="form-group col-sm-12">
                                <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="email" name="email" type="email" placeholder="Alamat email" required />
                            </div>
                            <div class="form-group col-sm-12">
                                <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="no_hp" name="no_hp" type="number" placeholder="Nomor HP" minlength="5" maxlength="18" required />
                            </div>
                            <div class="form-group col-sm-12">
                                <select class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="provinsi" name="provinsi" required>
                                    <option value="" disabled selected>(Pilih Provinsi)</option>
                                        <?php
                                            $prov = mysqli_query($conc, "SELECT * FROM provinces ORDER BY id");
                                            while($user_data = mysqli_fetch_array($prov)) {      
                                            echo '<option value="'.$user_data['id'].'">'.$user_data['prov_name'].'</option>';
                                            }
                                        ?>
                                    <option value="000">Lainnya (jika pilihan belum ada)</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <select class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="kota" name="kota" required>
                                    <option value="" disabled selected>(Pilih Kabupaten/Kota)</option>
                                </select>
                            </div>
                                <div class="form-group col-sm-12">
                                    <select class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-2" id="kec" name="kec" required>
                                        <option value="" disabled selected>(Pilih Kecamatan)</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary mx-auto" type="submit" name="daftar">Daftar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Kontak -->
        <?php include 'kontak.php'; ?>
        <!-- Footer -->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © <a href="https://borobudurnews.com/" style="color: #72767a" target="_blank">Borobudurnews.com</a> 2020</div></footer>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        
        <script src="js/scripts.js"></script>

        <!----<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <a href="user/login.php" class="float" data-toggle="popover" data-trigger="hover" title="Login" data-content="Silahkan masuk!">
			<i class="fas fa-sign-in-alt fa-2x my-float"></i>
		</a>
		<script src="js/popover.js"></script>---->
    </body>
</html>
