<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Tamu</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "> <img src="./assets/img/logos.jpeg" width="500"
                            height="500" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Kehadiran Tamu</h1>
                                    </div>
                                    <form class="user" id="storeTamu">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="instansi" placeholder="Masukkan Nama Instansi..." autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan Nama Lengkap...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="tema" placeholder="Masukkan Tema">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                            </div>
                                        </div>
                                        <!-- input hidden tanggal sekarang -->
                                        <input type="hidden" name="tanggal" value="">
                                        <input type="hidden" name="status" value="invalid">

                                        <!-- <a  class="btn btn-primary btn-user btn-block">
                                            
                                        </a> -->
                                        <button type="submit" class="btn btn-danger btn-user btn-block" id="storeTamu">
                                            Daftar
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <?php include_once('./templates/js/js.php'); ?>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        //tambah data
        $('#storeTamu').submit(function(e) {
            e.preventDefault();
            console.log($(this).serialize());
            $.ajax({
                type: 'POST',
                url: "./controllers/store.php",
                data: $(this).serialize(),
            }).then(function(response) {
                console.log(response);
                var jsonData = JSON.parse(response);
                console.log(jsonData);
                if (jsonData.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: jsonData.message,
                    }).then(function() {
                        window.location.href = "index.php";
                    })
                } else if (jsonData.status == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: jsonData.message,
                    })
                } else {
                    Swal.fire(
                        'Invalid Credentials!',
                    )
                }
            });
        });
    });
</script>