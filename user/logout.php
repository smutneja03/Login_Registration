<?php
	//assumes nothing else in session to keep
	session_start();
	include "../functions.php";
	include "base.php";
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
	redirect_to("../index.php");

?>