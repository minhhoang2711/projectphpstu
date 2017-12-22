<?php
require 'database.php';
GLOBAL $kh;
if(isset($_SESSION['email']))
{
	$stmt = $conn->prepare('select * from khachhang where email = '.$_SESSION['email']);
	$stmt->execute();
	$kh = $stmt->fetch(PDO::FETCH_OBJ);
}
?>
<div class="main" style="width:80%;margin: 0 auto">
<div class="section group">
	<?php 
		echo $kh->id;
	?>
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Thông tin cá nhân của bạn</h2>
					    <form method="post" action="index.php?page=editcustomer&id=<?php echo $kh->id; ?>">
					    	<div>
						    	<span><label>Tên khách hàng</label></span>
						    	<span><input name="tenkhachhang" type="text" value="<?php echo $kh->tenkhachhang?>" class="textbox" disabled="disabled"></span>
						    </div>
						    <div>
						    	<span><label>Số điện thoại</label></span>
						    	<span><input name="sodienthoai" type="text" value="<?php echo $kh->sodienthoai?>" class="textbox" disabled="disabled"></span>
						    </div>
						    <div>
						     	<span><label>Đia chỉ</label></span>
						    	<span><input name="diachi" type="text" value="<?php echo $kh->diachi?>" class="textbox" disabled="disabled"></span>
						    </div>
						    <div>
						    	<span><label>E-Mail</label></span>
						    	<span><input name="email" type="text" value="<?php echo $kh->email?>" class="textbox" disabled="disabled"></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Sửa thông tin" class="myButton"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>
					    	  <div class="map">
							   	    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
							  </div>
      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>Aptech Aprotrain</p>
						   		<p>212 - 214 Nguyễn Đình Chiểu</p>
						   		<p>Việt Nam</p>
				   		<p>Phone:0167 429 1708</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>nevergiveup271196@gmail.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>
			 </div>