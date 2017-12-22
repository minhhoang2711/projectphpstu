<?php
session_start();
echo "<script language='javascript'>return confirm('Bạn có chắc chắn muốn thoát!');";
		echo "</script>";
unset($_SESSION['email']);
header('location:login.php');
?>