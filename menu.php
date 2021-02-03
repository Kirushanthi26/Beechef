<?php
session_start();
include "database.php";
include "header_home.php";
include "headerdesign.php";?>

<div class="container-fluid" id="wrapper">
<div class="row">
<div class="col-md-12" style="background-color:#fef1e1;">

<h1 class="text-center" id="h1-11"><i class="fas fa-utensils"></i>Food List</h1>
<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead class="fixed_header">
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Product image</th>
				<th>Desription</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody class="fixed_header">
				<?php 
					$sql="select * from product left join category on category.cid=product.cid order by product.cid asc, p_name asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['pid']; ?>||<?php echo $iterate; ?>" name="pid[]" style=""></td>
							<td><?php echo $row['c_name']; ?></td>
							<td><?php echo $row['p_name']; ?></td>
							<td><img src="<?php echo $row['photo']; ?>" width="100" height="100"></td>
							<td><?php echo $row['description']; ?></td>
							<td class="text-right">&#x20A8; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-4" >
				<button type="submit" class="btn btn-primary" id="btn11"> Add_Cart</button>
			</div>
		</div>
	</form>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</div>
</div>
</div>

<?php include "footer.php";?>