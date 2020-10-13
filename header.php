<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Borobudur News - Iklan</title>
    <link rel="icon" type="image/x-icon" href="https://i1.wp.com/borobudurnews.com/wp-content/uploads/2019/05/cropped-borobudur-transparancy-background-1.jpg?fit=32%2C32&ssl=1" />

    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        
    <link href="css/styles.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#provinsi').on('change', function(){
                var id_provinsi = $(this).val();
                var post_id = 'id_provinsi='+id_provinsi;

                $.ajax({
                    type: "POST",
                    url: "ajaxKota.php",
                    data: post_id,
                    cache: false,
                    success: function(kota){
                        $("#kota").html(kota);
                    }
                });
            });

            $('#kota').on('change', function(){
                var id_kota = $(this).val();
                var post_id = 'id_kota='+id_kota;

                $.ajax({
                    type: "POST",
                    url: "ajaxKec.php",
                    data: post_id,
                    cache: false,
                    success: function(kec){
                        $("#kec").html(kec);
                    }
                });
            });
        });
    </script>