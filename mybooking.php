<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php
if(!loggedIn()){
  redirect("errors.php");
} 
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php comment_submit(); ?>
<?php display_message(); ?>
		</div>
		
	</div>
	
</div>

<?php 
if (isset($_COOKIE['mobile'])) {
    $_SESSION['mobile'] = $_COOKIE['mobile'];
    $sql                = "SELECT * FROM users WHERE mobile_no ='$_COOKIE[mobile]'";
    $result             = query($sql);
    confirm($result);
    $row = fetch_array($result);
    $user_id = $row['id'];
    
} else if (isset($_SESSION['mobile'])) {
    $sql    = "SELECT * FROM users WHERE mobile_no ='$_SESSION[mobile]'";
    $result = query($sql);
    confirm($result);
    $row = fetch_array($result);
    $user_id = $row['id'];
}
?>

<?php
 // $sql ="SELECT * FROM orders
 //            JOIN ratting
 //            ON orders.id = ratting.order_id
 //           	WHERE orders.user_id=ratting.user_id = '$user_id'";

$sql    = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
$result = (query($sql));
if (row_count($result) <= 0) {
echo " <div class='row'>
<div class='col-md-6 col-md-offset-3'><div class='alert alert-danger text-center' style='margin-top:50px; margin-bottom:250px;'><strong>Not Found !</strong></div></div></div>";

} else {
?>
    
<div class="container" style="margin-bottom: 500px;">
	<table id="cart" class="table table-hover table-condensed" style="margin-top: 50px;">
		<thead>
		<tr>
				<th style="width:10%">Service</th>
				<th style="width:20%">Category</th>
				<th style="width:10%">Price</th>
				<th style="width:10%" class="text-center">Order Date</th>
				<th style="width:10%" class="text-center">Cancel Order</th>
				<th style="width:20%" class="text-center">Ratting</th>
				<th style="width:10%" class="text-center">Comment</th>
				<th style="width:10%" class="text-center">View</th>

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
    $emp_id = $row["emp_id"];
    $status = $row["status"];
    $working_duration = $row["working_duration"];
    $ratting = $row["ratting"];
    $comment = $row["comment"];

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
	echo date('d-F-Y',strtotime($date));
?>
					</p>
					</center>
				</td>
				<td class="actions" data-th="">
					<center>
						<?php if($status == 0){ ?>
						<!-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button> -->


  <a href="mybooking.php?delete=<?php echo encode($o_id); ?>" class="btn btn-danger btn-sm" title="View" type="button" class="hidden on-editing cancel-row"><i class="fa fa-trash-o"></i></a>


						<?php }else{ ?>
							<center>
								<p>Not possible.</p>
							</center>
							<!-- <button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-trash-o"></i></button> -->
						<?php } ?>
					</center>
				</td>
				
				<td>
	<center>
	<?php if(empty($working_duration)) { ?>
			<p>Processing ...</p>
	<?php }else{ ?>

<?php
// if(isset($o_id)){
// $sql    = "SELECT * FROM ratting WHERE $id = '$o_id'";
// $result = (query($sql));
// if (row_count($result) == 1) {
// echo "Not found ";

// } else {
// $row = fetch_array($result);
// echo "Hello";
// }
// }
?>


<?php if($ratting == 0){
?>
<form method="POST">
		<a class="btn btn-warning btn-sm" href="mybooking.php?id=1&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=2&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=3&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=4&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=5&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
		</form>
<?php
}else{
	echo "<i class='fa fa-check' aria-hidden='true'></i>";
} ?>
<!-- 				<form method="POST">
		<a class="btn btn-warning btn-sm" href="mybooking.php?id=1&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=2&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=3&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=4&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>

		<a class="btn btn-warning btn-sm" href="mybooking.php?id=5&o_id=<?php echo encode($o_id); ?>" role="button">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
		</form> -->
	<?php } ?>
	</center>
				</td>
		<td>
			<!-- Button trigger modal -->
<center>
	<?php if(empty($working_duration)){ ?>
<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" disabled><i class="fa fa-pencil" aria-hidden="true"></i>
</button> -->
<?php }else{
if($comment == 0){
?>
<button type="button" onclick="fun(<?php echo $o_id;?>);" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-pencil" aria-hidden="true"></i>
</button>
<?php
}else{
	echo "<i class='fa fa-check' aria-hidden='true'></i>";
}
}?>
</center>


		</td>
		<td>
		<center>
			<?php if(empty($working_duration)){ ?>
		<!-- 	<a href="myBookingDetails.php?order_id=<?php echo encode($o_id); ?>&user_id=<?php echo  encode($user_id); ?>" type="button" class="btn btn-info" title="View"><i class="fa fa-eye-slash"></i></a> -->
			<?php }else{ ?>	
				<a href="myBookingDetails.php?order_id=<?php echo encode($o_id); ?>&user_id=<?php echo  encode($user_id); ?>" type="button" class="btn btn-info" title="View"><i class="fa fa-eye"></i></a>
			<?php } ?>
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





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write your comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<center>
      		<label for="message_area">No more than 100 characters</label><br>
      		 <span class="hint" id="textarea_message" style="color: red;"></span>
      	</center>
      <div class="modal-body">
      <form method="POST" action="?" autocomplete="off">
     <textarea id="message_area" maxlength="100" rows="5" name="comment"  cols="68" placeholder="Write a comment..."></textarea>
      </div>
      <input type="hidden" name="order_id" value="" id="q_id_input">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>





               <?php
if (isset($_GET['id']) && isset($_GET['o_id']) || isset($_GET['emp_id'])) {
    $id = $_GET['id'];
    $o_id = $_GET['o_id'];
    $o_id =decode($o_id);
    $emp_id = $_GET['emp_id'];

    // $sql = "INSERT INTO ratting (value, user_id, emp_id, order_id)
    // VALUES ('$id','0','0', '$o_id')";


$sqlP       = "SELECT * FROM orders WHERE id = '$o_id'";
$resultP    = query($sqlP);
confirm($resultP);
$rowP = fetch_array($resultP);
$emp_id = $rowP["emp_id"];
$service_id = $rowP["service_id"];

 date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d H:i:s');

if(ratting_exists($o_id)){
  $quer = "UPDATE ratting SET value = '$id',user_id = '$user_id' , emp_id = '$emp_id' WHERE order_id = '$o_id'";
query($quer);

}else{
  $sql = "INSERT INTO ratting(value, service_id, user_id, emp_id, order_id,date_time)";

$sql.="VALUES('$id', '$service_id', '$user_id','$emp_id', '$o_id','$date')";

    
	$result=query($sql);
	confirm($result);
}









//   $sql = "INSERT INTO ratting(value, user_id, emp_id, order_id)";

// $sql.="VALUES('$id','$user_id','$emp_id', '$o_id')";

    
// 	$result=query($sql);
// 	confirm($result);

$quer = "UPDATE orders SET ratting = 1 WHERE id = '$o_id'";
query($quer);


    header("location: mybooking.php");
    // set_message("<div class='alert alert-info'>
    //             <strong>Approved</strong> successfully.</div>
    //             <script type='text/javascript'>
    //             window.setTimeout(function() {
    //             $('.alert').fadeTo(500, 0).slideUp(500, function(){
    //             $(this).remove();
    //             });
    //             }, 2000);
    //             </script>
    //             ");
}
?>





<?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_id = decode($delete_id);
    $sql       = "DELETE FROM orders WHERE id = '$delete_id'";
    query($sql);
    header("location: mybooking.php");
    set_message("<div class='alert alert-danger'>
                  <strong>Order</strong> cancel successfully.
                </div>
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













<?php include("includes/footer.php"); ?>
<script type="text/javascript">
	
$('textarea#message_area').on('keyup',function() 
{
  var maxlen = $(this).attr('maxlength');
  
  var length = $(this).val().length;
  if(length > (maxlen-10) ){
    $('#textarea_message').text('Max length '+maxlen+' characters only!')
  }
  else
    {
      $('#textarea_message').text('');
    }
});
</script>



  <script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>



    <script type="text/javascript">

    function fun(p)
    {
        document.getElementById('q_id_input').value=p;
         
    }
  
</script>