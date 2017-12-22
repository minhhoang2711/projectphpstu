<?php
require 'database.php';
session_start();
require 'checksession.php';
	if(isset($_POST['save'])) {
		$stmt = $conn->prepare('select *
							from sanpham s 
							inner join nhacungcap n on s.idnhacungcap = n.id 
							inner join loaisanpham l on s.idloaisp = l.id where id = :id');
		$stmt->bindValue('id', $_POST['id']);
		$stmt->execute();
		$sp = $stmt->fetch(PDO::FETCH_OBJ);
		/////////////////////////////////
		$path = "../Master/images/"; // file sẽ lưu vào thư mục data
	    $tmp_dir = $_FILES['hinhanh']['tmp_name'];
	    $name = $_FILES['hinhanh']['name'];
	    $type = $_FILES['hinhanh']['type'];
	    
		if(file_exists($path.$name))
		{
			echo "<script language='javascript'>alert('Tồn tại hình này! Vui lòng đổi tên hình hoặc chọn hình khác');</script>";
		}
		else 
		{ // Đã chọn file
			if($name != NULL)
			{
				// Tiến hành code upload file
		        if($type == "image/jpg" || $type == "image/png")
		        {
		        	$stmt = $conn->prepare("update sanpham set idnhacungcap = :idnhacungcap, idloaisp = :idloaisp,
	 tensanpham = :tensanpham, mausac = :mausac, hinhanh = hinhanh, gia = :gia, trangthai = :trangthai  where id = :id");
					$stmt->bindValue('idnhacungcap', $_POST['idnhacungcap']);
					$stmt->bindValue('idloaisp', $_POST['idloaisp']);
					$stmt->bindValue('tensanpham', $_POST['tensanpham']);
					$stmt->bindValue('mausac', $_POST['mausac']);
					$stmt->bindValue('hinhanh', $name);
					
					$stmt->bindValue('ngaysanxuat', $_POST['ngaysanxuat']);
					$stmt->bindValue('gia', $_POST['gia']);
					$stmt->bindValue('trangthai', $_POST['trangthai']);
					$stmt->execute();
					
		        	copy($tmp_dir,$path.$name);            
		        	print_r($stmt->errorInfo());
		        	echo "<script language='javascript'>alert('Sửa dữ liệu thành công');";
					echo "location.href='index.php?page=product';</script>";
				}
			}
		}
		
	}
	
	$stmt = $conn->prepare('select *
							from sanpham s 
							inner join nhacungcap n on s.idnhacungcap = n.id 
							inner join loaisanpham l on s.idloaisp = l.id where s.id = :id');
	$stmt->bindValue('id', $_GET['id']);
	$stmt->execute();
	$sp = $stmt->fetch(PDO::FETCH_OBJ);
	unlink('../Master/images/'.$sp->hinhanh); 
?>
<section id="main-content">
	<section class="wrapper">
		<section class="panel">
	                       	<header class="panel-heading">
	                            Sửa Thông Tin Sản Phẩm
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
                                	<div class="form-group ">
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-3">Tên nhà cung cấp:</label>
                                        <div class="col-lg-6">
                                        	<select name="idnhacungcap" >
												 <?php												   
												   $result = $conn->prepare("select * from nhacungcap");     // Run your query
												    $result->execute();  // Execute your query
												    // Loop through the query results, outputing the options one by one
												    for($i=0; $row = $result->fetch(); $i++){
												    ?>
												    	<option value="<?php echo $row['id']; ?>"><?php echo $row['tennhacungcap']; ?></option>
													<?php 
												    }
												    ?>
										     </select> 	
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-3">Tên loại sản phẩm:</label>
                                        <div class="col-lg-6">
                                        	<select name="idloaisp" >
												 <?php												  
												   $result = $conn->prepare("select * from loaisanpham");     // Run your query
												    $result->execute();  // Execute your query
												    // Loop through the query results, outputing the options one by one
												    for($i=0; $row = $result->fetch(); $i++){
												    ?>
												    	<option value="<?php echo $row['id']; ?>"><?php echo $row['tenloaisp']; ?></option>
													<?php 
												    }
												    ?>
										     </select> 	
                                        </div>
                                    </div>
                                 
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-3">Tên sản phẩm:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control" id="tensanpham" name="tensanpham" value="<?php echo $sp->tensanpham;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="color" class="control-label col-lg-3">Chọn màu sắc:</label>
                                        <div class="col-lg-6">
                                            <input type="color" id="mausac" name="mausac" value="<?php echo $sp->mausac;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                    <label for="image" class="control-label col-lg-3">Chọn hình:</label>
                                        <div class="col-lg-6">
                                        	<input type="file" id="hinhanh" name="hinhanh" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="date" class="control-label col-lg-3">Ngày sản xuất:</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="ngaysanxuat" name="ngaysanxuat" value="<?php echo $sp->ngaysanxuat;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="Price" class="control-label col-lg-3">Giá:</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="gia" name="gia" value="<?php echo $sp->gia;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="status" class="control-label col-lg-3">Trạng thái:</label>
                                        <div class="col-lg-6">
                                            <input type="radio" name="trangthai" value="1" checked="checked">Còn hàng
											<input type="radio" name="trangthai" value="0">Hết hàng

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <input type="submit" class="btn btn-primary" name="save" value="Save">
                                            <button class="btn btn-default" type="button" action="index.php?page=product">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
		</section>
	</section>
</section>   
                    