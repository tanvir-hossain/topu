<?php
$login_url = "../login.php";
	if(! isset($_SESSION['id'])){
		if( basename($_SERVER["SCRIPT_FILENAME"], '.php') != "login"){
			header('Location: ' . $login_url);
			exit();
		}
	}
	else{
		$usertype = $_SESSION['usertype'];
		header('Location: ../' . $usertype.'/index.php');
	}

 ?>