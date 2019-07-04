<?php
include ("functions/init.php");

// session_destroy();

if (isset($_COOKIE['mobile']) || isset($_SESSION['mobile']))
	{
	unset($_COOKIE['mobile']);
	unset($_SESSION['mobile']);
	setcookie('mobile', '', time() - 86400);
	}

redirect("index.php");
?>

