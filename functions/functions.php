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

<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<strong>Warning!</strong> $error_message;
</div>
<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);
</script>
DELIMITER;

return $error_message;
}


/***************User semail exists function*******************/

function email_exists($email) {

	$sql="SELECT id FROM users WHERE email = '$email'";

	$result = query($sql);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}




/*Check register or not*/
function number_exists($m_number) {

	$sqlM_no="SELECT id FROM users WHERE mobile_no = '$m_number'";

	$result = query($sqlM_no);

if(row_count($result) == 1) {

	return true;

}else{

	return false;
	}

}



/*Encription and decription of url*/

/*function base64_url_encode($input) {
 return strtr(base64_encode($input), '+/=', '._-');
}

function base64_url_decode($input) {
 return base64_decode(strtr($input, '._-', '+/='));
}*/



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



/*****************-----Login Sign Up function-----********************/

function LoginSignUp() {

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['otp'])) {
		$m_number=clean($_POST['mobileNumber']);


	if(!empty($m_number)) {


		if(validate_phone_number($m_number) && strlen($m_number)==10){


		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$mobileNumber = clean($_POST['mobileNumber']);
			$_SESSION["mobileNumber"]=$mobileNumber;

			$validation_code =mt_rand(1000,9999);
			$_SESSION["code"] = $validation_code;






if(isset($_POST['otp'])) {

  $textMessage="Your Kalpataru OTP is: " . $validation_code . " . " . "Note: Please DO NOT SHARE this OTP with anyone.";
  $mobileNumber = $_POST["mobileNumber"];

  // $apiKey = urlencode('aJ0P6F8n4o4-XvHDiHwzqelyjJ4aP0xQVjFjAChKzv');


// $apiKey = urlencode('eCrNnIFRJzA-3TFJXByn4ZtPmSUqklYc1T7iZob7Hb'); //subhasish

  // Message details
  $numbers = array($mobileNumber);
  $sender = urlencode('TXTLCL');
  $message = rawurlencode($textMessage);
  
  $numbers = implode(',', $numbers);

  // Prepare data for POST request
  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

  // Send the POST request with cURL
  $ch = curl_init('https://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);   
  // Process your response here
  echo $response;

}  



		setcookie('temp_access_code', $validation_code, time() + 120);

$url_mob=encode($mobileNumber);
$url_code=encode($validation_code);

    redirect("code-mobile.php?m_no=$url_mob&code=$url_code&otp=$validation_code");

	}else{

		redirect("index.php");

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
		unset($_SESSION['mobileNumber']);
		redirect("index.php");
}

 	}			 // end of function




/*****************-----Code validation-----********************/

function VerifyOtp() {

	if(isset($_COOKIE['temp_access_code'])) {

		if(!isset($_GET['m_no']) && !isset($_GET['code'])){

			redirect("errors.php");

				}else if (empty($_GET['m_no']) || empty($_GET['code'])) {

					redirect("errors.php");

				}else{
						if (isset($_POST['otp_code']) && isset($_GET['m_no'])) {
						$mobile_no = decode(clean($_GET['m_no']));
						$code = clean($_GET['code']);
						$validation_code = clean($_POST['otp_code']);


						if (isset($_SESSION['mobileNumber']) && isset($_SESSION['code'])) {
							$mobileNumber = $_SESSION['mobileNumber'];
							$sess_code = $_SESSION["code"];


						if(($sess_code == $validation_code) && ($mobileNumber == $mobile_no)){
							setcookie('temp_access_code', $validation_code, time() + 60);


						if (isset($_SESSION['mobileNumber'])){
							$mobileNumber = $_SESSION['mobileNumber'];

							if(!number_exists($mobileNumber)){
								redirect("register.php");
							}else{

								$_SESSION['mobile'] = $mobileNumber;

								setcookie('mobile',$mobileNumber,time() + 86400);

								redirect("index.php");
							}
						}else{
							redirect("aboutus.php");
						}

						}else{
							echo validation_errors("Sorry worng validation code");
							}
						}
					}
				}
			}else{
						/*set_message("<div class='alert alert-danger'>
    <strong>Warning!</strong> Sorry your validation cookie was expired </div>
	<script type='text/javascript'>
    window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
	}, 2500);
	</script>
    ");*/
			redirect("errors.php");
		}



	if(isset($_POST['cancel'])) {
		unset($_SESSION['mobileNumber']);
		redirect("index.php");
}

	} //end of function






/*--------------  Check Loged in or not  ----------------*/
function loggedIn() {
	if(isset($_SESSION['mobile']) || isset ($_COOKIE['mobile'])) {

		return true;

	}else{

		return false;
	}
}	/// end of function




/*****************-----Registation function-----********************/

function RegisterWithEmail() {

if(isset($_COOKIE['temp_access_code'])) {
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['signUp'])) {
		$fullname = clean($_POST['fullname']);
		$email = clean($_POST['email']);


	if(!empty($email)) {

		if(!empty($fullname)){

			if(!email_exists($email)){

		if(isset($_SESSION['token_email']) && $_POST['token_email'] === $_SESSION['token_email']) {

			$fullname = clean($_POST['fullname']);
			$_SESSION["fullname"]=$fullname;
			$_SESSION["email"]=$email;




			$validation_code =mt_rand(1000,9999);
			$_SESSION["code"] = $validation_code;



			$mailID = encode($email);
			$code = encode($validation_code);


require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'onlinesms4you@gmail.com';                 // SMTP username
$mail->Password = 'mou721445';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('onlinesms4you@gmail.com', 'Kalpataru');
$mail->addAddress($email);
$mail->addReplyTo('no-reply@gmail.com', 'Np-reply');

$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'OTP for Kalpataru login';

$mail->Body = "
<html>
<head>
<style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */

      /*All the styling goes here*/

      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%;
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top;
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%;
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px;
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px;
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%;
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px;
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%;
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px;
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize;
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px;
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px;
      }

      a {
        color: #3498db;
        text-decoration: underline;
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto;
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center;
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize;
      }

      .btn-primary table td {
        background-color: #3498db;
      }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff;
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0;
      }

      .first {
        margin-top: 0;
      }

      .align-center {
        text-align: center;
      }

      .align-right {
        text-align: right;
      }

      .align-left {
        text-align: left;
      }

      .clear {
        clear: both;
      }

      .mt0 {
        margin-top: 0;
      }

      .mb0 {
        margin-bottom: 0;
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0;
      }

      .powered-by a {
        text-decoration: none;
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0;
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important;
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important;
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important;
        }
        table[class=body] .content {
          padding: 0 !important;
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important;
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important;
        }
        table[class=body] .btn table {
          width: 100% !important;
        }
        table[class=body] .btn a {
          width: 100% !important;
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important;
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important;
        }
        .btn-primary table td:hover {
          background-color: #34495e !important;
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important;
        }
      }

    </style>
  </head>
  <body class=''>
    <span class='preheader'>This is preheader text. Some clients will show this text as a preview.</span>
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <table role='presentation' class='main'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <p>Hi $fullname,</p>
                        <p>You are just a step away from accessing your <b>Kalpataru</b> account</p>
												<p>We are sharing a verification code to access your account. The code is valid for 2 minutes and usable only once.</p>
												</p>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                          <tbody>
                            <tr>
                              <td align='left'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                  <tbody>
                                    <tr>
                                      <td> <a href='localhost/kalpataru/code-email.php?email=$mailID&code=$code&OTP=$validation_code' target='_blank'>Enter Code</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Once you have verified the code, you'll be prompted to create a new account. This is to ensure that only you have access to your account.</p>
                        <p>Your OTP: <mark style:background-color:tellow; color:black;><b>$validation_code</b></mark> </p>
												<p>Expires in: 2 minutes only</p>
												<p>Best Regards,</p>
												<p>Team Kalpataru</p>

                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class='footer'>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td class='content-block'>
                    <span class='apple-link'>Kalpataru,Fuljhore Road, Fuljhore, Durgapur, West Bengal 713206</span>
                    <br> Don't like these emails? <a href='#'>Unsubscribe</a>.
                  </td>
                </tr>
                <tr>
                  <td class='content-block powered-by'>
                    Powered by <a href='localhost/kalpataru/index.php'>Kalpataru</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
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


    redirect("code-email.php?email=$mailID&code=$code&OTP=$validation_code");

	}else{

		redirect("index.php");

	}
	}else{
		echo validation_errors("The email address you have entered is already registered");
	}
	}else{
		echo validation_errors("Please enter you full name");
	}
	}else{
		echo validation_errors("Please enter your email address");
	}

	}


	if(isset($_POST['cancel'])) {
		unset($_SESSION['mobileNumber']);
		redirect("index.php");
	}

}  //Server request end
}else{
	redirect("login.php");
}

 	}			 // end of function






/*--------**** Token Generator ****----------*/

function token_email_generator(){

	$token= $_SESSION['token_email'] = md5 (uniqid(mt_rand(),true));

	return $token;
}



/************** Username Genetator ***************/
function userName(){

date_default_timezone_set("Asia/Kolkata");
$to_day = date("Y-m-d");

$today = date("dmy");

$d=$today;
$date = "KT".$d;


$sql="SELECT *	FROM users ORDER BY id DESC";

	$result = query($sql);
	confirm($result);
	$row=fetch_array($result);

	$db_Date = $row['date_time'];
	$db_useID = $row['user_id'];

	$userID = substr($db_useID, 8);



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
}





/*****************-----Email OTP  validation-----********************/

function VerifyEmailOtp() {

	if(isset($_COOKIE['temp_access_code'])) {

		if(!isset($_GET['email']) && !isset($_GET['code'])){

			redirect("index.php");

				}else if (empty($_GET['email']) || empty($_GET['code'])) {

					redirect("index.php");

				}else{
						if (isset($_POST['otp_email']) && isset($_GET['email'])) {
						$email = clean(decode($_GET['email']));
						$code = clean(decode($_GET['code']));
						$validation_code = clean($_POST['otp_code']);


						if (isset($_SESSION['email']) && isset($_SESSION['code'])) {
							$ses_email = $_SESSION['email'];
							$sess_code = $_SESSION["code"];


						if(($sess_code == $validation_code) && ($ses_email == $email)){

						$fullname = $_SESSION["fullname"];
						$email = $_SESSION["email"];
						$mobileNumber = $_SESSION["mobileNumber"];

						$userName = userName();

						date_default_timezone_set("Asia/Kolkata");
						$today = date("Y-m-d");


							$sql = "INSERT INTO users(user_id,fullname,email,mobile_no,date_time)";

							$sql.="VALUES('$userName','$fullname','$email','$mobileNumber','$today')";

							$result=query($sql);
							confirm($result);


							unset($_SESSION['mobileNumber']);
							unset($_SESSION['fullname']);
							unset($_SESSION['email']);

							$_SESSION['mobile'] = $mobileNumber;

							setcookie('mobile',$mobileNumber,time() + 86400);

							redirect("index.php");

						}else{
							echo validation_errors("Sorry worng validation code");
							}
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
	}, 5000);
	</script>
    ");
			redirect("login.php");
		}



	if(isset($_POST['cancel'])) {
		unset($_SESSION['mobileNumber']);
		unset($_SESSION['fullname']);
		unset($_SESSION['email']);
		redirect("index.php");
}

	} //end of function







/***********--------------Contact function-------------*************/

function validate_contact(){

	$errors=[];
	$min = 3;
	$max = 20;

if($_SERVER['REQUEST_METHOD']=="POST"){

	$name	       =clean($_POST['name']);
	$email	     =clean($_POST['email']);
	$subject     =clean($_POST['subject']);
  $mobile_no   =clean($_POST['phone_number']);
  $message     =clean($_POST['message']);

if(empty($name) || empty($email) || empty($subject) || empty($mobile_no) || empty($message)){
 $errors[]="Empty are not allowed";
}
/*if(strlen($email) < $min) {
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

if (strlen($message) > 140) {
    $errors[]="Your subject name cannot be more than 140 characters";
}

if(!preg_match("/[a-zA-Z'-]/",$message)) {
    $errors[]="Invalid message";
} //message validaton
*/



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

		redirect("contacts.php");
		}else{
		set_message("<div class='alert alert-danger'  text-center'><strong>Sorry</strong>, your message could not be sent </div>");

		redirect("contacts.php");

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


/*============================ Oreder Id Generate ================================*/
function order_id(){

  date_default_timezone_set('Asia/Kolkata');
  $today = date("Ymd");
  $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
  return $unique = $today . $rand;

}
/*=================================================================================*/


 
/*+++++++++++++++++++++++++ Order ++++++++++++++++++++++++++++*/

function take_order(){
  
  if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['submit'])) {

  $service_id = clean($_POST['service_id']);

   if(isset($_POST['category']))
       foreach($_POST['category'] as $cat);

  if(isset($_POST['time']))
       foreach($_POST['time'] as $od_time);
  
  if(isset($_POST['gender']))
       foreach($_POST['gender'] as $person);

  if(isset($_POST['price']))
       foreach($_POST['price'] as $rate);

  $service_id = escape($service_id);
  $service_category = escape($cat);
  $service_time = escape($od_time);
  $person = escape($person);
  $rate = escape($rate);

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


// if(isset($_POST['submit']) && isset($_POST['rate']) && isset($_POST['person'])) {

$_SESSION['service_id'] = $service_id;
$_SESSION['service_category'] = $service_category;
$_SESSION['service_time'] = $service_time;
$_SESSION['person'] = $person;
$_SESSION['rate'] = $rate;
$_SESSION['user_id'] = $user_id;

redirect("availableExpert.php?expert_type=$person&service=$service_id");
// }
// $con=mysqli_connect('localhost','subrata','12345','kalpataru_db');
// $sql = "INSERT INTO orders(order_id,service_id,gender_id,service_category_id,service_price_id, service_time_id,date_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
// $stmt = mysqli_stmt_init($con);
// if(!mysqli_stmt_prepare($stmt,$sql)) {
//   echo "Error";
// }else{
//   mysqli_stmt_bind_param($stmt, "sssssss", $ord_id, $service_id, $person, $cat, $rate, $rate, $date);
//   mysqli_stmt_execute($stmt);
//   redirect("booking.php");
// }
  


  
      // Radio botton
      // 
      // $sql = "INSERT INTO orders(order_id,service_id,gender_id,service_category_id,service_price_id, service_time_id,date_time)";

      // $sql.= "VALUES('$ord_id','$service_id','$person','$cat','$rate','$od_time','$date')";

      // $sql1= prepare($sql);

      // $result=query($sql);
      // confirm($result);
      // redirect("booking.php");

      // header(Location: booking.php);
    }
  }
}
/*+++++++++++++++++++++++++ End Order ++++++++++++++++++++++++++++*/

/*=============== Confirm Order ===========*/
function confirm_order() {

if($_SERVER['REQUEST_METHOD']=="POST"){

  $fname = clean($_POST['fname']);
  $lname = clean($_POST['lname']);
  $email = clean($_POST['email']);
  $tel = clean($_POST['tel']);
  $address = clean($_POST['address']);
  $city = clean($_POST['city']);
  $landmark = clean($_POST['landmark']);
  $postcode = clean($_POST['postcode']);
  $card_number = clean($_POST['card_number']);
  $month = clean($_POST['month']);
  $cvc = clean($_POST['cvc']);
  $expert = clean($_POST['expert']);
 
  if(empty($fname) || empty($lname) || empty($email) || empty($tel) || empty($address) || empty($city) || empty($landmark) || empty($postcode) || empty($card_number) || empty($month) || empty($cvc)){
 $errors[]="Empty are not allowed";
}
    if(!empty($errors)) {

  foreach ($errors as $error) {

  echo validation_errors($error);

  }
}else{
  if(order_confirm($fname,$lname,$email,$tel,$address,$city,$landmark,$postcode,$card_number,$month,$cvc,$expert)){

    set_message("<div class='alert alert-success  text-center'><strong>Thank you!</strong> Order successfully</div>
      <script type='text/javascript'>
        window.setTimeout(function() {
          $('.alert').fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 5000);
      </script>");

    redirect("index.php");
    }else{
    set_message("<div class='alert alert-danger'  text-center'><strong>Sorry</strong>, your message could not be sent </div>");

    redirect("booking.php");

    }
  }

}
}
function order_confirm($fname,$lname,$email,$tel,$address,$city,$landmark,$postcode,$card_number,$month,$cvc,$expert){

  $fname = escape($fname);
  $lname = escape($lname);
  $email = escape($email);
  $tel = escape($tel);
  $address = escape($address);
  $city = escape($city);
  $landmark = escape($landmark);
  $postcode = escape($postcode);
  $card_number = escape($card_number);
  $month =escape($month);
  $cvc = escape($cvc);
  $expert = escape($expert);
  $expert = $_SESSION['expert'];

if($expert == 0){
  $status = 0;
}else{
  $status = 1;
}


$service_id =  $_SESSION['service_id'];
$service_category = $_SESSION['service_category'];
$service_time = $_SESSION['service_time'];
$person = $_SESSION['person'];
$rate = $_SESSION['rate'];
$user_id = $_SESSION['user_id'];

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$ord_id = order_id();

$sql = "INSERT INTO orders(order_id, service_id, gender_id, service_category_id, service_price_id, service_time_id, user_id, emp_id, f_name, l_name, email, m_number, address, city, landmark, postcode, card_no, epr_year, cvc, status, date_time)";

$sql.="VALUES('$ord_id', '$service_id', '$person', '$service_category', '$rate', '$service_time ', '$user_id', '$expert', '$fname', '$lname', '$email', '$tel', '$address','$city', '$landmark', '$postcode', '$card_number', '$month', '$cvc', '$status', '$date')";

  $result=query($sql);
  confirm($result);

  return true;




}

/*=============== End of order ============*/






























/*================= Service Check ======================*/
function service_exits($service) {
$sqlG = "SELECT * FROM services WHERE  name   LIKE '%$service%'";
$resultG = query($sqlG);
if(row_count($resultG) == 1) {
confirm($resultG);
$rowG = fetch_array($resultG);
$id = $rowG['id'];
return $id;
}else{
  return 0;
}
}
/*==================End function =======================*/


/*========================== Search Function =====================*/
function search_services(){
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])) {
      if(!empty($_POST['search'])){
        $city = clean($_POST['city']);
        $service = clean($_POST['search']);
        $service_id = service_exits($service);
        $service_ID = encode($service_id );
        if($service_id == 0){
          redirect("index.php");
        }else{
          validation_errors("Service not available!");
          redirect("service-details.php?id=$service_ID");
        }

        
      }
    }
  }
}



/*======================End of Search Function ===================*/


/*================= Help Contact ======================*/


function help_contact(){

  $errors=[];
  $min = 3;
  $max = 20;

if($_SERVER['REQUEST_METHOD']=="POST"){

  $name        =clean($_POST['name']);
  $email       =clean($_POST['email']);
  $subject     =clean($_POST['subject']);
  $mobile_no   =clean($_POST['phone_number']);
  $message     =clean($_POST['message']);
  $id          =clean($_POST['id']);
  $id = encode($id);

if(empty($name) || empty($email) || empty($subject) || empty($mobile_no) || empty($message)){
 $errors[]="Empty are not allowed";
}

    if(!empty($errors)) {

  foreach ($errors as $error) {

  echo validation_errors($error);

  }
}else{
  if(insert_contact($name,$email,$subject,$mobile_no,$message)){

    set_message("<div class='alert alert-success  text-center'><strong>Thank you!</strong> Your message has been sent successfully</div>
      <script type='text/javascript'>
        window.setTimeout(function() {
          $('.alert').fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 5000);
      </script>");

    redirect("service-details.php?id=$id");
    }else{
    set_message("<div class='alert alert-danger'  text-center'><strong>Sorry</strong>, your message could not be sent </div>");

    redirect("service-details.php?id=$id");

    }
  }
  }
}   //End Function




/***********----- Insert contact message-----***************/

function insert_contact($name,$email,$subject,$mobile_no,$message) {

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


/*================= End function ======================*/



/*================== Footer =====================*/

function email_submit(){
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit']) || isset($_POST['email'])) {
     
        $email = clean($_POST['email']);
        
    

        redirect("index.php");
      }
    }
  }



/*================== End Footer =====================*/





/*===================  ratting exits ==============*/

function ratting_exists($val) {

  $sql="SELECT id FROM ratting WHERE order_id = '$val'";

  $result = query($sql);

if(row_count($result) == 1) {

  return true;

}else{

  return false;
  }

}
/*==============================================================*/




/*============== Find emp id ================*/
function emp_id($val) {

$sqlP       = "SELECT * FROM orders WHERE id = '$val'";
$resultP    = query($sqlP);

if(row_count($resultP) == 1) {
$emp_id = $rowP["emp_id"];
  return $emp_id;

}else{

  return false;
  }

}


function user_id($val) {

$sqlU       = "SELECT * FROM orders WHERE id = '$val'";
$resultU    = query($sqlU);

if(row_count($resultU) == 1) {
$user_id = $rowU["user_id"];
  return $user_id;

}else{

  return false;
  }

}
// $sqlP       = "SELECT * FROM orders WHERE id = '$o_id'";
// $resultP    = query($sqlP);
// confirm($resultP);
// $rowP = fetch_array($resultP);
// $emp_id = $rowP["emp_id"];

/*============== Function End ================*/



/*================== Comment =====================*/

function comment_submit(){
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit']) && isset($_POST['order_id']) ) {
     
  $comment        =clean($_POST['comment']);
  $order_id       =clean($_POST['order_id']);
        
if(empty($comment) || empty($order_id)){
 $errors[]="Empty are not allowed";
}

    if(!empty($errors)) {

  foreach ($errors as $error) {

  echo validation_errors($error);

  }
}else{
  if(insert_comment($comment,$order_id)){

 

    redirect("mybooking.php");
    }else{


    redirect("mybooking111.php");

    }
  }
  }
      }
    }


function insert_comment($comment,$order_id) {

  $comment = escape($comment);
  $order_id = escape($order_id);

  $emp_id = emp_id($order_id);
  $user_id =user_id($order_id);
 
$sqlP       = "SELECT * FROM orders WHERE id = '$order_id'";
$resultP    = query($sqlP);
confirm($resultP);
$rowP = fetch_array($resultP);
$service_id = $rowP["service_id"];

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');

if(ratting_exists($order_id)){
  $quer = "UPDATE ratting SET comment = '$comment' WHERE order_id = '$order_id'";
query($quer);

}else{
  $sql = "INSERT INTO ratting(value, service_id, user_id, emp_id, order_id, comment, date_time)";

$sql.="VALUES('0','$service_id','$user_id','$emp_id','$order_id','$comment','$date')";

  $result=query($sql);
  confirm($result);
}
$quer = "UPDATE orders SET comment = 1 WHERE id = '$order_id'";
query($quer);

  return true;
}   //  End Function



/*================== End Comment =====================*/





















?>
