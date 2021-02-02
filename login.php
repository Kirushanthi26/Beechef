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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 d-none d-md-block image-container">
        </div>
        <div class="col-lg-6 col-md-6 form-container">
        <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
        <h1 id="h1-1">Beechef</h1>
            <h3>Login</h3>
            <Br>
            <form action="login.php" method="POST" enctype="multipart/form-data">
                <table>
                <tbody>
                    <tr>
                        <td><label for="username">Username: </label></td>
                        <td><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                    <td> <?php if(!empty($error_info)){?>
                    <div class="alert alert-danger">
                         <?= $error_info?>
                    </div>
                     <?php } ?></td>
                    </tr>
                    </tbody>
                    </table>
        <Br>
        <button name="login" class="btn btn-success">Login</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
            <br>
            <a href="register.php">Don't have an account? Register now</a>
                    </div>
            
        </div>
    </div>
</div>
