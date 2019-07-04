<?php include("includes/k_p_header.php"); ?>

<?php 
if (!logged_in_KP()) {
   redirect("index.php");
}
 ?>

<?php include("includes/k_p_nav.php"); ?>
	
<?php

if (isset($_SESSION['username'])) 

$sql = "SELECT * FROM employee WHERE emp_id ='$_SESSION[username]'";
$result = query($sql);
confirm($result);
$row = fetch_array($result);
$first_name = $row['first_name'];
$last_name = $row['last_name'];
?>

<style type="text/css">
	p{
		color: #3987EA;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<center>
<?php
	display_message();
	update_About();
	validate_changePassword();
	upadte_picture();
?>
			</center>
			
		</div>
		<div class="col-md-12 ">
			<div class="panel panel-white post panel-shadow">
				<div class="row">
					<div class="col-md-2" style="margin-top: 30px;">
						<ul>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change About</button>
						</ul>
						
						<ul>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Change Password</button>
						</ul>
						<ul>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Change Profile Picture</button>
						</ul>
					</div>
					<div class="col-md-8" >
						<div class="panel panel-primary" style="margin-top: 30px;">
							<div class="panel-body ">
								<div style="margin-bottom: 20px;">
									<center>
										<?php if(empty($row['profile_picture'])) {?>
											<img src="images/demo/clinte1.png">
										<?php }else{ ?>
									<img src="uploads/profilePicture/<?php echo $row['profile_picture']; ?>" class="img-circle" alt="Cinque Terre" width="175" height="175">
								<?php } ?>
									</center>
								</div>
								<form role="form" action="?"  method="post" class="form-horizontal" id="submit_form" enctype="multipart/form-data">
									<div class="form-group">
										<label for="name" class="col-sm-3 control-label">
										Userame</label>
										<div class="col-sm-9">
											<p><?php  echo $row['emp_id'];?></p>
										</div>
									</div>
									<div class="form-group">
										<label for="nickName" class="col-sm-3 control-label">Name</label>
										<div class="col-sm-9">
											<p><?php echo ucwords($row['first_name']." ".$row['last_name']); ?></p>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-9">
											<p><?php echo $row['email']; ?></p>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Qualification</label>
										<div class="col-sm-9">
											<p>
												

<?php
$s_id = $row["qualification_id"];
$sqlS = "SELECT * FROM qualification WHERE id = '$s_id'";
$resultS = query($sqlS);
confirm($resultS);
$rowS = fetch_array($resultS);
echo ucwords($rowS['q_name']);
?>
											</p>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Joining Date</label>
										<div class="col-sm-9">
											<p><?php echo $row['birthday']; ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Address</label>
										<div class="col-sm-9">
											<p>
<?php
$c_id = $row['city_id'];
$sqlC = "SELECT * FROM city WHERE id = '$c_id'";
$resultC = query($sqlC);
confirm($resultC);
$rowC = fetch_array($resultC);
echo ucwords($rowC['city_name']);
?>
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">About</label>
										<div class="col-sm-9">
											<p><?php echo $row['about']; ?></p>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-2" style="margin-top: 30px;">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.image-preview-input {
	position: relative;
	overflow: hidden;
	margin: 0px;
	color: #333;
	background-color: #fff;
	border-color: #ccc;
}

.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}

.image-preview-input-title {
	margin-left: 2px;
}
</style>
<?php include("includes/k_p_footer.php"); ?>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3987EA; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Change About</center></h4>
			</div>
			<form method="POST" action="?">
				<div class="modal-body">
					<div class="md-form form-group mt-5">
						<textarea  class="form-control" rows="3" name="about" id="" value="" placeholder="Enter about..."></textarea>
					</div>
					<div class="md-form form-group mt-5">
						<input type="password" class="form-control" name="password" id="formGroupExampleInputMD" value="" placeholder="Current password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" name="submit_about" class="btn btn-info pull-right">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Change Password -->
<div class="modal fade" id="myModal1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3987EA; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Change Your Password</center></h4>
			</div>
			<form method="POST" action="?">
				<div class="modal-body">
					<div class="md-form form-group mt-5">
						<input type="password" class="form-control" name="current_password" id="formGroupExampleInputMD" value="" placeholder="Current password">
					</div>
					<div class="md-form form-group mt-5">
						<input type="password" class="form-control" name="password" id="formGroupExampleInputMD" value="" placeholder="New password">
					</div>
					<div class="md-form form-group mt-5">
						<input type="password" class="form-control" name="confirm_password" id="formGroupExampleInputMD"  value="" placeholder="Confirm password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" name="submit_password" class="btn btn-info pull-right">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3987EA; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Change Your Profile Picture</center></h4>
			</div>
			<form method="POST" action="?" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="md-form form-group mt-5">
						<div class="input-group image-preview">
							<input type="text" class="form-control image-preview-filename" disabled="disabled">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
								<span class="glyphicon glyphicon-remove"></span> Clear
								</button>
								<div class="btn btn-default image-preview-input">
									<span class="glyphicon glyphicon-folder-open"></span>
									<span class="image-preview-input-title">Browse</span>
									<input type="file" accept="image/png, image/jpeg, image/gif" name="profile_picture"/>
								</div>
							</span>
						</div>
					</div>
					<div class="form-group">
						
						<input type="password" class="form-control" name="password" id="" value="" placeholder="Current password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" name="submit_picture" class="btn btn-info pull-right">Update</button>
				</div>
			</form>
		</div>
		
	</div>
</div>
<script type="text/javascript">
$(document).on('click', '#close-preview', function() {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function() {
            $('.image-preview').popover('show');
        },
        function() {
            $('.image-preview').popover('hide');
        }
    );
});
$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function() {
        $('.image-preview').attr("data-content", "").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function() {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function(e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});
</script>