<?php
session_start();
echo "<script language='javascript'>return confirm('Bạn có chắc chắn muốn thoát!');";
		echo "</script>";
unset($_SESSION['khachhang']);
header('location:index.php');
?>