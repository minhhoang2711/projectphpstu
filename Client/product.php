<?php 
	require 'database.php';
	$Id = $_GET["id"];
	$sp = $conn->prepare("select s.id, s.tensanpham , s.hinhanh, s.gia
						from sanpham s 
						inner join nhacungcap n on s.idnhacungcap = n.id 
						inner join loaisanpham l on s.idloaisp = l.id 
						where s.idloaisp = $Id");
	$sp->execute();
?>

<div class="header_slide" style="width:80%; margin: 0 auto;">
<div class="content">
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php while($sanpham = $sp->fetch(PDO::FETCH_OBJ)) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="index.php?page=details&id=<?php echo $sanpham->id;?>"><img src="../Master/images/<?php echo $sanpham->hinhanh;?>" width="200px" height="100px"></a>					
					 <h2><?php echo $sanpham->tensanpham?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?php echo $sanpham->gia?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="index.php?page=details&id=<?php echo $sanpham->id;?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
							<?php }?>
			</div>
    </div>
</div>