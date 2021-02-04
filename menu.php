<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1 class="text-center" id="h1-11"><i class="fas fa-utensils"></i>Food List</h1>
<div class="container">
      <div class="row">
          <?php
          $sql = "select * from product";
          $res = $conn->query($sql);
          if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
			  echo '<div class="col-md-3 text-center" class="box-11">
			  
			  <p><strong>'. $row['p_name'] .'</strong></p>
              <img src="'.$row['photo'].'" alt=""  width="150" height="100">
			  <h4 class="text-danger"> Rs.'. $row['price'] .'</h4>
			  <p><a href="view.php?id='. $row['pid'] .'" class="btn btn-success">View Details</a></p>
              </div>
              ';
            }
          }
          ?>
      </div>
      </div>
</div>
</div>
</div>

<?php include "footer.php";?>