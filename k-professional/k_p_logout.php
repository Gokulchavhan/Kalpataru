<?php
include ("functions/k_p_init.php");

session_destroy();

if (isset($_COOKIE['username']))
	{
	unset($_COOKIE['username']);
	setcookie('username', '', time() - 86400);
	}

redirect("index.php");
?>


