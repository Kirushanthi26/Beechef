<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<?php
$output=NULL;
	$ID=$name=$email=$tel=$add=$pas=$user="";
	if(isset($_POST['submit1'])){
		
		$search1 = $conn->real_escape_string($_POST['Username']);
		
		
		$result = $conn->query("SELECT * FROM user WHERE username='$search1'");
		
		if($result->num_rows >0){
			while($rows = $result->fetch_assoc()){
			$ID=$rows['uid'];
			$name=$rows['name'];
			$email=$rows['email'];
			$tel=$rows['tel'];
			$add=$rows['address'];
            $user=$rows['username'];
            $pas=$rows['password'];
				
			}
		}
		else{$output="No Results";}
		
	}
?>	
<?php
if(isset($_POST['update'])){
    $name = $_POST["name"];
    $add = $_POST["address"];
    $em = $_POST["email"];
    $pn = $_POST["phoneNo"];
    $un = $_POST["username"];
    $pw = $_POST["password"];

   
  
    $sql = "INSERT INTO user (name, address, email, tel, username, password) VALUES ( '$name', '$add','$em','$pn','$un','$pw')";
  
    if (mysqli_query($conn, $sql)) {
          echo "Your details updated successfully !";
       } 
  
  }

?>
<?php
if(isset($_POST['delete'])){
    $unn = $_POST["Username"];
$sql1 = "DELETE * FROM user WHERE username= '$unn' ";
if ($conn->query($sql1) === TRUE) {
    echo "Record deleted successfully";
}
}
?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1 id="h1-22">My Account Details Update</h1>
<form action="MyAccount.php" method="post">
<td><label for="Username">Enter Username for searching purpose: </label></td>
<input type="text" name="Username" id="Username" >
<input type="submit" name="submit1" value="Find">	
<table>
        <tr>
        <td><label for="name">Name: </label></td>
        <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" ></td>
        </tr>
        <tr>
        <td><label for="address">Address: </label></td>
        <td><input type="text" name="address" id="address" value="<?php echo $add; ?>" ></td>
        </tr>
        <tr>
        <td><label for="email">Email: </label></td>
        <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" ></td>
        </tr>
        <tr>
        <td><label for="phoneNo">Tell: </label></td>
        <td><input type="tel" name="phoneNo" id="phoneNo" value="<?php echo $tel; ?>" ></td>
        </tr>
        <tr>
        <td><label for="username">Username: </label></td>
        <td><input type="text" name="username" id="username" value="<?php echo $user; ?>" ></td>
        </tr>
        <tr>
        <td><label for="password">Password: </label></td>
        <td><input type="password" name="password" id="password" value="<?php echo $pas; ?>" ></td>
        </tr>     
        <tr>
        <td></table>    
     <br>   
        <button name="update" class="btn btn-success" id="b1">Update</button>
        <button name="delete" class="btn btn-warning" id="b3">Delete</button>
        <button type="reset" class="btn btn-danger" id="b2">Cancel</button>
 
    </form>

    


</div>
</div>
</div>

<?php include "footer.php";?>