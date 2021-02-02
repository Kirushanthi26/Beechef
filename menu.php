<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1>fefewrhehe</h1>

<ul class="nav nav-tabs">
<?php
			$sql="select * from category order by cid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['c_name'] ?>"><?php echo $frow['c_name'] ?></a></li>
			<?php

			$sql="select * from category order by cid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by cid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a data-toggle="tab" href="#<?php echo $row['c_name'] ?>"><?php echo $row['c_name'] ?></a></li>
				<?php
			}
		?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <?php
	$sql="select * from category order by cid asc limit 1";
	$fquery=$conn->query($sql);
	$ftrow=$fquery->fetch_array();
	?>
    

  </div>

</div>
</div>
</div>

<?php include "footer.php";?>