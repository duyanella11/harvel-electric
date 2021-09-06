<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login Admin - Harvel Electric</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.jpg" rel="icon">
    <link href="../assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="login-form">
        <div class="container">
            <div class="headerLog">
                <h1>ADMIN LOGIN</h1>
            </div>
            <form action="checklogin.php" id="formLogin" method="POST">
                <div class="mb-2 row">
                    <label for="inputUsername" class="col-sm-3 col-form-label" style="font-size:x-large">Username</label>
                    <div id="inputField" class="col-sm-10" style="display: flex;">
                        <img src="../assets/img/user.png" width="35px" height="35px">
                        <input type="text" class="form-control" id="name" name="name" width="1000px">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size:x-large">Password</label>
                    <div id="inputField" class="col-sm-10" style="display: flex;">
                        <img src="../assets/img/password.png" width="35px" height="35px">
                        <input type="password" class="form-control" id="password" name="pass">
                    </div>
                </div>

                <?php
                if (@$_GET['Empty'] == true) {
                ?>
                    <div class="alert alert-danger text-center py-2 mx-3" role="alert" style="background-color: rgba(0, 0, 0, 0); border:none; width: 40%; position:relative; left:35%">
                        <h3 style="font-size:1.25rem ">Please Fill in The Blanks!!</h3>
                    </div>

                <?php
                }
                ?>

                <?php
                if (@$_GET['Invalid'] == true) {
                ?>
                    <div class="alert alert-danger text-center py-2 mx-3" role="alert" style="background-color: rgba(0, 0, 0, 0); border:none; width: 40%; position:relative; left:35%">
                        <h3 style="font-size:1.25rem ">Please Enter Correct Username and Password!!</h3>
                    </div>
                <?php
                }
                ?>

                <button class="btn btn-primary" name="btnLogin" id="btnLogin">Login</button>
            </form>
        </div>
    </div>
    <script src="js /jquery-3.6.0.js"></script>
    <script src="js /bootstrap.js"></script>
</body>

</html>