<?php 
	if(!isset($_SESSION['email']))
	{
		echo "<script language='javascript'>";
		echo "location.href='login.php';</script>";
	}
?>
