<section class="projects-section bg-light" id="produk">
    <div class="container">
        <!-- Slider -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-lg-12">
                <div id="demo" class="carousel slide" data-ride="carousel">
				  	<ul class="carousel-indicators">
                        <?php
                            $slide = mysqli_query($conc, "SELECT * FROM gambar_slide WHERE level='Home'");        
                            
                            $JumlahData = mysqli_num_rows($slide);

                            if ($JumlahData != 0){
                                for ($x = 0; $x < $JumlahData; $x++) {
                                    if ($x != 0) {
                                        echo "<li data-target='#demo' data-slide-to=".$x."></li>";
                                    } elseif ($x == 0) {
                                        echo "<li data-target='#demo' data-slide-to=".$x." class='active'></li>";
                                    }
                                }
                            }
                        ?>
				  	</ul>
				    <div class="carousel-inner">
                        <div class="text-center">

                            <?php
                                $no = 0;
                                while($user_data = mysqli_fetch_array($slide)) {
                                    $no++;
                        
                                    if ($no != 1) {
                                        echo "<div class='carousel-item'>";
                                        echo "<img class='img-fluid' src='admin/gambar_slide/".$user_data['gambar']."' alt='".$user_data['gambar']."' >";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='carousel-item active'>";
                                        echo "<img class='img-fluid' src='admin/gambar_slide/".$user_data['gambar']."' alt='".$user_data['gambar']."' >";
                                        echo "</div>";
                                    }
                                
                                }
                            ?>
                        </div>
				  	</div>
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
				    	<span class="carousel-control-prev-icon"></span>
				  	</a>
				  	<a class="carousel-control-next" href="#demo" data-slide="next">
				    	<span class="carousel-control-next-icon"></span>
				  	</a>
				</div>
			</div>
        </div><br />
        <!-- List Card -->
        <div id="paket">
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <?php
                    $result = mysqli_query($conc, "SELECT * FROM iklan ORDER BY nama_paket");
                    while($user_data = mysqli_fetch_array($result)) {       
                ?>
			    <div class="col-lg-3 col-md-5 mb-3" style="margin:2%">
			      	<div class="card">
			        	<div class="card-body text-center">
                            <?php
                                echo "<h4 class='card-title'><b>".$user_data['nama_paket']."</b></h4>";
				          		echo "<hr />";
                                echo "<p class='card-text'>".$user_data['letak_tayang']."</p>";
                                echo "<p class='card-text'>Durasi : ".$user_data['durasi_tayang']."</p>";
                                echo "<h5 class='card-text' style='color: blue'>".rupiah($user_data['harga'])."</h5>"; 
                                echo "<br/>";
				          		echo "<a href='user/buat_iklan.php' class='btn btn-light btn-sm' type='button'><b>Pasang sekarang</b></a>";
				          	?>
				        </div>
				    </div>
				</div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>