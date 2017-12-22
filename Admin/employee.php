<?php
require 'database.php';
session_start();
require 'checksession.php';
if(isset($_GET['action']) && $_GET['action']=='delete'){
	$stmt = $conn->prepare('delete from nhanvien where id = :id');
	$stmt->bindValue('id', $_GET['id']);
	$stmt->execute();
}

$stmt = $conn->prepare('select * from nhanvien');
$stmt->execute();
?>
<section id="main-content">
	<section class="wrapper">	
		<div class="table-agile-info">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      Bảng Danh Sách Nhân Viên
		    </div>
		    <div class="row w3-res-tb">
		      <div class="col-sm-5 m-b-xs">
		        <a href="index.php?page=addemployee"><button class="btn btn-sm btn-default" "><i class="fa fa-plus text-success text-active"></i>Thêm Nhân Viên</button></a>          
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
		            <th>Tên nhân viên</th>
		            <th>Ngày Vào làm</th>
		            <th>Số điện thoại</th>
		            <th>Email</th>
		            <th>Địa chỉ</th>
		            <th>Thao tác</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php while($employee = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
		          <tr>
		            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
		            <td><?php echo $employee->id; ?></td>
		            <td><?php echo $employee->tennhanvien; ?></td>
		            <td><?php echo $employee->ngayvaolam; ?></td>
		            <td><?php echo $employee->sodienthoai; ?></td>
		            <td><?php echo $employee->email; ?></td>
		            <td><?php echo $employee->diachi; ?></td>
		            <td>
		              <a href="index.php?page=editemployee&id=<?php echo $employee->id; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i>EDIT</a>
		              <br>
		              <a href="index.php?page=employee&id=<?php echo $employee->id; ?>
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
