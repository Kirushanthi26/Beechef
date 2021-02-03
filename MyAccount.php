<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1 id="h1-22">My Account Details Update</h1>
<table>
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

     </table>    
     <br>   
        <button name="Register" class="btn btn-success" id="b1">Update</button>
        <button type="reset" class="btn btn-danger" id="b2">Cancel</button>
 
    </form>




</div>
</div>
</div>

<?php include "footer.php";?>