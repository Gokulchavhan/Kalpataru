<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php
if(!loggedIn()){
  redirect("errors.php");
} 
?>

<div class="container">
	<div class="row" style="margin-top: 20px; ">
	<a href="booking.php?expert=<?php echo 0; ?>" class="btn btn-info pull-right" role="button">Skip</a>
</div>
	<div class="row">
		<div class="list-group">
      <?php
        if(isset($_GET['service']) && isset($_GET['expert_type'])){
        $s_id =  $_GET['service'];
        $sql ="SELECT * FROM employee WHERE service_id = $s_id AND approve = 0";
        $result=(query($sql));
        if(row_count($result) > 0){
        $count=1;
        while($row =fetch_array($result))
        {
        $emp_id = $row["id"];
        $about   = $row["about"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $date_time = $row["date_time"];
        $date_time = date('j-F-Y', strtotime($date_time));
        // echo $first_name;
        ?>
        		<a href="booking.php?expert=<?php echo $emp_id; ?>" class="list-group-item">
				<div class="media col-md-3">
					<figure class="pull-left">
						<div class="image_inner_container">
							<?php if(empty($row['profile_picture'])){ ?>
							<img src="k-professional/uploads/profilePicture/expert.png">
							 <?php }else{ ?>
							 	<img src="k-professional/uploads/profilePicture/<?php echo $row['profile_picture']; ?>">
							 	<?php } ?>
						</div>
					</figure>
				</div>
				<div class="col-md-6">
					<h4 class="list-group-item-heading"> <?php echo ucwords($first_name." ".$last_name); ?> </h4>
					<p class="list-group-item-text"> <?php echo $about; ?>
					</p>
				</div>
				<div class="col-md-3 text-center">
<?php 
     $sqlRcount="SELECT * FROM orders WHERE emp_id = '$emp_id' AND ratting = 1";
        $resultRcount =(query($sqlRcount));
        if(row_count($resultRcount) > 0){
        $rc = 0;
        while($rowR5 =fetch_array($resultRcount))
        {
         $rc++;
        }
      }else{
        $rc = 0;
      }

?>

					<h2> <!-- 13540 --><?php echo $rc; ?> <small> Ratting  </small></h2>
					<button type="button" class="btn btn-primary btn-lg btn-block">Book Now!</button>

					<div class="stars">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</div>

<?php 
        $sqlRC ="SELECT * FROM ratting WHERE emp_id = '$emp_id' AND value <> '0'";
        $resultRC =(query($sqlRC));
        if(row_count($resultRC) > 0){
        $countRC = 0;
        while($rowRC = fetch_array($resultRC))
        {
           $countRC++;
          $value = $rowRC['value'];

          $temp = $temp + $value;
        
        }
        $Ravg = $temp / $countRC;
      $Ravg = number_format((float)$Ravg, 1, '.', '');
      }
      $temp = 0;
?>
					<p> <!-- Average 4.1 --> <?php echo "Average ".$Ravg." / 5"; ?> <small></small> </p>
				</div>
			</a>
        <?php
    }
}
}else{
	redirect("errors.php");
}
      ?>



			<!-- <a href="#" class="list-group-item active">
				<div class="media col-md-3">
					<figure class="pull-left">
						<img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x250" alt="placehold.it/350x250" >
					</figure>
				</div>
				<div class="col-md-6">
					<h4 class="list-group-item-heading"> List group heading </h4>
					<p class="list-group-item-text"> Qui diam libris ei, vidisse incorrupte at mel. His euismod salutandi dissentiunt eu. Habeo offendit ea mea. Nostro blandit sea ea, viris timeam molestiae an has. At nisl platonem eum.
						Vel et nonumy gubergren, ad has tota facilis probatus. Ea legere legimus tibique cum, sale tantas vim ea, eu vivendo expetendis vim. Voluptua vituperatoribus et mel, ius no elitr deserunt mediocrem. Mea facilisi torquatos ad.
					</p>
				</div>
				<div class="col-md-3 text-center">
					<h2> 14240 <small> votes </small></h2>
					<button type="button" class="btn btn-default btn-lg btn-block"> Vote Now! </button>
					<div class="stars">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</div>
					<p> Average 4.5 <small> / </small> 5 </p>
				</div>
			</a> -->
			<!-- <a href="#" class="list-group-item">
				<div class="media col-md-3">
					<figure class="pull-left">
						<div class="image_inner_container">
							<img src="https://i0.wp.com/tricksmaze.com/wp-content/uploads/2017/04/Stylish-Girls-Profile-Pictures-36.jpg?resize=300%2C300&ssl=1">
						</div>
					</figure>
				</div>
				<div class="col-md-6">
					<h4 class="list-group-item-heading"> List group heading </h4>
					<p class="list-group-item-text"> Eu eum corpora torquatos, ne postea constituto mea, quo tale lorem facer no. Ut sed odio appetere partiendo, quo meliore salutandi ex. Vix an sanctus vivendo, sed vocibus accumsan petentium ea.
						Sed integre saperet at, no nec debet erant, quo dico incorrupte comprehensam ut. Et minimum consulatu ius, an dolores iracundia est, oportere vituperata interpretaris sea an. Sed id error quando indoctum, mel suas saperet at.
					</p>
				</div>
				<div class="col-md-3 text-center">
					<h2> 12424 <small> votes </small></h2>
					<button type="button" class="btn btn-primary btn-lg btn-block">Book Now!</button>
					<div class="stars">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</div>
					<p> Average 3.9 <small> / </small> 5 </p>
				</div>
			</a> -->
	
		</div>
	</div>
</div>
<div class="circle-frame">
</div>
<?php include("includes/footer.php"); ?>