<?php
$severname ="localhost";
$username = "root";
$password = "";
$DBname = "bee_chef";

//create Db connection
$conn = new mysqli($severname,$username,$password,$DBname);


//check the connection
if($conn->connect_error){
    die("Connection Error: ".$conn->connect_error);
}
//echo "Connected successfully";