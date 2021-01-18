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
<div id="wrapper">
<div id="left-box">
<h5>Photography.</h5>
<p id="left-p">CLICK FOR YOUR SHOOT.</p>
<h1 id="left-h1">Photography.</h1>
<br id="clear">
<p id="footer-left">JOURNY EVERYWHERE.</p>
</div>
<div id="right-box">
<h1 id="right-h1">Registration</h1>
<p id="right-p">create the account for eat</p>
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
            
            <div><?= $error_info ?></div>
        <?php } ?></td>
        </tr>
        <tr>
        <td><button name="Register">Register</button></td>
        </tr>
        </tbody>
     </table>
    </form>
    <!-- end of the register form-->
    
    <!--create the link to login page-->
    <a href="login.php">Already have an account? Login now</a>
    </div>
    </div>
    <!-- include the footer page-->
    <?php include "footer.php"; ?>