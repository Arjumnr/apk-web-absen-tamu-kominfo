<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                            <div class="col-lg-6 d-none d-lg-block "> <img src="./assets/img/logos.jpeg" width="500" height="500" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" id="login" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <input type="checkbox" class="custom-control-input" id="customCheck"> -->
                                                <!-- <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label> -->
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-user btn-block" id="loginAdmin">
                                            Login
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

    <?php require_once './templates/js/js.php'; ?>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#login').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "./controllers/login.php",
                data: $(this).serialize(),

            }).then(function(response) {
                var jsonData = JSON.parse(response);

                if (jsonData.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Success',
                        text: jsonData.message,
                    }).then(function() {
                        window.location.href = "./dashboard";
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