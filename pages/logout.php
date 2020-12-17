<?php
    session_start();     		
	session_destroy();
	unset($_SESSION['username']);

	echo '<script type="text/javascript"> alert("Log out !"); </script>';
	header("location:../home.php");
           		
?>