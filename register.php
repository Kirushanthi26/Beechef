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
<h2>register</h2>
<form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>

        <label for="address">Address: </label>
        <input type="text" name="address" id="address" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="phoneNo">Tell: </label>
        <input type="tel" name="phoneNo" id="phoneNo" required>

        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <label for="confirm">Confirm Password: </label>
        <input type="password" name="confirm" id="confirm" required>

        <?php 
        // showing the error message
        if(!empty($error_info)){ ?>
            
            <div><?= $error_info ?></div>
        <?php } ?>
        <button name="Register">Register</button>

    </form>
    <!-- end of the register form-->

    <!--create the link to login page-->
    <a href="login.php">Already have an account? Login now</a>

    <!-- include the footer page-->
    <?php include "footer.php"; ?>