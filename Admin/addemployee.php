<?php
require 'database.php';
session_start();
require 'checksession.php';
if(isset($_POST['save'])) {
	$stmt = $conn->prepare('insert into nhanvien(tennhanvien, ngayvaolam, sodienthoai, email, diachi, password) 
		values(:tennhanvien, :ngayvaolam, :sodienthoai, :email, :diachi, :password)');
	$stmt->bindValue('tennhanvien', $_POST['tennhanvien']);
	$stmt->bindValue('ngayvaolam', $_POST['ngayvaolam']);
	$stmt->bindValue('sodienthoai', $_POST['sodienthoai']);
	$stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindValue('email', $_POST['email']);
	$stmt->bindValue('diachi', $_POST['diachi']);
	$stmt->execute();
	echo "<script language='javascript'>alert('Thêm dữ liệu thành công');";
	echo "location.href='index.php?page=employee';</script>";
}
?>
<section id="main-content">
	<section class="wrapper">
		<section class="panel">
	                       	<header class="panel-heading">
	                            Đăng kí thông tin nhân viên
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post">
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-3">Tên nhân viên</label>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control" id="tennhanvien" name="tennhanvien" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-3">Ngày vào làm</label>
                                        <div class="col-lg-6">
                                            <input type="date" class=" form-control" id="ngayvaolam" name="ngayvaolam" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="phone" class="control-label col-lg-3">Số điện thoại</label>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control" id="sodienthoai" name="sodienthoai"  required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="address" class="control-label col-lg-3">Địa chỉ</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="diachi" name="diachi" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-3 col-sm-3">Agree to Our Policy</label>
                                        <div class="col-lg-6 col-sm-9">
                                            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-3 col-sm-3">Receive the Newsletter</label>
                                        <div class="col-lg-6 col-sm-9">
                                            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <input type="submit" class="btn btn-primary" name="save" value="Save">
                                            <button class="btn btn-default" type="button" action="index.php?page=employee">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
		</section>
	</section>
</section>   
                    