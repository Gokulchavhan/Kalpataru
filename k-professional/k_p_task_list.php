<?php include("includes/k_p_header.php"); ?>
<?php 
if (!logged_in_KP()) {
   redirect("index.php");
}
 ?>

<?php include("includes/k_p_nav.php"); ?>

<?php 
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $sql                = "SELECT * FROM employee WHERE emp_id ='$_COOKIE[username]'";
    $result             = query($sql);
    confirm($result);
    $row = fetch_array($result);
    $emp_id = $row['id'];
    $service_id = $row['service_id'];
    
} else if (isset($_SESSION['username'])) {
    $sql    = "SELECT * FROM employee WHERE emp_id ='$_SESSION[username]'";
    $result = query($sql);
    confirm($result);
    $row = fetch_array($result);
    $emp_id = $row['id'];
    $service_id = $row['service_id'];
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
			<?php display_message(); ?>
		</div>
	</div>
</div>

  
<div class="container" style="margin-bottom: 500px;">
	<table id="cart" class="table table-hover table-condensed" style="margin-top: 50px;">
		<thead>
<?php
$sql    = "SELECT * FROM orders WHERE service_id = '$service_id' AND status = 0 ";
$result = (query($sql));
if (row_count($result) <= 0) {
echo "
<div class='container'> 
<div class='row'>
<div class='col-md-6 col-md-offset-3'><div class='alert alert-danger text-center' style=''><strong>Not Found !</strong></div></div></div>";

} else {
?>
		<tr>
				<th style="width:20%">Service</th>
				<th style="width:20%">Category</th>
				<th style="width:10%">Require</th>
				<th style="width:10%">Price</th>
				<th style="width:10%" class="text-center">Order Date</th>
				<th style="width:10%" class="text-center">Confirm Order</th>
				<!-- <th style="width:10%" class="text-center">  Enter time duration</th> -->
				<th style="width:10%" class="text-center">Details</th>
			</tr>
		</thead>
		<?php
$i = 0;
while ($row = fetch_array($result)) {
    $i++;
    $o_id     = $row["id"];
    $status = $row["status"];
    $service_id = $row["service_id"];
    $service_category_id = $row["service_category_id"];
    $service_price_id = $row["service_price_id"];
    $date = $row["date_time"];
    $gender_id = $row["gender_id"];

?>
	
		<tbody>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-10">
							<h4 class="nomargin">
								<p>
<?php

$sqlS       = "SELECT * FROM services WHERE id = '$service_id'";
$resultS    = query($sqlS);
confirm($resultS);
$rowS = fetch_array($resultS);

echo ucwords($rowS['name']);

?>
								</p>	
							</h4>
						</div>
					</div>
				</td>
				<td>
					<h4 class="nomargin">
						<p>
<?php

$sqlC       = "SELECT * FROM assign_service_category WHERE id = '$service_category_id'";
$resultC    = query($sqlC);
confirm($resultC);
$rowC = fetch_array($resultC);

echo ucwords($rowC['name']);

?>
						</p>
					</h4></td>




	<td>
					<h4 class="nomargin">
						<p>
<?php

$sqlG       = "SELECT * FROM gender WHERE id = '$gender_id'";
$resultG    = query($sqlG);
confirm($resultG);
$rowG = fetch_array($resultG);

echo ucwords($rowG['gender']);

?>
						</p>
					</h4></td>




				<td data-th="Price">
				
<?php

$sqlP       = "SELECT * FROM service_price WHERE id = '$service_price_id'";
$resultP    = query($sqlP);
confirm($resultP);
$rowP = fetch_array($resultP);

echo ucwords($rowP['price']).".00 /-";

?>
					</td>
			
				<td>
					<center>
					<p> 
<?php
	echo date('d-F-Y H:i:s',strtotime($date));
?>
					</p>
					</center>
				</td>
				<td class="actions" data-th="">
					<center>
						<a type="button" href="k_p_task_list.php?accept=<?php echo $o_id; ?>&emp_id=<?php echo $emp_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
					</center>
				</td>
			<!-- 	<td class="actions" >
				<center>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
				</center>
				</td> -->
				<td>
					<center>
						<a href="k-p-order-details.php?order_id=<?php echo encode($o_id); ?>" title="Address"><i class="fa fa-eye"></i></a>	
					</center>
				</td>
			</tr>
		</tbody>
<?php
}
}
echo "</table>";
?>

	
</div>

                 <?php
if (isset($_GET['accept']) && isset($_GET['emp_id'])) {
    $accept_id = $_GET['accept'];
    $emp_id = $_GET['emp_id'];
    
    $quer1     = "UPDATE orders SET status = 1, emp_id = $emp_id WHERE id = '$accept_id'";
    query($quer1);
    
    header("location: k_p_task_list.php");
    
    set_message("<div class='alert alert-info'>
                  <strong>Info!</strong> Approved successfully.</div>
                  <script type='text/javascript'>
                  window.setTimeout(function() {
                  $('.alert').fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove();
                  });
                  }, 2000);
                  </script>
                  ");
}
?>
     


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Enter time duration</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" autocomplete="off">
					<div class="form-group row">
						<label class="col-md-2 control-label">Hours</label>
						<div class="col-md-10">
							<input id="timeWithDuration" type="text" class="form-control ui-timepicker-input" name="from_time" placeholder="Enter time duration." autocomplete="off">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include("includes/k_p_footer.php"); ?>