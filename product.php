<?php
require_once('db/dbhelper.php');
require_once('db/config.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product - Harvel Electric</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <div id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>Harvel Electric</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <div id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Harvel</a></li>
          <li class="dropdown"><a href="product.php"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown">
                <p style="font-size: medium; margin-left: 15px;">FANS</p>
                <ul>
                  <li><a href="product2.php?ptid= 1">CEILING FANS</a> </li>
                  <li><a href="product2.php?ptid= 2">STAND FANS</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <p style="font-size: medium; margin-left: 15px;">GEYSERS</p>
                <ul>
                  <li><a href="product2.php?ptid= 6">Gas Geyser</a> </li>
                  <li><a href="product2.php?ptid= 7">Instant Geyser</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <p style="font-size: medium; margin-left: 15px;">LIGHTING</p>
                <ul>
                  <li><a href="product2.php?ptid= 4">CFL</a> </li>
                  <li><a href="product2.php?ptid= 3">LED</a></li>
                  <li><a href="product2.php?ptid= 5">FLOURESCENT TUBELIGHT</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div><!-- .navbar -->
    </div>
  </div><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Product</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs Section -->

    <!-- ======= Nav Vertical Section ======= -->
    <div class="container-fluid">
      <div class="row">
        <!-- ======= Product List======= -->
        <div class="col-lg-2">
          <div class="product_list" style="display: block;">
            <ul class="nav-vertical">
              <li role="presentation" class="nav-list"><a href="product.php" class="first">
                  <h3 style="color: #140000;">Product List</h3> <br>
                </a></li>
              <?php
              $listPt = "Select * from product_type";
              $ptList = executeResult($listPt);
              foreach ($ptList as $item) {
              ?>

                <li role="presentation">
                  <a href="product2.php?ptid=<?= $item['id'] ?>" style="color: #0d2735; font-size: 20px;"> <?= $item['product_type'] ?></a>
                </li>

              <?php
              }
              ?>
            </ul>
          </div>
        </div>

        <!-- ======= Product ======= -->
        <div class="col-lg-10">
          <div class="product">
            <div class="heading-block">
              <strong>Product</strong>
              <div class="download">
                <a href="download/download.php?file=fan_price.pdf">DOWNLOAD PRICE LIST</a>
              </div>
            </div>

            <div class="text-center">
              <img src="assets/img/loader.gif" id="loader" width="200" style="display: none;">
            </div>

            <div class="row">
              <?php
              $limit = 9;
              $page = 1;
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              if ($page <= 0) {
                $page = 1;
              }
              $firstIndex = ($page - 1) * $limit + 1;

              $sql = 'select count(id) as total from product';
              $countResult = executeSingleResult($sql);
              $count = $countResult['total'];
              $number = ceil($count / $limit);

              $sql = "select product.id, product.name, product.categories_id, product.product_type_id as 'ptid', product.image_name, product.short_desc, product_type.product_type FROM product INNER JOIN product_type on product.product_type_id = product_type.id where 1 limit " . $firstIndex . "," . $limit;

              $productList = executeResult($sql);

              foreach ($productList as $item) {
                echo '<div class="col-md-3" style="border: solid 2px #e9e6e6; margin-top: 10px; margin-left: 20px; border-radius: 2vh;" data-aos="fade-up">
                <input data-aos="fade-up" class="text text-center" type="hidden" value="' . ($firstIndex++) . '"></input>
                <a data-aos="fade-up" href="detail.php?id=' . $item['id'] . '"><img src="admin/uploads/' . $item['image_name'] . '" style="margin-top: 30px; width: 100%; height: 150px;";></a>
                <a data-aos="fade-up" href="detail.php?id=' . $item['id'] . '"><p class="text text-center" style="font-size: 25px; margin-top: 30px;  color: #ce515b; width: 100%; height: 60px;">' . $item['name'] . '</p></a>
                <p data-aos="fade-up" class="text text-center" style="font-size: 20px; color: #140000; height: 70px;">' . $item['short_desc'] . '</p>
                <span data-aos="fade-up" class="pview" style="border: 2.25px solid #cb515b; height: 37px; margin-bottom: 8px; border-radius:15vh; padding: 5px; margin-left: 30%;">
                <a data-aos="fade-up" style=" color: #ce515b; font-size: large; font-weight: 600; " href="detail.php?id=' . $item['id'] . '">View More</a>
                </span>
              </div>';
              }
              ?>
              <ul class="pagination" data-aos="fade-up" style="margin-left: 30%;">
                <?php
                if ($page > 1) {
                  echo ' <li class="page-item"><a class="page-link" href="product.php?page=' . ($page - 1) . '">Previous</a></li>';
                }
                ?>
                <?php
                for ($i = 0; $i < $number; $i++) {
                  if ($page == ($i + 1)) {
                    echo '<li class="page-item active"><a class="page-link" href="product.php?page=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
                  } else {
                    echo '<li class="page-item "><a class="page-link" href="product.php?page=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
                  }
                }
                ?>
                <?php
                if ($page < $number) {
                  echo '<li class="page-item"><a class="page-link" href="product.php?page=' . ($page + 1) . '">Next</a></li>';
                }
                ?>

              </ul>

            </div>
          </div><!-- End Products -->
  </main><!-- End #main -->

  </div>
  </div>
  </div>
  <!-- End Nav Vertical Section -->


  <!-- ======= Footer ======= -->
  <div id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Products</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              212 Nguyen Dinh Chieu Street <br>
              District 3, Ho Chi Minh City<br>
              Vietnam <br><br>
              <strong>Phone:</strong> +84 948 310 048<br>
              <strong>Email:</strong> harver@electric.com<br>
            </p>
          </div>

          <div class="col-lg-7 footer-map">
            <!-- ======= Map Section ======= -->
            <div class="map mt-2">
              <div class="container-fluid">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4241674197956!2d106.68784161525551!3d10.778789162096423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3a9d8d1bb3%3A0x1cf755f02e5a8b48!2zMjEyIE5ndXnhu4VuIMSQw6xuaCBDaGnhu4N1LCBQaMaw4budbmcgNiwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1622004575587!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div><!-- End Map Section -->
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Harvel Electric</span></strong>. All Rights Reserved
      </div>
    </div>
  </div>
  <!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>