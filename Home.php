<?php
require("controllerUserData.php");
$NsuId = $_SESSION['NsuId'];
$password = $_SESSION['password']; 
//This condition checks when only  user wants to  login without entering his NSU ID OR Password
if ($NsuId != false && $password != false) {
  $sql = "SELECT * FROM users_tb WHERE NsuId = '$NsuId'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
  }
} else {
  // redirect  to Back Page 
  echo "<script>   window.history.back(); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home </title>
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
  <style>
    #hero {
  width: 100%;
  height: 100vh;
  background: url('images/about.jpeg') top center;
  background-size: cover;
  position: relative;
  padding: 0;
}
  </style>

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"> <?php echo  $fetch_info['UserName'];?><a href="index.php"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#menu">Cart</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li class="book-a-table text-center"><a href="Logout.php">Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



  <main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero"  class="d-flex align-items-center ">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Digital Cafeteria</span></h1>
          <h2>A place to enjoy the meals for NSUers</h2>
     
          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#contact" class="btn-book animated fadeInUp scrollto">Contact Us</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="images/ban.jpeg" alt>
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Hello NSUer!</h3>
            <p class="font-italic">
            The cafeterias in the North South University are now on the digital platform for the first time ever. 

            </p>
          <p>
          Our objective is to enhance the meal experience and make it more time efficient. We are glad to be of service to you. 
          </p>
            <p>
            Thank you and take care!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

   
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">
      <div class="card text-center bg-dark">
        <div class="card-header h2">
         Menu List
        </div>
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link " id='d1'>KASUNDI</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " id='d2' >CAFE'Z</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " id='d3' >NESCAFE'Z</a>
      </li>
    </ul>
  </div>
  <div class="card-body " id='t1'>

  <table class="table text-light" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  <?php
  // Display KASUNDI Dishes 
    $Query = "Select * from menu where Category = 'KASUNDI'";
    $Result = mysqli_query($con, $Query);
    if ($Result) {
      while ($row = mysqli_fetch_assoc($Result)) {
        ?>
        <tr class='<?php echo $row['Category'];?>'>
          <td><?php echo $row['Id'] ?></td>
          <td><?php echo $row['Name'] ?></td>
          <td><?php echo $row['Price'] ?></td>
          <td onclick='Name(this.className)' class='<?php echo $row['Id'] ?>'> <span id='<?php echo $row['Id'] ?>'>0</span>  <button class='btn btn-success' onclick='plus()'>+</button> <button class='btn btn-danger' onclick='minus()'>-</button></td>
        </tr>
        <?php
      }}
   ?>
    
  </tbody>
  </table>
  <button class="btn btn-dark btn-lg" style="color:white;border:2px solid #cda45e; border-radius:20px;" data-bs-toggle="modal" data-bs-target="#ModalDis"  onclick="DisplayOrderDetail()">Add To Cart</button>
  </div>

  <div class="card-body " id='t2'>

<table class="table text-light" >
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Quantity</th>
  </tr>
</thead>
<tbody>
<?php
// Display CAFEZ Dishes 
    $Query = "Select * from menu where Category = 'CAFEZ'";
    $Result = mysqli_query($con, $Query);
    if ($Result) {
      while ($row = mysqli_fetch_assoc($Result)) {
        ?>
        <tr class='<?php echo $row['Category'];?>'>
          <td><?php echo $row['Id'] ?></td>
          <td><?php echo $row['Name'] ?></td>
          <td><?php echo $row['Price'] ?></td>
          <td onclick='Name(this.className)' class='<?php echo $row['Id'] ?>'> <span id='<?php echo $row['Id'] ?>'>0</span>  <button class='btn btn-success' onclick='plus()'>+</button> <button class='btn btn-danger' onclick='minus()'>-</button></td>
        </tr>
        <?php
      }}
   ?>

</tbody>
</table>
<button class="btn btn-dark btn-lg" style="color:white;border:2px solid #cda45e; border-radius:20px;" data-bs-toggle="modal" data-bs-target="#ModalDis"  onclick="DisplayOrderDetail()">Add To Cart</button>
</div>
<div class="card-body " id='t3'>

<table class="table text-light" >
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Quantity</th>
  </tr>
</thead>
<tbody>
<?php
// Display NESCAFEZ Dishes 
    $Query = "Select * from menu where Category = 'NESCAFEZ'";
    $Result = mysqli_query($con, $Query);
    if ($Result) {
      while ($row = mysqli_fetch_assoc($Result)) {
        ?>
        <tr class='<?php echo $row['Category'];?>'>
          <td><?php echo $row['Id'] ?></td>
          <td><?php echo $row['Name'] ?></td>
          <td><?php echo $row['Price'] ?></td>
          <td onclick='Name(this.className)' class='<?php echo $row['Id'] ?>'> <span id='<?php echo $row['Id'] ?>'>0</span>  <button class='btn btn-success' onclick='plus()'>+</button> <button class='btn btn-danger' onclick='minus()'>-</button></td>
        </tr>
        <?php
      }}
   ?>
 

</tbody>
</table>
<button class="btn btn-dark btn-lg" style="color:white;border:2px solid #cda45e; border-radius:20px;" data-bs-toggle="modal" data-bs-target="#ModalDis"  onclick="DisplayOrderDetail()">Add To Cart</button>
</div>
</div>
      </div>
    </section><!-- End Menu Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

  

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>NSU , Cafeteria</p>
              </div>

              <div class="open-hours">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <h4>Open Hours:</h4>
                <p>
                  Saturday-Thursday:<br>
                  08:00 AM - 08:00 PM
                </p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>nsu.cafeteria@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>02-55668202</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                <div class="validate"></div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
   

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DigitalCafeteria</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->
<!-- Order Receipt Modal -->
  <div class="modal fade" id="ModalDis" tabindex="-1" style='' aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"  onclick='RefreshMenu()'  aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark" id='detail' >

      </div>
      <div class="modal-footer">
      <form >
          <div class="label text-dark">
           Provide your location: 
          </div>
          <input type="text"  onchange="RoomSelection()" id="room" class="form-control" placeholder="">
        </form>
        <br>
        <p class='lead text-dark'> Are you a faculty member?</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modalYes" >Yes</button>
        <button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modalNo" >No</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Faculty Member Modal -->

<div class="modal fade" id="modalYes" tabindex="-1" style='' aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick='RefreshMenu()' aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark"  >
     <p >
      <span class='lead'> Dear faculty member ,</span> <br> you will receive your meal within few minutes. <br> room number <span class='room'>1<span> 
       <br>
    
     </p>
      </div>
  
    </div>
  </div>
</div>
<!-- Student  Modal -->
<div class="modal fade" id="modalNo" tabindex="-1" style='' aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">NS USER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick='RefreshMenu()' aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark"  >
     <p >
      <span class='lead'> Dear NSUser ,</span> <br>Please pick up your meal
      counter number <span class='room'>1<span>
       within few minutes.
       <br>
      
     </p>
      </div>
  </div>
</div>
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
  <script>


    //Default Menu KASUNDI
    $("#t2").css("display","none")
    $("#t3").css("display","none")
    //When User Click  CAFE'Z
    $("#d2").click(function () {
        $("#t1").css("display","none")
        $("#t3").css("display","none")
        $("#t2").css("display","block")
        $("#t2").show();   
    });
   //When User Click  KASUNDI
    $("#d1").click(function () {
        $("#t2").css("display","none")
        $("#t3").css("display","none")
        $("#t1").css("display","block")
        $("#t1").show();   
    });
 //When User Click  NESCAFE'Z
    $("#d3").click(function () {
        $("#t1").css("display","none")
        $("#t2").css("display","none")
        $("#t3").css("display","block")
        $("#t3").show();   
    });

    let classname=0;
    let value = 0;
    let op = '';
    //Selected Items add into the cart
    function Name(a){
       classname = a
       var val = $(`.${a}`).text();
       val = val.replace('+', '');
       val = val.replace('-', '');
       value = parseInt(val);
      if(op=='+')
      value =  value + 1
      else if (op=='-')
      {
        if(value>0)
        value =  value - 1
      }
      $(`#${classname}`).html(value)
      //Store in database
     AddToBill()
    }
    function plus()
    {
      op = '+' 
    }
    function minus()
    {
      op = '-' 
    }
    function AddToBill(){
      let Data = {
        id:classname,
        quantity:value
      }
      $.ajax({    
        type: "POST",
        url: "request.php",  
        data: Data ,           
        async: false,
        success : function(res){
                  console.log(res)
               }
    });
    }
    //Get Data From Database
    function DisplayOrderDetail(){
      $.ajax({    
        type: "POST",
        url: "OrderDetail.php",         
        async: false,
        success : function(response){
                const res  =  JSON.parse(response)
                 $("#detail").html(" ")
                let table ='<table class="table text-dark">';
                let total = 0;
                  for (var i = 0; i < res.length; i++) {
                     table += "<tr> <td>"+res[i]['Name'] +"</td> <td> "+ res[i]['Price'] +" </td> <td>  "+res[i]['quantity']+" </td> </tr> ";
                     total+=parseInt(res[i]['Price'])*parseInt(res[i]['quantity']);
                }
                table += "<tr> <td> Total Amount  </td>  <td colspan='2'>  "+total+" </td> </tr>";
                table +='</table>'
                console.log(total)
                $("#detail").html(table)
               }
    });

    }


function RefreshMenu(){
  location.reload();
}
function RoomSelection(){
  $(".room").html($("#room").val());
}
  </script>

</body>

</html>