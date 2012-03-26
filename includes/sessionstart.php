<?php
	session_start();
	$user = $_SESSION['username'];
	$guest = $_SESSION['guest'];
	if(!isset($user)) $user = 'guest';
?>