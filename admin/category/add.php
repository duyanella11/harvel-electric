<?php
require_once('../../db/dbhelper.php');
session_start();
$id = $name = '';
if (!empty($_POST)) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (!empty($name)) {
        $created_at = $updated_at = date('Y-m-d H:s:i');
        if ($id == '') {
            $sql = 'insert into categories(categories, created_at, updated_at) values ("' . $name . '", "' . $created_at . '", "' . $updated_at . '")';
        } else {
            $sql = 'update categories set categories = "' . $name . '", updated_at = "' . $updated_at . '" where id = ' . $id;
        }

        execute($sql);

        header('Location: index.php');
        die();
    }
}

if (!isset($_SESSION['name'])) {
    header("location:../Login.php");
}
if (isset($_POST['btnLogout'])) {
    session_destroy();
}

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'select * from categories where id = ' . $id;
    $category = executeSingleResult($sql);
    if ($category != null) {
        $name = $category['categories'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-touch-icon.jpg">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin - Harvel Electric
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="dark">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="../index.php" class="simple-text logo-normal">
                    Harvel Electric
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../index.php">
                            <p>Manage Contact</p>
                        </a>
                    </li>
                    <li>
                        <a href="category.php">
                            <p>Manage Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="../product/product.php">
                            <p>Manage Product</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">
                            <h2>Category</h2>
                        </a>
                    </div>
                    <div class="logout">
                        <a href="../logout.php?logout"><button class="btnLogout" style="border: 1.5px #343a40 solid; border-radius: 15vh; padding: 5px; float:right; background-color: #343a40; color: white;">Logout</button></a>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 10vh;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="text-center">Add/Delete Categories</h2>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">Category Name:</label>
                                        <input type="text" name="id" value="<?= $id ?>" hidden="true">
                                        <input required="true" type="text" class="form-control" id="name" style="border-color: #676767;" name="name" value="<?= $name ?>">
                                    </div>
                                    <button class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
</body>

</html>