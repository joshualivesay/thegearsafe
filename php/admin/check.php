<?php
	session_start();
	date_default_timezone_set('America/New_York');
	if (!isset($_SESSION['loggedin'])) {
		header("Location: login.php");
		exit;
	} else {
		require('users.php');
		$userexists = false;
		foreach($users as $username => $password) {
			if (md5($username.$password.$salt) == $_SESSION['loggedin'])
				$userexists = true;
		}
		
		if ($userexists !== true) {
			header("Location: login.php");
			exit;
		}
	}
	
	$showDisplayName = $displayName;

    include dirname(__FILE__).'/../functions/bootstrap.php';
    require "dataprocess.php";

    //$newOrderCount = $db->query_first("SELECT count(id) FROM Order WHERE status = 'Pending'");
    //$oldOrderCount = $db->query_first("SELECT count(id) FROM Order WHERE status = 'Shipped'");
?>