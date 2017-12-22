<?php 
require"slide.php";
	if(isset($_SESSION['khachhang']))
	{	
		$khachhang = $_SESSION['khachhang'];
	}
	$spnew = $conn->prepare('select s.tensanpham , s.hinhanh, s.gia
						from sanpham s 
						inner join nhacungcap n on s.idnhacungcap = n.id 
						inner join loaisanpham l on s.idloaisp = l.id 
						where year(s.ngaysanxuat)>=year(now())');
	$spnew ->execute();
?>
<div class="main" style="width:80%;margin: 0 auto">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="index.php?page=allpro">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				
				<?php while($sanphammoi = $spnew->fetch(PDO::FETCH_OBJ)) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="index.php?page=details&id=<?php echo $sanphammoi->id;?>"><img src="../Master/images/<?php echo $sanphammoi->hinhanh;?>" width="200px" height="100px"></a>					
					 <h2><?php echo $sanphammoi->tensanpham?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?php echo $sanphammoi->gia?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="index.php?page=details&id=<?php echo $sanphammoi->id;?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<?php }?>
			</div>
    </div>
 </div>