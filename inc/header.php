<?php
session_start();
define( 'SCRIPT_ROOT', 'http://localhost/topu' );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?php echo SCRIPT_ROOT ;?>/style.css">
</head>
<body>
	<div class="banner"></div>

	<!-- menu -->
	<div class="menu">
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Products</a></li>
			<li><a href="">Customers</a></li>
			<li><a class="active" href="<?php echo  SCRIPT_ROOT;?>/index.php">Blog</a></li>
			<li><a href="">About Us</a></li>
            <?php
                if(!isset($_SESSION['email'])) :
            ?>
			<li><a href="<?php echo SCRIPT_ROOT ;?>/login.php">Login</a></li>
			<li><a href="<?php echo SCRIPT_ROOT ;?>/registration.php">Registration</a></li>
            <?php
                endif;
            ?>
		</ul>
	</div>
	<!-- menu -->