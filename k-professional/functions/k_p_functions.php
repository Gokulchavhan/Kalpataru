<?php

/*******************-----helper function-----********************/

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

<p style='color:red'> * $error_message !
</p>

DELIMITER;

return $error_message;
} 




/***************User email exists function*******************/

function email_exists($email) {

	$sql="SELECT id FROM employee_request WHERE email = '$email'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}/*end function */



function emp_email_exists($email) {

	$sql="SELECT id FROM employee WHERE email = '$email'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}/*end function */




/*----------------------------------------------------------------------*/



/***************Mobile Number exists function*******************/

function mobile_no_exists_emp($mb_no) {

	$sql="SELECT id FROM employee WHERE mobile_no = '$mb_no'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}


function mobile_no_exists_emp_rqs($mb_no) {

	$sql="SELECT id FROM employee_request WHERE mobile_no = '$mb_no'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}

/*end function */
/*----------------------------------------------------------------------*/




/***---URL ENCODING---***/
function encode($input) {

	 return strtr(base64_encode($input), '+/=', '._-');

}

/****---URL DECODING---****/
function decode($input) {

 return base64_decode(strtr($input, '._-', '+/='));

}



/*================== mobile number valudation ===========================*/
function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);

     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 10) {
        return false;
     } else {
       return true;
     }
}

/*======================================================================*/




/*=======================================================================*/
/*=========================== Working function ==========================*/
/* ========================== Sign Up function ==========================*/
/*=======================================================================*/

function SignUp() {

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['submit_inputs'])) {
		$mob = clean($_POST['mobile_no']);
		$options = clean($_POST['options']);


	if(!empty($mob)) {

		if(validate_phone_number($mob) ){

			if(!mobile_no_exists_emp($mob)){

				if(!mobile_no_exists_emp_rqs($mob)){

				if(!empty($options)){

		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$mob = clean($_POST['mobile_no']);
			$options = clean($_POST['options']);

			$v_code =mt_rand(1000,9999);

			$_SESSION["mb_no"]=$mob;
			$_SESSION["service"]=$options;
			$_SESSION["mb_otp"] = $v_code;



		setcookie('temp_access_v_code', $v_code, time() + 180);

$m_number = encode($mob);
$otp_code = encode($v_code);
redirect("k_p_code-mobile.php?mob_no=$m_number&o_code=$otp_code&otp=$v_code");
	}else{

		redirect("index.php");

	}
}else{
	echo validation_errors("Select your service");
}

}else{
	echo validation_errors("Account activation under processing");
}


}else{
	echo validation_errors("The mobile number you have entered is already registered");
}

	}else{
		echo validation_errors("Please enter a valid mobile number");
	}

	}else{
		echo validation_errors("Please enter a mobile number");
	}
	}
}



	if(isset($_POST['cancel'])) {

		unset($_SESSION['mob_no']);
		unset($_SESSION['service']);
		unset($_SESSION['mb_otp']);
		setcookie('temp_access_v_code', $v_code, time() - 180);

		redirect("index.php");
}

 	}// end of function
// ============================== End Signup function ======================================





/**==========================-----Code validation-----===========================**/

function mobile_otp_validation() {

	if(isset($_COOKIE['temp_access_v_code'])) {

		if(!isset($_GET['mob_no']) && !isset($_GET['o_code'])){

			redirect("k_p_errors.php");

				}else if (empty($_GET['mob_no']) || empty($_GET['o_code'])) {

					redirect("k_p_errors.php");

				}else{
						if (isset($_POST['mobile_otp']) && isset($_GET['mob_no'])) {
						$mobile_no = clean($_GET['mob_no']);
						$mobile_no  = decode($mobile_no);
						$o_code = clean($_GET['o_code']);
						$o_code = decode($o_code);
						$vali_code = clean($_POST['mobile_otp']);


						if (isset($_SESSION['mb_no']) && isset($_SESSION['mb_otp'])) {
							$mb_no = $_SESSION['mb_no'];
							$otp_cd = $_SESSION["mb_otp"];


						if(empty($vali_code)) {
							echo validation_errors("Empty field are not allowed");
						}else{


						if(($otp_cd == $vali_code) && ($mobile_no == $mb_no) && ($o_code == $vali_code) ){

							setcookie('temp_access_v_code', $v_code, time() - 180);
							setcookie('temp_access_vali_code', $vali_code, time() + 180);


							redirect("k_p_reg.php");

						}else{
							echo validation_errors("Sorry worng validation code");
							}
						 }
						}else{
							redirect("k_p_errors.php");
						}
					}
				}
			}else{

				echo validation_errors("Validation expired");
				redirect("k_p_errors.php");
		}



	if(isset($_POST['cancel'])) {

		unset($_SESSION['mob_no']);
		unset($_SESSION['service']);
		unset($_SESSION['mb_otp']);
		setcookie('temp_access_code', $v_code, time() - 180);

		redirect("index.php");
}

	} //end of function

// ========================   End function   =============================






/*****************-----Registation function-----********************/

function email_reg() {

if(isset($_COOKIE['temp_access_vali_code'])) {

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['submit_reg'])) {

		
			$firstname 		= clean($_POST['firstname']);
			$lastname  		= clean($_POST['lastname']);
			$gender			= clean($_POST['gender']);
			$birthday		= clean($_POST['birthday']);
			$email     		= clean($_POST['email']);
			$city      		= clean($_POST['city']);
			$password  		= clean($_POST['password']);
			$conf_password 	= clean($_POST['conf_password']);

if(empty($firstname) && empty($lastname) && empty($gender) && empty($email) && empty($city) && empty($password) && empty($conf_password)){
	echo validation_errors("Empty are not allowed");
}else{

 if(empty($firstname)) {
		echo validation_errors("Enter first name");
	}elseif (empty($lastname)) {
		echo validation_errors("Enter last name");
	}elseif (empty($email)) {
		echo validation_errors("Enter email address");
	}elseif (empty($city)) {
		echo validation_errors("Enter city");
	}elseif (empty($password)) {
		echo validation_errors("Enter password");
	}elseif (empty($conf_password)) {
		echo validation_errors("Enter confirm password");
	}
		else{

		 if($password !== $conf_password){
		 	echo validation_errors("Password does not match");
		 }else{

			 if(!email_exists($email)){

		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$validation_code =mt_rand(1000,9999);

			$_SESSION["kp_email"]=$email;
			$_SESSION["kp_otp"] = $validation_code;
			$_SESSION["kp_firstname"]=$firstname;
			$_SESSION["kp_lastname"]=$lastname;
			$_SESSION["kp_gender"]=$gender;
			$_SESSION["kp_birthday"]=$birthday;
			$_SESSION["kp_city"]=$city;
			$_SESSION["kp_password"]=$password;



$date_print = date("l jS, F  Y");




require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'onlinesms4you@gmail.com';                 // SMTP username
$mail->Password = 'mou721445';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$mail->setFrom('onlinesms4you@gmail.com', 'Kalpataru Professional');
$mail->addAddress($email);
$mail->addReplyTo('no-reply@gmail.com', 'Np-reply');

$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Welcome to Kalpataru Professional';
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
                                                                     <h1 style='padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px'>Welcome to Kalpataru Professional</h1>
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
                                                                     <h3 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;' class='title-color'>Hi  $firstname,</h3>
                                                                     <h5 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 12px; line-height: 24px; text-align: center;' class='title-color'>Your one-time password (OTP) is: $validation_code</h5>
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
</html>
";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}






	// $mailID = encode($email);
	// $code = encode($validation_code);
	$email_otp_code = $validation_code;
	setcookie('temp_access_vali_code', $vali_code, time() - 180);
	setcookie('temp_access_email_otp_code', $email_otp_code, time() + 180);
    // redirect("k_p_code-email.php?email_add=$email&code_o=$email_otp_code&OTP=$validation_code");
    $email_id = encode($email);
    $otp_code = encode($email_otp_code); 
    
    redirect("k_p_code-email.php?email_add=$email_id&code_o= $otp_code&OTP=$validation_code");

	}else{

		redirect("index.php");

	}
	}else{
		echo validation_errors("The email address you have entered is already registered");
	}

	}
}
	}
}

	if(isset($_POST['cancel'])) {

		unset($_SESSION['mb_no']);
		unset($_SESSION['service']);
		unset($_SESSION['kp_email']);
		unset($_SESSION['kp_firstname']);
		unset($_SESSION['kp_lastname']);
		unset($_SESSION['kp_gander']);
		unset($_SESSION['kp_city']);
		unset($_SESSION['kp_password']);

		setcookie('temp_access_email_otp_code', $email_otp_code, time() - 180);

		redirect("index.php");
	}

}  //Server request end

}else{

	echo validation_errors("Session expired");
	redirect("k_p_errors.php");
}

 	}			 // end of function

// ===================================== End function =========================================




// ==================================== Validation of email OTP ======================================

function email_otp_validation() {

	if(isset($_COOKIE['temp_access_email_otp_code'])) {

		if(!isset($_GET['email_add']) && !isset($_GET['code_o'])){

			redirect("k_p_errors.php");

				}else if (empty($_GET['email_add']) || empty($_GET['code_o'])) {

					redirect("k_p_errors.php");

				}else{
						if (isset($_POST['email_otp']) && isset($_GET['email_add'])) {
						$email_address = clean($_GET['email_add']);
						$email_address = decode($email_address);
						$code_o = clean($_GET['code_o']);
						$code_o = decode($code_o);
						$vali_code = clean($_POST['email_otp']);


						if (isset($_SESSION['kp_email']) && isset($_SESSION['kp_otp'])) {
							$email_id = $_SESSION['kp_email'];
							$kp_otp = $_SESSION["kp_otp"];

						if(empty($vali_code)) {
							echo validation_errors("Empty field are not allowed");
						}else{

						if(($kp_otp == $vali_code) && ($email_address == $email_id) && ($vali_code == $kp_otp) ){

							setcookie('temp_access_email_otp_code', $email_otp_code, time() - 180);
							setcookie('temp_access_vali_code_email', $vali_code, time() + 180);


							$email_address = encode($email_address);
							$kp_otp		   = encode($kp_otp);

							redirect("k_p_register.php?email_add=$email_address&code_o=$kp_otp");

						}else{
							echo validation_errors("Sorry worng validation code");
							}
						}

						}
					}
				}
			}else{

			echo validation_errors("Session expired");
			redirect("k_p_errors.php");
		}



	if(isset($_POST['cancel'])) {

		unset($_SESSION['mb_no']);
		unset($_SESSION['service']);
		unset($_SESSION['kp_email']);
		unset($_SESSION['kp_firstname']);
		unset($_SESSION['kp_lastname']);
		unset($_SESSION['kp_gender']);
		unset($_SESSION['kp_birthday']);
		unset($_SESSION['kp_city']);
		unset($_SESSION['kp_password']);

		setcookie('temp_access_email_otp_code', $email_otp_code, time() - 180);

		redirect("index.php");
}

	} //end of function

// ========================   End function   =============================







/************** Username Genetator ***************/
function employee_ID($service){

	$service = mb_substr($service, 0, 1);

	date_default_timezone_set("Asia/Kolkata");
	$to_day = date("Y-m-d");

	$today = date("dmy");

	$d=$today;
	$date = "KT".$d."$service";


	$sql="SELECT *	FROM employee_request ORDER BY id DESC";

	$result = query($sql);
	confirm($result);
	$row=fetch_array($result);

	$db_Date = $row['date_time'];
	$db_useID = $row['emp_id'];

	$userID = substr($db_useID, 9);



		if ($db_Date == $to_day ) {

			$u_ID = $userID+1;

			$u_ID = sprintf("%'.03d\n",$u_ID);

			$username = $date.$u_ID;

			return $username;


		}else{

			$n= 1;
			$num = sprintf("%'.03d\n",$n);
			$username = $date.$num;
 			return $username;

		}

}/*function end*/
/*---------------------------------------------------*/






// ===================== Complete Registration ===========================
function complete_registration() {

	if(isset($_COOKIE['temp_access_vali_code_email'])) {

	if($_SERVER['REQUEST_METHOD'] == "POST"){

			$card          = clean($_POST['card']);
			$card_no       = clean($_POST['card_no']);
			$qualification = clean($_POST['qualification']);
			$reg_no        = clean($_POST['reg_no']);
			$about         = clean($_POST['about']);
			
			$image1 = $_FILES['c_img_f']['name'];
			$image2 = $_FILES['c_img_b']['name'];
			$image3 = $_FILES['q_img_f']['name'];
			$image4 = $_FILES['q_img_b']['name'];
			$image5 = $_FILES['p_img_1']['name'];
			$image6 = $_FILES['p_img_2']['name'];
			$image7 = $_FILES['p_img_3']['name'];
			$image8 = $_FILES['p_img_4']['name'];


			if(empty($card) || empty($card_no) || empty($qualification) || empty($reg_no) || empty($about) || empty($image1) || empty($image2)  || empty($image3) || empty($image4) || empty($image5) || empty($image6) || empty($image7) || empty($image8)){

				echo validation_errors("Empty are not allowed");

			}else{

			$mobile = $_SESSION["mb_no"];
			$service = $_SESSION["service"];
			$email = $_SESSION["kp_email"];
			$firstname = $_SESSION["kp_firstname"];
			$lastname = $_SESSION["kp_lastname"];
			$gender = $_SESSION["kp_gender"];
			$birthday = $_SESSION["kp_birthday"];
			$city = $_SESSION["kp_city"];
			$password = $_SESSION["kp_password"];

			/*$employee_id = employee_ID($service);*/
			$employee_id = 0;
			$emp_id = preg_replace('/\s+/', ' ', $employee_id);

			date_default_timezone_set('Asia/Kolkata');
    		$date = date('Y-m-d H:i:s');

			date_default_timezone_set("Asia/Kolkata");
			$today = date("Y-m-d");

			$password =$_SESSION["kp_password"];
			$password = md5($password);


			/*image one insert*/
 			$image_name=$_FILES['c_img_f']['name'];
       		$temp = explode(".", $image_name);
        	$newfilename = md5 (uniqid(mt_rand(),true)) . '.' . end($temp);
       		$imagepath="uploads/".$newfilename;
     		move_uploaded_file($_FILES["c_img_f"]["tmp_name"],$imagepath);

     		/*image one insert*/
 			$image_name1=$_FILES['c_img_b']['name'];
       		$temp1 = explode(".", $image_name1);
        	$newfilename1 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp1);
       		$imagepath1="uploads/".$newfilename1;
     		move_uploaded_file($_FILES["c_img_b"]["tmp_name"],$imagepath1);

     		/*image one insert*/
 			$image_name2=$_FILES['q_img_f']['name'];
       		$temp2 = explode(".", $image_name2);
        	$newfilename2 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp2);
       		$imagepath2="uploads/".$newfilename2;
     		move_uploaded_file($_FILES["q_img_f"]["tmp_name"],$imagepath2);

     		/*image one insert*/
 			$image_name3=$_FILES['q_img_b']['name'];
       		$temp3 = explode(".", $image_name3);
        	$newfilename3 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp3);
       		$imagepath3 = "uploads/".$newfilename3;
     		move_uploaded_file($_FILES["q_img_b"]["tmp_name"],$imagepath3);

     		/*image one insert*/
 			$image_name4 = $_FILES['p_img_1']['name'];
       		$temp4 = explode(".", $image_name4);
        	$newfilename4 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp4);
       		$imagepath4 = "uploads/".$newfilename4;
     		move_uploaded_file($_FILES["p_img_1"]["tmp_name"],$imagepath4);

     		/*image one insert*/
 			$image_name5 = $_FILES['p_img_2']['name'];
       		$temp5 = explode(".", $image_name5);
        	$newfilename5 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp5);
       		$imagepath5 = "uploads/".$newfilename5;
     		move_uploaded_file($_FILES["p_img_2"]["tmp_name"],$imagepath5);

     		/*image one insert*/
 			$image_name6 = $_FILES['p_img_3']['name'];
       		$temp6 = explode(".", $image_name6);
        	$newfilename6 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp6);
       		$imagepath6 = "uploads/".$newfilename6;
     		move_uploaded_file($_FILES["p_img_3"]["tmp_name"],$imagepath6);

     		/*image one insert*/
 			$image_name7 = $_FILES['p_img_4']['name'];
       		$temp7 = explode(".", $image_name7);
        	$newfilename7 = md5 (uniqid(mt_rand(),true)) . '.' . end($temp7);
       		$imagepath7 ="uploads/".$newfilename7;
     		move_uploaded_file($_FILES["p_img_4"]["tmp_name"],$imagepath7);


			$sql = "INSERT INTO employee_request(service_id, city_id, gender_id, qualification_id, identity_id, emp_id, first_name, last_name, birthday, mobile_no, email, card_no, card_img_f, card_img_b, reg_no, q_img_f, q_img_b, p_img_1, p_img_2, p_img_3, p_img_4, about, approve, apply_date_time, date_time, password)";

			$sql.= "VALUES('$service','$city','$gender','$qualification','$card','$emp_id','$firstname','$lastname','$birthday','$mobile','$email','$card_no','$newfilename','$newfilename1','$reg_no','$newfilename2','$newfilename3','$newfilename4','$newfilename5','$newfilename6','$newfilename7','$about','0','$date','$today','$password')";



			$result1=query($sql);
			confirm($result1);

			unset($_SESSION['mb_no']);
			unset($_SESSION['service']);
			unset($_SESSION['kp_email']);
			unset($_SESSION['kp_firstname']);
			unset($_SESSION['kp_lastname']);
			unset($_SESSION['kp_city']);
			unset($_SESSION['kp_password']);

			setcookie('temp_access_vali_code_email', $vali_code, time() - 180);
			redirect("index.php");
			          echo '<script>
    setTimeout(function() {
        swal({
            title: "Wow!",
            text: "Message!",
            type: "success"
        }, function() {
            window.location = "redirectURL";
        });
    }, 1000);
</script>';
		}


if(isset($_POST['cancel'])) {

		unset($_SESSION['mb_no']);
		unset($_SESSION['service']);
		unset($_SESSION['kp_email']);
		unset($_SESSION['kp_firstname']);
		unset($_SESSION['kp_lastname']);
		unset($_SESSION['kp_city']);
		unset($_SESSION['kp_password']);

		redirect("index.php");
	}

}
}else{

	echo validation_errors("Session expired");
	redirect("k_p_errors.php");
}

}

/***************username_exists  exists function*******************/

function username_exists($username) {

	$sql="SELECT id FROM employee WHERE emp_id = '$username'";

	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else{

		return false;
	}

}/*end function */
/*----------------------------------------------------------------------*/

/*****************-----Validate user login function-----********************/


function validate_user_login() {


if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['signIn'])){
	$username	  	 =clean($_POST['username']);
	$password  		 =clean($_POST['password']);
	$remember 		 = isset($_POST['remember']);


	if(empty($username) && empty($password)) {
		$errors[]="Please enter a username and a password";
	}

	if(empty($username) && !empty($password)) {

	$errors[]="Email field cannot be empty";

	}

	if(!empty($username) && empty($password)) {

	$errors[]="Password field cannot be empty";

	}



	if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{


if(username_exists($username)){
	/*if(login_details_exits($email)){*/
	if(login_user($username, $password, $remember)) {

/*set_message("<div class='alert alert-success'>
     Welcome <strong>$_SESSION[email]</strong> you have successfully logged in!</div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2000);
	</script>
    ");*/

		redirect("k_p_task_list.php");

	} else {

	echo validation_errors("Password does not match");
}
/*}else{

	 echo validation_errors("Please active your account");
}*/
}else{

    echo validation_errors("Username provided is not on recognised");
}
}

	}
} // function 
}

/*****************-----User login function-----********************/

function login_user($username,$password,$remember) {

 $sql = "SELECT * FROM employee WHERE emp_id = '$username' ";
$result = query($sql);
if(row_count($result) == 1) {

$row = fetch_array($result);
$db_password = $row['password'];

	if(md5($password) === $db_password){

		if($remember == "on") {
		setcookie('username',$username,time() + 86400);
	}

		$_SESSION['username'] = $username;

		return true;
	}else{
		return false;
	}
return true;
}else{
return false;
}
}	// end of function


/*****************-----logged in function-----********************/

function logged_in_KP() {
	if(isset($_SESSION['username']) || isset ($_COOKIE['username'])) {

		return true;

	}else{

		return false;
	}
}	/// end of function




//************************Random Validation code generate***************************/
//**********************************************************************************/

function randomCode() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}




/*****************-----Recover password function-----********************/

function recover_password() {

	if(isset($_POST['reset'])){

		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$email = clean($_POST['email']);

		if (!empty($_POST["email"])) {

		if(emp_email_exists($email)) {

			$validation_code =	randomCode();
		/*	$validation_code = md5($email . microtime());*/

		setcookie('temp_access_code', $validation_code, time() + 900);

$sql = "UPDATE employee SET validation_code ='".escape($validation_code)."'WHERE email ='".escape($email)."' ";

	$result = query($sql);
	confirm($result);


$date_print = date("l jS, F  Y");



require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'onlinesms4you@gmail.com';                 // SMTP username
$mail->Password = 'mou721445';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$mail->setFrom('onlinesms4you@gmail.com', 'Kalpataru Professional');
$mail->addAddress($email);
$mail->addReplyTo('no-reply@gmail.com', 'Np-reply');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Kalpataru Professional Account - "' .$validation_code. '" is your verification code for secure access';
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
                                                                     <h1 style='padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px'>Kalpataru Professional</h1>
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
                                                                     <h3 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;' class='title-color'>Hi,<br/>Greetings!</h3>
                                                                   
                                                                     <p style='margin: 20px 0 30px 0;font-size: 15px;text-align: center;'>You are just a step away from accessing your Kalpataru account<br/><br/>


We are sharing a verification code to access your account. The code is valid for 5 minutes and usable only once.

<br/><br/>
Once you have verified the code, you'll be prompted to set a new password immediately. This is to ensure that only you have access to your account.

</p>
  <h5 style='font-weight: 600; padding: 0px; margin: 0px; font-size: 12px; line-height: 24px; text-align: center;' class='title-color'>Your one-time password (OTP) is: $validation_code <br/> Expires in: 5 minutes only

</h5>
                                                                     <div style='font-weight: 200; text-align: center; margin: 25px;'><a href='localhost/kalpataru/k-professional/k_p_code.php?email=$email&code=$validation_code' style='padding:0.6em 1em;border-radius:600px;color:#ffffff;font-size:14px;text-decoration:none;font-weight:bold' class='button-color'>Click here to reset your password</a></div>
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
</html>
";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}






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
				redirect("index.php");
 
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

	if(isset($_POST['cancel_submit'])) {

		redirect("login.php");

	}
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
						$sql = "SELECT id FROM employee WHERE validation_code = '".escape($validation_code)."' AND email = '".escape($email)."'";

						$result=query($sql);


						if(row_count($result)==1) {

							setcookie('temp_access_code', $validation_code, time() + 300);

							redirect("k_p_resetPassword.php?email=$email&code=$validation_code");

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
			redirect("k_p_recover.php");
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

					$sql = "UPDATE employee SET password ='".escape($updated_password)."',validation_code = 0 WHERE email = '".escape($_GET['email'])."'";

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



					redirect("k_p_login.php");
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





/***********--------------Contact function-------------*************/

function validate_contact(){

	$errors=[];
	$min = 3;
	$max = 30;

if($_SERVER['REQUEST_METHOD']=="POST"){

	$name	     =clean($_POST['name']);
	$email	     =clean($_POST['email']);
	$subject     =clean($_POST['subject']);
    $mobile_no   =clean($_POST['phone_number']);
    $message     =clean($_POST['message']);


 // email validation
if(strlen($email) < $min) {
    $errors[]="Your email cannot be less than {$min} characters";
}

if (strlen($email) > 30 ) {
    $errors[]="Your email cannot be more than 30 characters";
}

if(!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/",$email)) {
    $errors[]="Invalid email address";
}//end of email address validation

// mobile number validation
if(strlen($mobile_no) < 10) {
    $errors[]="Your mobile number cannot be less than 10 number";
}

if (strlen($mobile_no) > 13 ) {
    $errors[]="Your mobile number cannot be more than 13 number";
}

if(!preg_match("/^[0-9]{10}+$/",$mobile_no)) {
    $errors[]="Invalid mobile number";
}

if(strlen($subject) < $min) {
    $errors[]="Your subject name cannot be less than {$min} characters";
}

if (strlen($subject) > $max ) {
    $errors[]="Your subject name cannot be more than {$max} characters";
}

if(!preg_match("/[a-zA-Z'-]/",$subject)) {
    $errors[]="Invalid subject name";
} //end of name validaton


if(strlen($subject) < $min) {
    $errors[]="Your message cannot be less than {$min} characters";
}

if (strlen($message) > 700) {
    $errors[]="Your message name cannot be more than 700 characters";
}

if(!preg_match("/[a-zA-Z'-]/",$message)) {
    $errors[]="Invalid message";
} //message validaton




    if(!empty($errors)) {

	foreach ($errors as $error) {

	echo validation_errors($error);

	}
}else{
	if(insert_message($name,$email,$subject,$mobile_no,$message)){

		set_message("<div class='alert alert-success  text-center'><strong>Thank you!</strong> Your message has been sent successfully</div>
			<script type='text/javascript'>
    		window.setTimeout(function() {
    			$('.alert').fadeTo(500, 0).slideUp(500, function(){
        			$(this).remove();
    			});
			}, 5000);
			</script>");

		redirect("k_p_contacts.php");
		}else{
		set_message("<div class='alert alert-danger'  text-center'><strong>Sorry</strong>, your message could not be sent </div>");

		redirect("k_p_contacts.php");

		}
	}
  }
}   //End Function




/***********----- Insert contact message-----***************/

function insert_message($name,$email,$subject,$mobile_no,$message) {

	$name = escape($name);
	$email = escape($email);
	$mobile_no= escape($mobile_no);
	$subject = escape($subject);
    $message = escape($message);

    date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d H:i:s');

$sql = "INSERT INTO messages(fullname,email,subject,mobile,message,date_time)";

$sql.="VALUES('$name','$email','$subject','$mobile_no','$message','$date')";

	$result=query($sql);
	confirm($result);

	return true;
}   //  End Function



/*================Change Password==================*/

function checkoldpassword() {
	$sql = "SELECT * FROM employee WHERE emp_id = '{$_SESSION['username']}'";
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

	if(isset($_POST['submit_password'])){

		$current_password	=clean($_POST['current_password']);
		$password	     	=clean($_POST['password']);
		$confirm_password	=clean($_POST['confirm_password']);

		if(empty($current_password) || empty($password) || empty($confirm_password)) {
			$errors[]="Empty are not allowed";
		}else{

			if(strlen($password) < $min) {
    			$errors[]="Your password cannot be less than {$min} characters";
			}

			if(strlen($confirm_password) > $max) {
    			$errors[]="Your password cannot be more than {$max} characters";
			}
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


				redirect("k_p_edit_profile.php");

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

				redirect("k_p_edit_profile.php");

			}
		}
	}
}
}


function change_password($current_password,$password,$confirm_password){

	$current_password  		= escape($current_password);
	$password    			= escape($password);
	$confirm_password		= escape($confirm_password);

    $sql = "SELECT * FROM employee WHERE emp_id = '{$_SESSION['username']}' ";
    $result = query($sql);
    if(row_count($result) == 1) {

        $row = fetch_array($result);
        $db_pass = $row['password'];

	if(md5($current_password) === $db_pass){
        $password = md5($password);

    $sql2 = "UPDATE employee SET password ='$password' WHERE emp_id = '{$_SESSION['username']}' ";

		$result2 = query($sql2);
		confirm($result2);

            return true;

    }else{
            return false;
    }

		}

}


/*================End Change Password==============*/



/*================ Exits Password Check ===========*/
function exits_password($pass) {
	$sql = "SELECT * FROM employee WHERE emp_id = '{$_SESSION['username']}' AND password = '$pass'";
	$result = query($sql);
	if(row_count($result) == 1) {
		
		return true;
	}else{
	 	return false;
	}
}

/*================ End of the function ============*/


/*================ Udate About ====================*/

function update_About() {
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['submit_about'])){

		$about		=clean($_POST['about']);
		$password	=clean($_POST['password']);
			if(empty($about) || empty($password)) {
				$errors[]="Empty are not allowed";
			}
			
			if(!empty($errors)) {

				foreach ($errors as $error) {

					echo validation_errors($error);

				}
			}else{
				if(About_update($about,$password)){
					set_message("<div class='alert alert-success'>
					<strong>About</strong> has been changed.</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_edit_profile.php");
				}else{
					set_message("<div class='alert alert-danger'>
					Password doesn't match</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_edit_profile.php");

				}

			}
		}
	}
}

function About_update($about,$password){
	$about  	= escape($about);
	$password   = escape($password);
	$password 	= md5($password);
	if(exits_password($password)){

		$sql2 = "UPDATE employee SET about ='$about' WHERE emp_id = '{$_SESSION['username']}' ";

		$result2 = query($sql2);
		confirm($result2);

		return true;

	}else{

		return false;

	}
}
/*================ End Update About ================*/

/*================ Profile Picture Change ================*/
function upadte_picture() {
	if(isset($_POST['submit_picture'])) {
		if($_SERVER['REQUEST_METHOD']=="POST") {
			$password = clean($_POST['password']);
			$profile_picture = $_FILES['profile_picture']['name'];

			if(empty($password)  || empty($profile_picture)){
				$errors[] = "Empty are not allowed";
			}
			if(!empty($errors)) {

				foreach ($errors as $error) {
					echo validation_errors($error);
				}
			}else{

				if(picture_update($profile_picture,$password)){
					set_message("<div class='alert alert-success'>
					<strong>Profile picture</strong> has been changed.</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_edit_profile.php");
				}else{
					set_message("<div class='alert alert-danger'>
					Password doesn't match....</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_edit_profile.php");

				}
			}
		}
	}
}
function picture_update($profile_picture,$password){
	
	$password = escape($password);
	$password =md5($password);
	if(exits_password($password)){

	$profile_picture = $_FILES['profile_picture']['name'];
	$temp = explode(".", $profile_picture);
	$newfilename = md5 (uniqid(mt_rand(),true)) . '.' . end($temp);
	$imagepath="uploads/profilePicture/".$newfilename;
	move_uploaded_file($_FILES["profile_picture"]["tmp_name"],$imagepath);

		$sql2 = "UPDATE employee SET profile_picture ='$newfilename' WHERE emp_id = '{$_SESSION['username']}' ";

		$result2 = query($sql2);
		confirm($result2);
return true;
		return true;
	}else{
		return false;
	}
}
/*================ End Profile Picture Change ============*/

/*================= Service time duration ===============*/
function working_duration() {
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['submit'])){

		$hours		=clean($_POST['hours']);
		$o_id	=clean($_POST['o_id']);
			if(empty($hours) || empty($o_id)) {
				$errors[]="Empty are not allowed";
			}
			
			if(!empty($errors)) {

				foreach ($errors as $error) {

					echo validation_errors($error);

				}
			}else{
				if(duration_working($hours,$o_id)){
					set_message("<div class='alert alert-success'>
					<strong>About</strong> has been changed.</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_working_history.php");
				}else{
					set_message("<div class='alert alert-danger'>
					Password doesn't match</div>
					<script type='text/javascript'>
					window.setTimeout(function() {
					$('.alert').fadeTo(500, 0).slideUp(500, function(){
					$(this).remove();
					});
					}, 5000);
					</script>
					");
					redirect("k_p_working_history.php");

				}

			}
		}
	}
}

function duration_working($hours,$o_id){
	$hours  	= escape($hours);
	$o_id   	= escape($o_id);


		$sql2 = "UPDATE orders SET working_duration ='$hours' WHERE id = '$o_id' ";

		$result2 = query($sql2);
		confirm($result2);

		return true;

}
/*=======================================================*/









?>
