<?php 
$maximum_user_session = 420; // 7m
date_default_timezone_set('America/Bogota');

session_start();
$time_now = time();

if (!isset($_SESSION['session_expires'])) { 
    header("location:inicio-sesion.html");
}
else {
	if ($time_now >= $_SESSION['session_expires']) {
	    header("location:inicio-sesion.html");
	}
	else {
		$session_time = date('H:i A', $_SESSION['session_expires']); 
	}
}


?>