<?php
require 'database.php';
session_start();
require 'checksession.php';
if(isset($_POST['save'])) {
	
	// Find 	 by username
	$stmt = $conn->prepare('select * from khachhang where id = :id');
	$stmt->bindValue('id', $_POST['id']);
	$stmt->execute();
	$khachhang = $stmt->fetch(PDO::FETCH_OBJ);
	
	// Update account information
	$stmt = $conn->prepare('update khachhang set tenkhachhang = :tenkhachhang, sodienthoai = :sodienthoai,
	 diachi = :diachi, email = :email, password = :password  where id = :id');
	$stmt->bindValue('id', $_POST['id']);
	$stmt->bindValue('tenkhachhang', $_POST['tenkhachhang']);
	$stmt->bindValue('sodienthoai', $_POST['sodienthoai']);
	$stmt->bindValue('diachi', $_POST['diachi']);
	$stmt->bindValue('email', $_POST['email']);
	$stmt->bindValue('password', $_POST['password'] == '' ? $khachhang->password : password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->execute();
	if($_POST['password'] != $_POST['confirm_password'])
	{
		echo "<script language='javascript'>alert('Không trùng khớp mật khẩu !');";
		echo "location.href='index.php?page=editcustomer';</script>";
	}
	else 
	{
		echo "<script language='javascript'>alert('Sửa dữ liệu thành công');";
				echo "location.href='index.php?page=customer';</script>";
	}
}

$stmt = $conn->prepare('select * from khachhang where id = :id');
$stmt->bindValue('id', $_GET['id']);
$stmt->execute();
$khachhang = $stmt->fetch(PDO::FETCH_OBJ);

?>
<section id="main-content">
	<section class="wrapper">
		<section class="panel">
	                       	<header class="panel-heading">
	                            Sửa Thông Tin Khách Hàng
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="editcustomer.php">
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="id" name="id" type="hidden" value="<?php echo $khachhang->id; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-3">Tên khách hàng</label>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control" id="tenkhachhang" name="tenkhachhang" value="<?php echo $khachhang->tenkhachhang; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="phone" class="control-label col-lg-3">Số điện thoại</label>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control" id="sodienthoai" name="sodienthoai"  value="<?php echo $khachhang->sodienthoai; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="address" class="control-label col-lg-3">Địa chỉ</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="diachi" name="diachi"  value="<?php echo $khachhang->diachi; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $khachhang->email; ?>" required>
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
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
		</section>
	</section>
</section>   
                    