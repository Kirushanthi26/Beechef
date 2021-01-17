<?php
session_start();
include "database.php";
if(isset($_SESSION["username"])){
    header("Location: index.php");
}
include "header.php";

$error_info ="";

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username =$_POST["username"];
    $password = $_POST["password"];

    if(!empty($username) && !empty($password)){
        $query = "SELECT * FROM user WHERE username = '" . $username . "' ";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);

        if(md5($password) == $row["password"]){
            $_SESSION["username"] = $username;
             
            if($row["admin"] == 1){
                header("Location: admin.php");
            }else{
                header("Location: index.php");
            }
        }else{
            $error_info = "wrong password, pls try again";
        }
    }else{
        $error_info = "pls enter username and password";
    }
}
?>
<h2>Login</h2>
<form action="login.php" method="POST" enctype="multipart/form-data">

        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <?php if(!empty($error_info)){?>
            <div>
                <?= $error_info?>
            </div>
            <?php } ?>

        <button name="login">Login</button>

    </form>
    <a href="register.php">Don't have an account? Register now</a>




<?php 
include "footer.php";
?>