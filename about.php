<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<?php
if(isset($_POST['submit'])){
  $com = $_POST["com"];
  $name = $_POST["uname"];
 

  $sql = "INSERT INTO feedback (f_description, uname) VALUES ( '$com', '$name')";

  if (mysqli_query($conn, $sql)) {
		echo "Your Feedback Added successfully !";
	 } 

}
?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<br>
<div class="container">

  <h1>Feedback Form</h1>
  <form action="about.php" class="was-validated" method="post">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea class="form-control" rows="5" id="comment" placeholder="Enter the comment" name="com" required></textarea>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<h1>Our place address in google map & our shop video</h1>
<iframe class="about1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7921.2863968810425!2d79.86838962596434!3d6.933178948292885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2591d2a7640e7%3A0x377856183e838e81!2sAluthkade%20streetfood!5e0!3m2!1sen!2slk!4v1612330075396!5m2!1sen!2slk" 
width="600" height="450" frameborder="0" style="border:0;"
 allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

 <iframe class="about1" width="560" height="315" src="https://www.youtube.com/embed/iX1hZB9G5sY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



</div>
</div>
</div>

<?php include "footer.php";?>