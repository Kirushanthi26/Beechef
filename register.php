<?php
session_start();
//including the DB connection page and header page 
include "database.php";

include "header.php";

//get the details from form
if (isset($_POST["Register"])){

    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    $error_info ="";

    if($password == $confirm){
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='".$username."'");

        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO user (name, address, email, tel, username, password) VALUES ('$name','$address','$email',
            '$phoneNo','$username','".md5($password)."')";

            if(mysqli_query($conn,$sql)){
                header ("Location: login.php");
            }else{
                $error_info = "Couldn't create your account";
            }
        }else{
            $error_info = "username already taken";
        }
    }else{
        $error_info = "the confirm password you entered doesn't match";
    }
}
?>

<!--create the register form-->
<div class="container-fluid">
<div class="row">
<div class="col-lg-6 col-md-6 d-none d-md-block image-container">
</div>

<div class="col-lg-6 col-md-6 form-container">
    <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
    <h1 id="h1-1">Beechef</h1>
        <h3 id="heading mb-4">Registration</h3>
         <h6 id="right-p">Create Your Account... Enjoy Fastest Food Service..!</h6><br>
         <form action="register.php" method="POST" enctype="multipart/form-data">
         <table>
        <tbody>
        <tr>
        <td><label for="name">Name: </label></td>
        <td><input type="text" name="name" id="name" required></td>
        </tr>
        <tr>
        <td><label for="address">Address: </label></td>
        <td><input type="text" name="address" id="address" required></td>
        </tr>
        <tr>
        <td><label for="email">Email: </label></td>
        <td><input type="email" name="email" id="email" required></td>
        </tr>
        <tr>
        <td><label for="phoneNo">Tell: </label></td>
        <td><input type="tel" name="phoneNo" id="phoneNo" required></td>
        </tr>
        <tr>
        <td><label for="username">Username: </label></td>
        <td><input type="text" name="username" id="username" required></td>
        </tr>
        <tr>
        <td><label for="password">Password: </label></td>
        <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
        <td><label for="confirm">Confirm Password: </label></td>
        <td><input type="password" name="confirm" id="confirm" required></td>
        </tr>      
        <tr>
        <td><?php 
        // showing the error message
        if(!empty($error_info)){ ?>
            
            <div class="alert alert-danger"><?= $error_info ?></div>
        <?php } ?></td>
        </tr>
        
        </tbody>
     </table>    
     <br>   
        <button name="Register" class="btn btn-success">Register</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
 
    </form>
    <!-- end of the register form-->
    <br>
    <!--create the link to login page-->
    <a href="login.php">Already have an account? Login now</a>
        </div>
            </div>
        </div>
    </div>

    