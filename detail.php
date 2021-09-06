<?php
session_start();

require_once('db/dbhelper.php');
require_once('db/config.php');
require_once('ultis/ultility.php');

$id = getGet('id');
$sql = "select id, image_name, name, description from product where id = $id";
$product = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail - Harvel Electric</title>
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
  <div id="header" class="static-top d-flex align-items-center header-transparent">
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

  <!-- body START -->
  <div class="container">
    <button class="btn-back">
      <a href="javascript:history.go(-1)">Back to Previous Page</a>
    </button>
  </div>

  <?php
  foreach ($product as $item) {
    echo "
  <div class='container'>
		<div class='card'>
			<div class='container-fluid'>
				<div class='wrapper row'>
					<div class='preview col-md-6'>
						<div class='preview-pic tab-content'>
						  <div class='tab-pane active'><img src='admin/uploads/{$item['image_name']}' /></div>
						</div>
						
					</div>
					<div class='details col-md-6'>
						<h3 class='product-title'>{$item['name']}</h3>
            <p> {$item['description']} </p>
					</div>
				</div>
			</div>
		</div>
	</div>
  ";
  }
  ?>
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
              <li><i class="bx bx-chevron-right"></i> <a href="product.php">Products</a></li>
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
<!-- body END -->

</html>