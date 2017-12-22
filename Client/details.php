<?php
	require 'database.php';
	$Id = $_GET["id"];
	$stmt = $conn->prepare("select s.id, n.tennhacungcap, l.tenloaisp, s.tensanpham, s.mausac, s.hinhanh, s.ngaysanxuat, s.gia, s.trangthai
						from sanpham s 
						inner join nhacungcap n on s.idnhacungcap = n.id 
						inner join loaisanpham l on s.idloaisp = l.id 
						where s.id =$Id");
	$stmt->execute();
	$sp = $stmt->fetch(PDO::FETCH_OBJ)
?>
<div class="main" style="width:80%;margin: 0 auto">
<div class="section group">
<div class="col span_2_of_3">
  <div class="contact-form">
  	<h2>Thông tin chi tiết sản phẩm</h2>
	    <form method="post" action="index.php?page=cart&id=<?php echo $sp->id; ?>">
	    	<div>
		    	<span><label>Tên sản phẩm</label></span>
		    	<span><input name="tensanpham" type="text" value="<?php echo $sp->tensanpham?>" class="textbox" disabled="disabled"></span>
		    </div>
		    <div>
		    	<span><label>Loại sản phẩm</label></span>
		    	<span><input name="tenloaisp" type="text" value="<?php echo $sp->tenloaisp?>" class="textbox" disabled="disabled"></span>
		    </div>
		    <div>
		     	<span><label>Tên nhà cung cấp</label></span>
		    	<span><input name="tennhacungcap" type="text" value="<?php echo $sp->tennhacungcap?>" class="textbox" disabled="disabled"></span>
		    </div>
		    <div>
		    	<span><label>Giá</label></span>
		    	<span><input name="gia" type="number" value="<?php echo $sp->gia;?>" style="color:#E4292F; font-size:1.5em;width:150px;text-align: center;" class="textbox" disabled="disabled"><span style="font-size:1.5em;display:inline">VNĐ</span></span>
			</div>
			<div>
		    	<span><label>Màu sắc</label></span>
		    	<span><input name="mausac" type="color" value="<?php echo $sp->mausac?>" class="color" disabled="disabled"></span>
			</div>
			<div>
		    	<span><label>Hình ảnh</label></span>
		    	<span><img src="../Master/images/<?php echo $sp->hinhanh?>" class="image" width=100%" height="400px"/></span>
		    	<span></span>
			</div>
			
			<div>
				<span><input type="submit" value="Đặt mua" class="myButton"></span>
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