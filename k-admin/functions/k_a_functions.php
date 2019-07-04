<?php
/*======================== Start Helper function ==========================*/

function clean($string){ 

	$var = htmlentities($string);

	return trim($var);
}


function redirect($location){ 

	return header("Location:{$location}");
}


function set_message($message) {

	if(!empty($message )){

		$_SESSION['message'] = $message;

	}else{

		$message="";

	}
}


function display_message(){

	if(isset($_SESSION['message'])){

		echo $_SESSION['message'];

		unset($_SESSION['message']);
	}
}


function token_generator(){

	$token= $_SESSION['token'] = md5 (uniqid(mt_rand(),true));

	return $token;
}


function validation_errors($error_message)
{

$error_message = <<<DELIMITER

<p style="color:red;"> *$error_message; !</p>

DELIMITER;

return $error_message;
}


/***---URL ENCODING---***/
function encode($input) {

	 return strtr(base64_encode($input), '+/=', '._-');

}

/****---URL DECODING---****/
function decode($input) {

 return base64_decode(strtr($input, '._-', '+/='));

}

function email_exists($email) {

	$sql="SELECT id FROM admin WHERE email = '$email'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;

	}

}


/*======================== End Helper function ============================*/








/*============================ Login Function ==============================*/
function admin_login() {

	if($_SERVER['REQUEST_METHOD']=="POST"){

		$email	     	=clean($_POST['email']);
		$password	    =clean($_POST['password']);
		$remember 		= isset($_POST['remember']);

		if(empty($email)) {

			$errors[]="Email field cannot be empty";

		}

			if(empty($password)) {

				$errors[]="Password field cannot be empty";

			}



				if(!empty($errors)) {

					foreach ($errors as $error) {

					echo validation_errors($error);

					}

				}else{

					if(login_user($email, $password, $remember)) {

					redirect("index.php");

					} else {

						echo validation_errors("Your credentials are not correct");
					}

				}


	}

}


function login_user($email,$password,$remember) {

	$sql = "SELECT * FROM admin WHERE email = '".escape($email)."' AND (approve = 0 OR approve = 5);";
	$result = query($sql);

	if(row_count($result) == 1) {

		$row = fetch_array($result);
		$db_password = $row['password'];

		$pass = md5($password);

		if($pass === $db_password){

			if($remember == "on") {
				setcookie('email',$email,time() + (86400 * 30));
			}

			$_SESSION['email'] = $email;

			return true;

		}else{

			return false;
		}

		return true;

	}else{

	return false;

	}

}


/*============================ Login Function End ============================*/





/*============================ Session =======================================*/

function logged_admin() {
	if(isset($_SESSION['email']) || isset ($_COOKIE['email'])) {

		return true;

	}else{

		return false;
	}
}	/// end of function

/*============================== End Session =================================*/





/************** Username Genetator ***************/
function service_ID($service){


$ser      = mb_substr($service, 0, 3);
$service  = strtoupper($ser);

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$today = date("dmy");

$d=$today;
$date = "K".$d."$service";


$sql="SELECT *  FROM services ORDER BY id DESC";

  $result = query($sql);
  confirm($result);
  $row=fetch_array($result);

  $db_Date = $row['date_time'];
  $db_useID = $row['service_id'];

  $userID = substr($db_useID,10);



if ($db_Date == $to_day ) {

  $u_ID = $userID+1;

$u_ID = str_pad($u_ID, 3, "0", STR_PAD_LEFT);
/*  $u_ID = sprintf("%'.03d\n",$u_ID);*/

  $service = $date.$u_ID;

  return $service;


}else{

  $n= 1;

$num = str_pad($n, 3, "0", STR_PAD_LEFT);
/*  $num = sprintf("%'.03d\n",$n);*/
  $service = $date.$num;
  return $service;

  }
}/*function end*/
/*---------------------------------------------------*/






/*========================= Add Service =======================*/

function add_service(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$service = clean($_POST['service']);
			$about = clean($_POST['about']);

			$img1 = $_FILES['img1']['name'];
			$img2 = $_FILES['img2']['name'];
 
			if(empty($service) || empty($img1) || empty($img2) || empty($about)) {
				$errors[]="Empty are not allwod";
			}

			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(register_user($service,$img1,$img2,$about)){
	}
		header("location: page-service.php");
	}
}
}



function register_user($service,$img1,$img2,$about) {

	$service = escape($service);
	$about = escape($about);

	$service_id = service_ID($service);

	date_default_timezone_set("Asia/Kolkata"); 
	$to_day = date("Y-m-d");

	/*image one insert*/
	$image_name=$_FILES['img1']['name'];
	$temp = explode(".", $image_name);
	$newfilename = md5 (uniqid(mt_rand(),true)) . '.' . end($temp);
	$imagepath="images/service_image/".$newfilename;
	move_uploaded_file($_FILES["img1"]["tmp_name"],$imagepath);

	/*image one insert*/
	$image_name1=$_FILES['img2']['name'];
	$temp1 = explode(".", $image_name1);
	$newfilename1 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp1);
	$imagepath1="images/service_icon/".$newfilename1;
	move_uploaded_file($_FILES["img2"]["tmp_name"],$imagepath1);



$sql = "INSERT INTO services(id,service_id,name,about,img1,img2,date_time,status)";

$sql.="VALUES('','$service_id','$service','$about','$newfilename','$newfilename1','$to_day','0')";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Service ==================*/






/************** City ID Genetator ***************/
function city_ID($city){


$ser      = mb_substr($city, 0, 3);
$city  = strtoupper($ser);

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$today = date("dmy");

$d=$today;
$date = "K".$d."$city";


$sql="SELECT *  FROM city ORDER BY id DESC";

  $result = query($sql);
  confirm($result);
  $row=fetch_array($result);

  $db_Date = $row['date_time'];
  $db_useID = $row['city_id'];

  $userID = substr($db_useID,10);



if ($db_Date == $to_day ) {

  $u_ID = $userID+1;

$u_ID = str_pad($u_ID, 3, "0", STR_PAD_LEFT);
/*  $u_ID = sprintf("%'.03d\n",$u_ID);*/

  $city = $date.$u_ID;

  return $city;


}else{

  $n= 1;

$num = str_pad($n, 3, "0", STR_PAD_LEFT);
/*  $num = sprintf("%'.03d\n",$n);*/
  $city = $date.$num;
  return $city;

  }
}/*function end*/
/*---------------------------------------------------*/




/*========================= Add City =======================*/

function add_city(){
	if(isset($_POST['submit'])) {

			$city = clean($_POST['city']);

			if(empty($city)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(city_add($city)){
	}
		header("location: page-city.php");
	}
}
}



function city_add($city) {

	$city = escape($city);

	$city_id = city_ID($city);

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO city(city_name,city_id,date_time,status)";

$sql.="VALUES('$city','$city_id','$to_day',0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add City ==================*/




/*========================= Add Qualification =======================*/

function add_qualification(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$qualification = clean($_POST['qualification']);

			if(empty($qualification)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(city_qualification($qualification)){
	}
		header("location: page-qualification.php");
	}
}
}



function city_qualification($qualification) {

	$qualification = escape($qualification);

	$qualification_id = city_ID($qualification);

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO qualification(q_id,q_name,status,date_time)";

$sql.="VALUES(0,'$qualification','$city_id','$to_day')";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Qualifications ==================*/





/*========================= Add Identity Proof=======================*/

function add_identity(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$identity = clean($_POST['identity']);

			if(empty($identity)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(identity_add($identity)){
	}
		header("location: page-identity-card.php");
	}
}
}



function identity_add($identity) {

	$identity = escape($identity);

	/*$identity_id = city_ID($identity);*/

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO identity(card_name,date_time,status)";

$sql.="VALUES('$identity','$to_day',0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Identity Proof ==================*/




/*========================= Add admin =======================*/

function add_admin(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$first_name = clean($_POST['first_name']);
			$last_name = clean($_POST['last_name']);
			$email = clean($_POST['email']);

			if(empty($first_name) ||empty($last_name) || empty($email)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(admin_add($first_name,$last_name,$email)){
	}
		header("location: page-admin.php");
	}
}
}


function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}




function admin_add($first_name,$last_name,$email) {

	$first_name = escape($first_name);
	$last_name 	= escape($last_name);
	$email 			= escape($email);

  date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');


$pass = randomPassword();
$password =  md5($pass);

$sql = "INSERT INTO admin(first_name,last_name,email,password,approve,date_time)";

$sql.="VALUES('$first_name','$last_name','$email','$password',0,'$date')";

	$result=query($sql);
	confirm($result);




require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'onlinesms4you@gmail.com';                 // SMTP username
$mail->Password = 'mou721445';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$mail->setFrom('onlinesms4you@gmail.com', 'Kalpataru Admin');
$mail->addAddress($email);
$mail->addReplyTo('no-reply@gmail.com', 'Np-reply');

$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Welcome to Kalpataru Admin';
$mail->Body    = "<html>
<head>
	<style>
	.banner-color {
	background-color: #eb681f;
	}
	.title-color {
	color: #0066cc;
	}
	.button-color {
	background-color: #0066cc;
	}
	@media screen and (min-width: 500px) {
	.banner-color {
	background-color: #0066cc;
	}
	.title-color {
	color: #eb681f;
	}
	.button-color {
	background-color: #eb681f;
	}
	}
	</style>
</head>
<body>
	<div style='background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important'>
		<table align='center' border='0' cellspacing='0' cellpadding='0' style='table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
			<tbody>
				<tr>
					<td align='center'>
						<center style='width:100%'>
						<table bgcolor='#FFFFFF' border='0' cellspacing='0' cellpadding='0' style='margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif' width='512'>
							<tbody>
								<tr>
									<td bgcolor='#F3F3F3' width='100%' style='background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec'>
										<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important' width='100%'>
											<tbody>
												<tr>
													<td align='left' valign='middle' width='50%'><span style='margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px'>Kalpataru</span></td>
													<td valign='middle' width='50%' align='right' style='padding:0 0 0 10px'><span style='margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px'>$date_print</span></td>
													<td width='1'>&nbsp;</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align='left'>
										<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
											<tbody>
												<tr>
													<td width='100%'>
														<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
															<tbody>
																<tr>
																	<td align='center' bgcolor='#8BC34A' style='padding:20px 48px;color:#ffffff' class='banner-color'>
																		<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
																			<tbody>
																				<tr>
																					<td align='center' width='100%'>
																						<h1 style='padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px'>Welcome to Kalpataru</h1>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td align='center' style='padding:20px 0 10px 0'>
																		<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
																			<tbody>
																				<tr>
																					<td align='center' width='100%' style='padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;'>
																						<h3 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;' class='title-color'>Hi  $first_name,</h3>

																						<h5 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 12px; line-height: 24px; text-align: center;' class='title-color'>Your password is: $pass</h5>

																						<p style='margin: 20px 0 30px 0;font-size: 15px;text-align: center;'>You used a temporary password to login. In order to continue to use kalpararu, please set your new password immediately.</p>

																						<div style='font-weight: 200; text-align: center; margin: 25px;'><a href='localhost/kalpataru/k-admin/page-login.php' style='padding:0.6em 1em;border-radius:600px;color:#ffffff;font-size:14px;text-decoration:none;font-weight:bold' class='button-color'>Login</a></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<tr>
																</tr>
																<tr>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align='left'>
										<table bgcolor='#FFFFFF' border='0' cellspacing='0' cellpadding='0' style='padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
											<tbody>
												<tr>
													<td align='center' width='100%'>
														<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
															<tbody>
																<tr>
																	<td align='center' valign='middle' width='100%' style='border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px'>Regards,
																		<br><b>The Kalpataru Team</b>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td align='center' width='100%'>
														<table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
															<tbody>
																<tr>
																	<td align='center' style='padding:0 0 8px 0' width='100%'></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}



	return true;
	}

/*========================= End Add Admin ==================*/


/*========================= Change password ==================*/
function checkoldpassword() {
	$sql = "SELECT * FROM admin WHERE email = '{$_SESSION['email']}'";
	$result = query($sql);
	if(row_count($result) == 1) {
		$row = fetch_array($result);
		$db_pass = $row['password'];
		return $db_pass;
	}else{
	 return false;
	}
}


function validate_changePassword(){

	$errors=[];
	$min = 5;
	$max = 20;

if($_SERVER['REQUEST_METHOD']=="POST"){

	$current_password	=clean($_POST['current_password']);
	$password	     	=clean($_POST['password']);
	$confirm_password	=clean($_POST['confirm_password']);

if(strlen($password) < $min) {
    $errors[]="Your password cannot be less than {$min} characters";
}

if(strlen($confirm_password) > $max) {
    $errors[]="Your password cannot be more than {$max} characters";
}


if($password!==$confirm_password){

	$errors[]="Your password fields do not match";
}


$old_pass = checkoldpassword();
$pass = md5($password);

if($old_pass === $pass) {
	$errors[]="New password cannot be the same as the old password";
}

if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(change_password($current_password,$password,$confirm_password)){


  set_message("<div class='alert alert-success'>
  <strong>Password</strong> has been changed.</div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 5000);
	</script>
    ");


		redirect("page-password-change.php");

		}else{

		set_message("<div class='alert alert-danger'>
    Old password appears to be incorrect </div>
		<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
		}, 5000);
		</script>
    ");

		redirect("page-password-change.php");

		}
	}
}
}


function change_password($current_password,$password,$confirm_password){

	$current_password  	= escape($current_password);
	$password    				= escape($password);
	$confirm_password		= escape($confirm_password);

    $sql = "SELECT * FROM admin WHERE email = '{$_SESSION['email']}' ";
    $result = query($sql);
    if(row_count($result) == 1) {

        $row = fetch_array($result);
        $db_pass = $row['password'];

	if(md5($current_password) === $db_pass){
        $password = md5($password);

    $sql2 = "UPDATE admin SET password ='$password' WHERE email = '{$_SESSION['email']}' ";

		$result2 = query($sql2);
		confirm($result2);

            return true;

    }else{
            return false;
    }

		}

}



/*========================= End Change password ==================*/









/*========================= Add Service Category =======================*/

function add_category(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$service = clean($_POST['service']);
			$city_ID = clean($_POST['city']);
			$category = clean($_POST['category']);
 
			if(empty($service) || empty($city_ID) || empty($category)) {
				$errors[]="Empty are not allwod";
			}

			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(category($service,$city_ID,$category)){
	}
		header("location: page-service-category.php");
	}
}
}



function category($service,$city_ID,$category) {

	$service = escape($service);
	$city_ID = escape($city_ID);
	$category = escape($category);


date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO assign_service_category(service_id, city_id, name, date_time, status, city_status, assign_service_status
)";

$sql.="VALUES('$service','$city_ID','$category','$to_day',0,0,0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Service Category ==================*/





/*========================= Add Gender =======================*/

function add_gender(){
	if(isset($_POST['submit'])) {

			$gender = clean($_POST['gender']);

			if(empty($gender)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(gender_add($gender)){
	}
		header("location: page-gender.php");
	}
}
}



function gender_add($gender) {

	$gender = escape($gender);

	$gender_id = "KPT-".rand(1000, 9999);

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO gender(gender_id,gender,status)";

$sql.="VALUES('$gender_id','$gender',0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Gender ==================*/



/*========================= Add Price =======================*/

function add_service_price(){
	if(isset($_POST['submit'])) {

			$price = clean($_POST['price']);
			$price_name = clean($_POST['price_name']);

			if(empty($price) || empty($price_name)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(service_price_add($price,$price_name)){
	}
		header("location: page-service-price.php");
	}
}
}



function service_price_add($price,$price_name) {

	$price = escape($price);
	$price_name = escape($price_name);

	$price_id = "KPT-".$price;

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO service_price(price_id,price,price_name,status)";

$sql.="VALUES('$price_id','$price','$price_name',0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Price ==================*/




/*========================= Add Time =======================*/

function add_service_time(){
	if(isset($_POST['submit'])) {

			$from_time = clean($_POST['from_time']);
			$to_time = clean($_POST['to_time']);

			if(empty($from_time) || empty($to_time)) {
				$errors[]="Empty are not allwod";
			}



			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(service_time_add($from_time,$to_time)){
	}
		header("location: page-service-time.php");
	}
}
}



function service_time_add($from_time,$to_time) {

	$from_time = escape($from_time);
	$to_time = escape($to_time);

	$time_id = "KPT-".$from_time."-"."$to_time";

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$sql = "INSERT INTO service_time(time_id,time_to,time_from,status)";

$sql.="VALUES('$time_id','$from_time','$to_time',0)";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Add Time ==================*/





/*========================= Assign Services =======================*/


function assign_service(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$service = clean($_POST['service']);
			$city = clean($_POST['city']);

 
			if(empty($service) || empty($city)) {
				$errors[]="Empty are not allwod";
			}

			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(service_put($service,$city))
	
		header("location: page-assign-service.php");
	}
}
}



function service_put($service,$city) {

	$service = escape($service);
	$city = escape($city);



	date_default_timezone_set("Asia/Kolkata");
	$to_day = date("Y-m-d");


$sql = "INSERT INTO assign_service(service_id, city_id, date_time, status)";

$sql.="VALUES('$service','$city','$to_day','0')";

	$result=query($sql);
	confirm($result);


	return true;
	}

/*========================= End Assign Services ==================*/





/*======================== Add Profile Picture =========================*/

function add_profile_picture(){
	if($_SERVER['REQUEST_METHOD']=="POST") {


			$profile_picture=$_FILES['profile_picture']['name'];
 
			if(empty($profile_picture)) {
				$errors[]="Empty are not allwod";
			}

			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(picture_add($profile_picture)){
		header("location: page-profile.php");
	}
	}
}
}



function picture_add($profile_picture) {

	
	$profile_picture = $_FILES['profile_picture']['name'];
	$temp = explode(".", $profile_picture);
	$newfilename = md5 (uniqid(mt_rand(),true)) . '.' . end($temp);
	$imagepath="images/admin_image/".$newfilename;
	move_uploaded_file($_FILES["profile_picture"]["tmp_name"],$imagepath);

   $quer = "UPDATE admin SET profile_picture = '$newfilename' WHERE email = '$_SESSION[email]'";
   query($quer);

	return true;
}



/*======================== End Profile Picture =========================*/


/*===============================*/

function add_testimonials(){
	if($_SERVER['REQUEST_METHOD']=="POST") {

			$employee = clean($_POST['employee']);

 
			if(empty($employee)) {
				$errors[]="Please select a employee name";
			}

			if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(testimonials($employee))
	
		header("location: page-testimonials.php");
	}
}
}



function testimonials($employee) {

	$employee_id = escape($employee);

	date_default_timezone_set("Asia/Kolkata");
	$to_day = date("Y-m-d");



$sql = "INSERT INTO testimonials(employee_id, date_time)";

$sql.="VALUES('$employee_id','$to_day')";

	$result=query($sql);
	confirm($result);


	return true;
	}
/*===============================*/



/*****************-----Recover password function-----********************/

function recover_password() {

	if(isset($_POST['reset'])){

		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$email = clean($_POST['email']);

		if (!empty($_POST["email"])) {

		if(email_exists($email)) {

			$validation_code =	mt_rand(100000, 999999);
		/*	$validation_code = md5($email . microtime());*/

		setcookie('temp_access_code', $validation_code, time() + 900);

$sql = "UPDATE admin SET validation_code ='".escape($validation_code)."'WHERE email ='".escape($email)."' ";

	$result = query($sql);
	confirm($result);


$date_print = date("l jS, F  Y");






	set_message("<div class='alert alert-success'>
    Welcome  Please check your <strong>email</strong> or <strong>spam folder</strong> for a password reset code </div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2500);
	</script>
    ");
				redirect("page-otp.php?email=$email&code=$validation_code");
 
}else{

	echo validation_errors("This emails does not exits");

	}

	}else{

	echo validation_errors("Email is required");

	}
	}else{

		redirect("index.php");

	}

	}			// post function


 	}			 // end of function






/*****************-----Code validation-----********************/

function validate_code() {

	if(isset($_COOKIE['temp_access_code'])) {

		if(!isset($_GET['email']) && !isset($_GET['code'])){

			redirect("index.php");

				}else if (empty($_GET['email']) || empty($_GET['code'])) {

					redirect("index.php");
				}else{
					if (isset($_POST['code'])) {
						# code...
						$email = clean($_GET['email']);
						$validation_code = clean($_POST['code']);
						$sql = "SELECT id FROM admin WHERE validation_code = '".escape($validation_code)."' AND email = '".escape($email)."'";

						$result=query($sql);


						if(row_count($result)==1) {

							setcookie('temp_access_code', $validation_code, time() + 300);

							redirect("page-reset-password.php?email=$email&code=$validation_code");

						} else {

							echo validation_errors("Sorry worng validation code");
						}
					}
				}
			}else{
						set_message("<div class='alert alert-danger'>
    <strong>Warning!</strong> Sorry your validation cookie was expired </div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2500);
	</script>
    ");
			redirect("k_p_reset.php");
		}
	} //end of function



/*****************-----Password Reset Function-----********************/


function password_reset() {

if(isset($_COOKIE['temp_access_code'])) {

	if(isset($_GET['email']) && isset($_GET['code'])) {

		if(isset($_SESSION['token']) && (isset($_POST['token']))) {

			if ($_POST['token'] === $_SESSION['token']) {

				if (empty($_POST['password']) || empty($_POST['confirm_password'])) {
    				echo validation_errors("Please enter password");
    				}elseif (preg_match("/([%\$#\*]+)/", $_POST["password"])){
    					echo validation_errors("Speacial chrecter are not allowed");
    					}elseif (strlen($_POST["password"]) < '6') {
        					echo validation_errors("Invalid password. Password must be at least 6 numbers");
    						}elseif (strlen($_POST["password"]) > '8') {
        						echo validation_errors("Invalid password. Password cannot be greater than 8 numbers");
    							}else{

				if($_POST['password']===$_POST['confirm_password']) {

					$updated_password = md5($_POST['password']);

					$sql = "UPDATE admin SET password ='".escape($updated_password)."',validation_code = 0 WHERE email = '".escape($_GET['email'])."'";

					query($sql);


				     set_message("<div class='alert alert-success'>
    Your passwords has been sucessfully updated, please <strong>login!</strong></div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2500);
	</script>
    ");



					redirect("page-login.php");
				}else{
					set_message("<p class='bg-danger text-center'> Your passwords does not match. </p>");
				}

			}
		}
	}

}
} else {

	set_message("<p class='bg-danger text-center'>Sorry your time has expired </p>");

		redirect("k_p_recover.php");
set_message("<div class='alert alert-danger'>
    <strong>Warning!</strong> Sorry your time has expired </div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2500);
	</script>
    ");
		

}
}
 // end of function





























 ?>
