<?php
session_start();
include "database.php";
include "header_home.php";?>

<div class="container-fluid" id="header">
<div class="row">

    <div class="col-md-8" style="background-color:#fef1e1;">
    <h1 id="h1-1"><img src="css/logo.png" alt="logo" title="beechef logo" width="200px" id="">
    Beechef</h1>
    </div>
    <div class="col-md-4" style="background-color:#fef1e1;">
    <ul id="icon-set">
    <li class="fas fa-user-circle"><b><a href="MyAccount.php">My Account</a></b></li><br>
    <li class="fas fa-cart-plus"><b><a href="loginout.php">Add Cart</a></b></li><Br>
    <li class="fas fa-sign-out-alt"><b><a href="loginout.php">Login Out</a></b></li>
    
    <ul>
    </div>
</div>
</div>
<!--nav bar-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link"  href="menu.php">
        Menu
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About As</a>
    </li>
  </ul>
</nav>
<!-- Slideshow container -->
<div class="slideshow-container">
    <center>
  <div class="mySlides1">
    <img src="css/img1.jpg" style="width:1000px" height="500px">
    <div class="text">Caption Three</div>
  </div>

  <div class="mySlides1">
    <img src="css/img2.jpg" style="width:1000px" height="500px">
    <div class="text">Caption Three</div>
  </div>

  <div class="mySlides1">
    <img src="css/img3.jpg" style="width:1000px" height="500px">
    <div class="text">Caption Three</div>
  </div>
</center>
  <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>


<script>
var slideIndex = [1,1];
var slideId = ["mySlides1"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
</script>


<!--main contant-->
<div class="container-fluid" id="wrapper">
<div class="row">
    <div class="col-md-12" style="background-color:#fef1e1;">

    <div class="box-b1">
    <i class="fas fa-clock" style="font-size:48px;color:#F2A516;"></i>
    <h6>working hours</h6>
    <p>10Am - 11Pm</p>
    </div>
    <div class="box-b1">
    <i class="fas fa-map-marked-alt" style="font-size:48px;color:#F2A516;"></i>
    <h6>Delivery</h6>
    <p>Colombo side only</p>
    </div>
    <div class="box-b1">
    <i class="fas fa-phone-square-alt" style="font-size:48px;color:#F2A516;"></i>
    <h6>Call No</h6>
    <p>011 236 4587</p>
    </div>

    <h2 class="home-t1" style="color:#F25D27;">How It Works</h2>
    <p class="home-t1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam reprehenderit id enim quasi dolor recusandae itaque dicta esse inventore, rerum culpa cupiditate, exercitationem, quod ad?</p>

    <div class="box-b2">
    <i class="fas fa-sign-in-alt" style="font-size:48px;color:#F2A516;"></i>
    <h6>Login/Register</h6>
    <p>Need to create the account or already have account then login!</p>
    </div>
    <div class="box-b2">
    <i class="fas fa-utensils" style="font-size:48px;color:#F2A516;"></i>
    <h6>Order</h6>
    <p>Select your favouried Food and add the food in the Addcard Part.  </p>
    </div>
    <div class="box-b2">
    <i class="fab fa-amazon-pay" style="font-size:48px;color:#F2A516;"></i>
    <h6>Confirm Payament</h6>
    <p>If you okey with your order then confirm the order</p>
    </div>
    <div class="box-b2">
    <i class="fas fa-motorcycle" style="font-size:48px;color:#F2A516;"></i>
    <h6>Fast Delivery</h6>
    <p>After confirm, if we accept the order, we will send confime mail.</p>
    </div>
   
    <h2 class="home-t1" style="color:#F25D27;">New Items</h2>
    <br>
      <div class="container">
      <div class="row">
          <?php
          $sql = "select * from product";
          $res = $conn->query($sql);
          if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
              echo '<div class="col-md-3 text-center">
              <img src="'.$row['photo'].'" alt=""  width="100" height="100">
              <p><strong>'. $row['p_name'] .'</strong></p>
              <h4 class="text-danger"> Rs.'. $row['price'] .'</h4>
              </div>
              ';
            }
          }
          ?>
      </div>
      </div>

    </div>
</div>
</div>

<div class="container-fluid">
<div class="row">

    <div class="col-md-12" style="background-color:#414141;">
    <div class="footer-box">
    <img src="css/logo.png" alt="logo" title="beechef logo" width="200px" id="">
    <h1 id="h1-2">Beechef</h1>
    </div>
    <div class="footer-box">
    <h1 id="h1-2">About As</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro suscipit architecto adipisci similique, repellendus modi quas nobis ipsa veniam velit?</p>
    </div>
    <div class="footer-box">
    <h1 id="h1-2">Contect Us</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste deleniti recusandae blanditiis sed enim excepturi error porro magni dolorem qui?</p>
    </div>
  <br>
  <div id="social">
    <hr>
    <center>
  <img src="css/sMedia/facebook (1).png" alt="facebook" class="sm">
  <img src="css/sMedia/1whatsapp.png" alt="Whatsapp"class="sm">
  <img src="css/sMedia/1twitter.png" alt="twitter"class="sm">
  <img src="css/sMedia/1linkedin.png" alt="linkdin"class="sm">
</center>
  </div>

   </div>

</div>
</div>

</body>
</html>