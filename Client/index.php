<?php 
	require 'database.php';
	session_start();
	if(isset($_SESSION['khachhang']))
	{	
		$khachhang = $_SESSION['khachhang'];
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Silver Shop Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
</head>	
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Cần hỗ trợ?</span> gọi chúng tôi <span class="number">0919 838 140</span></span></p>
			</div>
			<div class="account_desc">
				<ul>		
					<?php
						
						if(isset($khachhang))
						{
							echo '<li>';
							echo '<a href="logout.php" >Đăng xuất</a>';
							echo '</li>';
						}
						else 
						{
							echo '<li>';
							echo '<a href="login.php">Đăng nhập</a>';	
							echo '</li>';
						}
												
					?>
					<li><a href="index.php?page=delivery">Tình trạng đơn hàng</a></li>
					<li><a href="index.php?page=checkout">Thanh toán</a></li>
					<?php 			  	   		
			  	   		if(isset($khachhang))
			  	   		{	
			  	   			echo '<li><a href="index.php?page=customerdetail"'.$khachhang->email.'">Tài khoản</a></li>';
			  	   		}
			  	   	?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php?page=home"><img src="../Master/images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  
			  	   <p>Chào mừng 
			  	   <a href="#">
			  	   <?php 			  	   		
			  	   		if(isset($khachhang))
			  	   		{	
			  	   			echo $khachhang->tenkhachhang;
			  	   		}
			  	   	?>
			  	   	</a> 
			  	   	đến cửa hàng của chúng tôi! <span>Giỏ hàng:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00
			  	   	<ul class="dropdown">
							<li>Bạn có 0 sản phẩm trong giỏ hàng</li>
					</ul></div></p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php?page=home">Trang Chủ</a></li>
			    	<li><a href="index.php?page=about">Giới thiệu</a></li>
			    	<li><a href="index.php?page=delivery">Vận chuyển</a></li>
			    	<li><a href="index.php?page=news">Tin tức</a></li>
			    	<li><a href="index.php?page=contact">Liên lạc</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     
   </div>
</div>
   <div class="main">
    <div class="content">
    	<div class="content_top">
 			<?php 
				if(isset($_GET['page']))
				{
					require $_GET['page'].'.php';
				}
				else
				{
					require 'home.php';
				}
			?>
		</div>
	</div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Thông tin</h4>
						<ul>
						<li><a href="index.php?page=about">Giới thiệu</a></li>
						<li><a href="index.php?page=contact">Dịch vụ khách hàng</a></li>
						<li><a href="#">Tìm kiếm nâng cao</a></li>
						<li><a href="index.php?page=delivery">Đơn đặt hàng và hoàn trả</a></li>
						<li><a href="index.php?page=contact">Liên lạc</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tại sao mua hàng của chúng tôi</h4>
						<ul>
						<li><a href="index.php?page=about">Giới thiệu</a></li>
						<li><a href="index.php?page=contact">Dịch vụ khách hàng</a></li>
						<li><a href="#">Chính sách bảo mật</a></li>
						<li><a href="index.php?page=contact">Bản đồ</a></li>
						<li><a href="#">Thuật ngữ tìm kiếm</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài khoản</h4>
						<ul>
							<li><a href="index.php?page=contact">Đăng nhập</a></li>
							<li><a href="index.php?page=cart">Giỏ hàng</a></li>
							<li><a href="#">Danh sách của tôi</a></li>
							<li><a href="#">Theo dõi đơn hàng</a></li>
							<li><a href="index.php?page=contact">Hỗ trợ</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên lạc</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="../Master/images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="../Master/images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="../Master/images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="../Master/images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="../Master/images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>© All rights Reseverd | Design by  <a href="http://cv-hoangminh.esy.es/">Hoàng Đức Minh</a> </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

