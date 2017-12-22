<?php 
	require 'database.php';
	$kh = $conn->prepare('select * from khachhang');
	$kh->execute();
	$account = $kh->fetch(PDO::FETCH_OBJ);
	if(isset($_POST['signup'])) {
	    $stmt = $conn->prepare('insert into khachhang(tenkhachhang, sodienthoai, diachi, email,password) values(:tenkhachhang, :sodienthoai, :diachi, :email, :password)');
		$stmt->bindValue('tenkhachhang', $_POST['tenkhachhang']);
		$stmt->bindValue('email', $_POST['email']);
		$stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_BCRYPT));
		$stmt->bindValue('sodienthoai', $_POST['sodienthoai']);
		$stmt->bindValue('diachi', $_POST['diachi']);
		if($account->email == $_POST['email'])
		{
			$error = 'Email đã được sữ dụng!';
		}
		else 
		{
			if($_POST['password'] == $_POST['passwordconfirm'])
			{
				$stmt->execute();
				echo "<script language='javascript'>alert('Đăng kí thành công');";
				echo "location.href='login.php';</script>";
			}
			else 
			{	
				$error = 'Mật khẩu xác nhận không đúng!';
			}
		}
	}
	session_start();
	if(isset($_POST['signin'])) {
	    $stmt = $conn->prepare('select * from khachhang where email = :email');
		$stmt->bindValue('email', $_POST['email']);
		$stmt->execute();
		$khachhang = $stmt->fetch(PDO::FETCH_OBJ);
	    if($khachhang != NULL) {
	        if (password_verify($_POST['password'], $khachhang->password)){
	            $_SESSION['khachhang'] = $khachhang;
	            echo "<script language='javascript'>alert('Đăng nhập thành công');";
				echo "location.href='index.php?page=home';</script>";
	        } else {
	            $error = 'Sai tài khoản hoặc mật khẩu';
	        }
	    } else {
	        $error = 'Xin nhập đầy đủ thông tin tài khoản và mật khẩu';
	    }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="csslogin/style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="csslogin/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- Web-Fonts -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<!-- //Web-Fonts -->
</head>
<body>
<h1>Đăng nhập để mua hàng</h1>
<div class="main">
	<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		<div class="img-w3l-agile">
		<img src="../Master/images/1.jpg" alt=" ">
		</div>
		<?php echo isset($error) ? $error : ''; ?>
		<ul class="resp-tabs-list">
			<li class="resp-tab-item"><span>Đăng nhập</span></li>
		</ul>			
		<ul class="resp-tabs-list">
			<li class="resp-tab-item"><h2><span>Đăng kí</span></h2></li>
		</ul>			
		<div class="resp-tabs-container">
			<div class="tab-1 resp-tab-content">
				<div class="login-top">
					<form action="#" method="post">
						<input type="email" name="email" class="email" placeholder="Email" required=""/>
						<input type="password" name="password" class="password" placeholder="Mật khẩu" required=""/>	
					
						<div class="login-bottom">
							<ul>
								<li>
									<input type="checkbox" id="brand" value="">
									<label for="brand"><span></span> Nhớ tài khoản?</label>
								</li>
								<li>
									<a href="#">Quên mật khẩu?</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>	
						<input type="submit" name="signin" value="Đăng nhập">
					</form>
				</div>
			</div>
		</div>	
		<div class="resp-tabs-container">
			<div class="tab-1 resp-tab-content">
				<div class="login-top sign-top">
					<form action="#" method="post">
						<input type="text" name="tenkhachhang" class="name" placeholder="Họ tên" required=""/>
						<input type="email" name="email" class="email" placeholder="Email" required=""/>
						<input type="text" name="sodienthoai" class="phone" placeholder="Số điện thoại" required=""/>
						<input type="text" name="diachi" class="address" placeholder="Địa chỉ" required=""/>
						<input type="password" name="password" class="password" placeholder="Mật khẩu" required=""/>		
						<input type="password" name="passwordconfirm" class="password" placeholder="Xác nhận mật khẩu" required=""/>
						<div class="login-bottom">
							<ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span> Nhớ tài khoản?</label>
								</li>
								<li>
									<a href="#">Quên mật khẩu?</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>
						<input type="submit" name="signup" value="Đăng kí">							
					</form>
				</div>
			</div>
		</div>	
	</div>
	<div class="clear"> </div>
</div>
<div class="footer">
	<p> &copy; 2017 Silver Shop. All Rights Reserved | Design by <a href="http://cv-hoangminh.esy.es/">Hoàng Đức Minh</a></p>
</div>

<!-- js-scripts -->			
<!-- js -->
	<script type="text/javascript" src="jslogin/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- tabs -->
<script src="jslogin/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
		});
	});
</script>
<!-- //tabs -->
<!-- //js-scripts -->	
</body>
</html>
