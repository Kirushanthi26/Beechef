<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1 style="color: #F75940;" >Add Cart page</h1><br>
<?php /*
echo"<pre>";
print_r($_SESSION);
echo"</pre>";*/
?>
        <table class='table table-borded'>	
            <tr>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Remove</th>
            </tr>
            <?php
            if(isset($_GET["del"]))
            {
                foreach($_SESSION["cart"] as $keys=>$values)
                {
                        if($values["pid"]==$_GET["del"])
                        {
                            unset($_SESSION["cart"][$keys]);
                        }
                }
            }

            if(!empty($_SESSION["cart"])){

                $total=0;
                foreach($_SESSION["cart"] as $key=>$values){
                    $amt=$values["qty"]*$values["prices"];
                    $total += $amt;
                    echo"
                    <tr>
                        <td>{$values["pname"]}</td>
                        <td>{$values["qty"]}</td>
                        <td>{$values["prices"]}</td>
                        <td>{$amt}</td>
                        <td><a href='viewCart.php?del={$values["pid"]}'><i class='fas fa-trash-alt' style='font-size:18px;color:red;'></i></a></td>
                    </tr>
                    ";

                }
                echo"
                    <tr>
                        <td></td>
                        <td></td>
                        
                        <td><strong>Total</strong></td>
                        <td>{$total}</td>
                    </tr>
                    ";
                
            }else{
                echo "<script>alert('Please Select the Product ....')</script>";
            header("location:menu.php");
            }

            ?>

        </table>
<br><hr><br>
     <center>

         <h1 style="color: #F75940;">YOUR DELIVERY DETAILS</h1>
            <form action="viewCart.php" method="post">
            <label style="padding-bottom: 30px;">Press This Button For Genarate Your Details Automatically: </label>
            <button name="submit1" id="name" value="" class='btn btn-success' >Submit</button>
            
            <table class='table table-borderless text-center col-md-6'>
                <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name" value="" ></td>
                </tr>
                <tr>
                <td><label for="address">Address: </label></td>
                <td><input type="text" name="address" id="address" value="" ></td>
                </tr>
                <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="email" name="email" id="email" value="" ></td>
                </tr>
                <tr>
                <td><label for="phoneNo">Tell: </label></td>
                <td><input type="tel" name="phoneNo" id="phoneNo" value="" ></td>
                </tr>
                <tr>
                <td> <label>Payment Method </label></td>
                <td><input type="checkbox" value=""> Cash on Delivery</label></td>
                </tr>
                <tr>
                <td> <label for="comment">Comment:</label></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                </tr>
                
            </table>
        <button name="submit" class="btn btn-success" style="margin-bottom: 30px;">Confirm_Orders</button>
        <button type="reset" class="btn btn-danger" style="margin-bottom: 30px;">Cancel</button>
        </form>
    </center>


</div>
</div>
</div>

<?php include "footer.php";?>