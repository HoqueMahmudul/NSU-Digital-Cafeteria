<?php
require("controllerUserData.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyFood </title>
  <meta content name="description">
  <meta content name="keywords">

  

  <!-- Google Fonts -->
  <link href="css/css.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/icofont.min.css" rel="stylesheet">
  <link href="css/boxicons.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/venobox.css" rel="stylesheet">
  <link href="css/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"> <img src="images/log.png"><a href="index.php"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">LOGIN</a></li>
          <li class="book-a-table text-center"><a href="index.php?PageName=Register">Register</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



  <main id="main">

        <!-- Load Login,Signup Page -->
        <?php
$PagesDirectory = 'Pages Folder';
if (!empty($_GET['PageName'])) {
    $PagesFolder = scandir($PagesDirectory, 0);
    unset($PagesFolder[0], $PagesFolder[1]);
    $PageName = $_GET['PageName'];
    if (in_array($PageName . '.php', $PagesFolder)) {
        include($PagesDirectory . '/' . $PageName . '.php');
    } else {
        echo '<h2>Sorry Page Not Found</h2>';
    }
} else {
    include($PagesDirectory . '/Login.php');
}
?>


  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/validate.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/venobox.min.js"></script>
  <script src="js/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>