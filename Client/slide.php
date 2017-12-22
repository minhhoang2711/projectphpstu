<?php 
	require 'database.php';
	$stmt = $conn->prepare("select id,tenloaisp from loaisanpham");
	$stmt->execute();  
	
?>
<div class="header_slide" style="width:80%; margin: 0 auto;">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  <h3>Categories</h3>
				  <!-- Hiển thị loại sản phẩm -->
				  <?php while($productCategory = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
				      <li><a href="index.php?page=product&id=<?php echo $productCategory->id;?>"><?php echo $productCategory->tenloaisp;?></a></li>
				   <?php } ?>
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="index.php?page=home"><img src="../Master/images/xedap1.jpg" width="500" height="300" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1>Cơn sốt<br><span>SALE</span></h1>
		                                 <h2>Giảm tới 40% Black Friday</h2>
									   <div class="features_list">
									   	<h4>Chỉ có tại Silver Shop</h4>							               
							            </div>
							             <a href="index.php?page=home" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h1>Giao hàng<br><span>NHANH</span></h1>
		                                 <h2>Trong vòng 48 giờ</h2>
									   <div class="features_list">
									   	<h4>Dịch vụ thông minh</h4>							               
							            </div>
							             <a href="index.php?page=home" class="button">Shop Now</a>
					                   </div>		
						             	 <div class="slider-img">
									     <a href="index.php?page=home"><img src="../Master/images/xedien3.png" alt="learn more" /></a>
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a href="index.php?page=home"><img src="../Master/images/xedap10.jpg" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Trả góp<br><span>0%</span></h1>
		                                 <h2>Thủ tục đơn giản</h2>
									   <div class="features_list">
									   	<h4>Chỉ có tại Silver Shop</h4>							               
							            </div>
							             <a href="index.php?page=home" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>