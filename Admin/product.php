<?php
require 'database.php';
session_start();
require 'checksession.php';
if(isset($_GET['action']) && $_GET['action']=='delete'){
	$stmt = $conn->prepare('delete from sanpham where id = :id');
	$stmt->bindValue('id', $_GET['id']);
	$stmt->execute();
}

$stmt = $conn->prepare('select s.id, n.tennhacungcap, l.tenloaisp, s.tensanpham, s.mausac, s.hinhanh, s.ngaysanxuat, s.gia, s.trangthai
						from sanpham s 
						inner join nhacungcap n on s.idnhacungcap = n.id 
						inner join loaisanpham l on s.idloaisp = l.id 
						');
$stmt->execute();
?>
<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      Bảng Danh Sách Sản Phẩm
	    </div>
	    <div class="row w3-res-tb">
	      <div class="col-sm-5 m-b-xs">
	        <a href="index.php?page=addproduct"><button class="btn btn-sm btn-default" action=""><i class="fa fa-plus text-success text-active"></i>Thêm Sản Phẩm</button></a>             
	      </div>
	      <div class="col-sm-4">
	      </div>
	      <div class="col-sm-3">
	        <div class="input-group">
	          <input type="search" class="input-sm form-control" placeholder="Search">
	          <span class="input-group-btn">
	            <button class="btn btn-sm btn-default" type="button">Go!</button>
	          </span>
	        </div>
	      </div>
	    </div>
	    <div class="table-responsive">
	      <table class="table table-striped b-t b-light">
	        <thead>
	          <tr>
	            <th style="width:20px;">
	              <label class="i-checks m-b-none">
	                <input type="checkbox"><i></i>
	              </label>
	            </th>
	            <th>Id</th>
	            <th>Tên nhà cung cấp</th>
	            <th>Tên loại sản phẩm</th>
	            <th>Tên sản phẩm</th>
	            <th>Màu sắc</th>
	            <th>Hình ảnh</th>
	            <th>Ngày sản xuất</th>
	            <th>Giá</th>
	            <th>Trạng thái</th>
	            <th width="95px">Thao tác</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php while($product = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
	          <tr>
	            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
	            <td><?php echo $product->id; ?></td>
	            <td><?php echo $product->tennhacungcap; ?></td>
	            <td><?php echo $product->tenloaisp; ?></td>
	            <td><?php echo $product->tensanpham; ?></td>
	            <td><div width="100px" height="50px" style="background:<?php echo $product->mausac;?>">.</div></td>
	            <td><img src="../Master/images/<?php echo $product->hinhanh; ?>" width="150px" height="80px"/></td>
	            <td><?php echo $product->ngaysanxuat; ?></td>
	            <td><?php echo $product->gia; ?></td>
	          	<?php 
	          		$trangthai;
	            	if($product->trangthai == 1)
	            		$trangthai = "Còn hàng";
	            	else 
	            		$trangthai = "Hết hàng";	
	            ?>
	            <td><?php echo $trangthai; ?></td>
	            <td>
	              <a href="index.php?page=editproduct&id=<?php echo $product->id; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i>EDIT</a>
	              <br>
	              <a href="index.php?page=product&id=<?php echo $product->id;?>
					&action=delete" onclick="return confirm('Are you sure?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i>DELETE</a>
	            </td>
	          </tr>
	          <?php } ?>
	        </tbody>
	      </table>
	    </div>
	    <footer class="panel-footer">
	      <div class="row">
	        
	        <div class="col-sm-5 text-center">
	          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
	        </div>
	        <div class="col-sm-7 text-right text-center-xs">                
	          <ul class="pagination pagination-sm m-t-none m-b-none">
	            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
	            <li><a href="">1</a></li>
	            <li><a href="">2</a></li>
	            <li><a href="">3</a></li>
	            <li><a href="">4</a></li>
	            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
	          </ul>
	        </div>
	      </div>
	    </footer>
	  </div>
	</div>
	</section>
</section>
