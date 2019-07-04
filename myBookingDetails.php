<?php include("includes/header.php"); ?>
<?php
if(!loggedIn()){
  redirect("errors.php");
} 
?>
<?php
if (isset($_GET['order_id']) && isset($_GET['user_id'])) {
	$user_id = decode($_GET['user_id']);
	$o_id = decode($_GET['order_id']);
$sql    = "SELECT * FROM orders WHERE user_id = '$user_id' AND id = '$o_id' ORDER BY id DESC";
$result    = query($sql);
confirm($result);
$row = fetch_array($result);

$o_id     = $row["id"];
$status = $row["status"];
$service_id = $row["service_id"];
$service_category_id = $row["service_category_id"];
$service_price_id = $row["service_price_id"];
$date = $row["date_time"];
$fname = $row["f_name"];
$lname = $row["l_name"];
$email = $row["email"];
$address = $row["address"];
$landmark = $row["landmark"];
$city = $row["city"];
$mobile_no = $row["m_number"];
$postcode = $row["postcode"];
$date = $row["date_time"];
$order_id =$row["order_id"];
$working_duration = $row["working_duration"];
}
?>
<div id="invoice">
	<div class="toolbar hidden-print">
		<div class="text-right">
			<a class="btn btn-info pull-left" href="mybooking.php" type="button"> <i class="fa fa-arrow-left"></i> Back</a>
			<button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
			<button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
		</div>
		<hr>
	</div>
	<div class="invoice overflow-auto">
		<div style="min-width: 600px">
			<header>
				<div class="row">
					<div class="col">
						<a target="_blank">
							<img src="images/logo.png" data-holder-rendered="true" />
						</a>
					</div>
					<div class="col company-details">
						<h2 class="name">
						<a target="_blank">Kalpataru</a>
						</h2>
						<div>Fuljhore Road, Fuljhore, Durgapur, West Bengal 713206</div>
						<div>+91 9932259291, +91 9932311891</div>
						<div>sub7ata@gmail.com</div>
					</div>
				</div>
			</header>
			<?php
			$sqlU       = "SELECT * FROM users WHERE id = '$user_id'";
			$resultU    = query($sqlU);
			confirm($resultU);
			$rowU = fetch_array($resultU);
			?>
			<main>
				<div class="row contacts">
					<div class="col invoice-to">
						<div class="text-gray-light">INVOICE TO:</div>
						<h2 class="to"><?php echo $fname." ".$lname; ?></h2>
						<div class="address"><?php echo $address.", ".$landmark.", ".$city.", ".$postcode; ?></div>
						<div class="email"><a href="mailto:<?php echo $email ; ?>"><?php echo $email ; ?></a></div>
						<p>+91 <?php  echo  $mobile_no; ?></p>
					</div>
					<div class="col invoice-details">
						<h1 class="invoice-id">INVOICE</h1>
						<div class="date">Date of Invoice: <?php echo date('d-F-Y',strtotime($date)); ?></div>
						<div class="date">Order ID: <?php echo $order_id; ?></div>
					</div>
				</div>
				<table border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>#</th>
							<th class="text-left">SERVICE</th>
							<th class="text-right">HOURS PRICE</th>
							<th class="text-right">HOURS</th>
							<th class="text-right">TOTAL</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						$sqlS       = "SELECT * FROM services WHERE id = '$service_id'";
						$resultS    = query($sqlS);
						confirm($resultS);
						$rowS = fetch_array($resultS);
						?>
						<?php
						$sqlC       = "SELECT * FROM assign_service_category WHERE id = '$service_category_id'";
						$resultC    = query($sqlC);
						confirm($resultC);
						$rowC = fetch_array($resultC);
						?>
						<?php
						$sqlP       = "SELECT * FROM service_price WHERE id = '$service_price_id'";
						$resultP    = query($sqlP);
						confirm($resultP);
						$rowP = fetch_array($resultP);
						$price = $rowP['price'];
						?>
						<tr>
							<td class="no">01</td>
							<td class="text-left"><h3><?php echo ucwords($rowS['name']); ?></h3><?php echo ucwords($rowC['name']); ?></td>
							<td class="unit"><?php echo $price = sprintf('%0.2f', $price); ?> /-</td>
							<td class="qty"><?php echo $working_duration; ?>.00 h</td>
							<?php
							$var = $price * $working_duration;
							$total = sprintf('%0.2f', $var);
							?>
							<td class="total"><?php echo $total; ?></td>
						</tr>
						
					</tbody>
					<tfoot>
					<tr>
						<td colspan="2"></td>
						<td colspan="2">SUBTOTAL</td>
						<td><?php echo $total ?></td>
					</tr>
					<?php
					$avg = $total * (5/100);
					$gst =$total + $avg;
					?>
					<tr>
						<td colspan="2"></td>
						<td colspan="2">GST 5%</td>
						<td><?php echo $avg = sprintf('%0.2f', $avg); ?></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td><?php echo $gst = sprintf('%0.2f', $gst); ?></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td colspan="2">GRAND TOTAL</td>
						<td><?php echo round($gst = sprintf('%0.2f', $gst))."/-"; ?></td>
					</tr>
					</tfoot>
				</table>
				<div class="pull-right" style="margin-top: 50px;">
					<div>
						<img src="img/sign.jpg" width="75px;" class="pull-right" height="75px;">
					</div>
					<p >
						Authorized signature
					</p>
				</div>
				<div class="thanks" style="margin-top: 170px;">Thank you!</div>
				<div class="notices">
					<div>NOTICE:</div>
					<div class="notice">Keep this invoice for warranty purposes.</div>
				</div>
			</main>
		</div>
		<div></div>
	</div>
</div>
<script type="text/javascript">
	$('#printInvoice').click(function(){
Popup($('.invoice')[0].outerHTML);
function Popup(data)
{
window.print();
return true;
}
});
</script>