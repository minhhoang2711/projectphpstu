<div class="main" style="width:80%;margin: 0 auto">
	<div id="contant-left">
					<?php
					session_start ();
					require 'database.php';
					require 'item.php';
					if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {
					
						$result = mysqli_query ( $con, 'select * from sanpham where MaSP='.$_GET['id'] );
						$product = mysqli_fetch_object ( $result );
						$item = new Item ();
						$item->id = $product->MaSP;
						$item->name = $product->TenSP;
						$item->price = $product->Gia;
						$item->quantity = 1;
						// Check product is existing in cart
						$index = - 1;
						if (isset ( $_SESSION ['cart'] )) {
							$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
							for($i = 0; $i < count ( $cart ); $i ++)
							if ($cart [$i]->id == $_GET ['id']) {
								$index = $i;
								break;
							}
						}
						if ($index == - 1)
						$_SESSION ['cart'] [] = $item;
						else {
							$cart [$index]->quantity ++;
							$_SESSION ['cart'] = $cart;
						}
					}
					
					// Delete product in cart
					if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
						$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
						unset ( $cart [$_GET ['index']] );
						$cart = array_values ( $cart );
						$_SESSION ['cart'] = $cart;
					}
					
					// Update quantity in cart
					if(isset($_POST['update'])) {
						$arrQuantity = $_POST['quantity'];
					
						// Check validate quantity
						$valid = 1;
						for($i=0; $i<count($arrQuantity); $i++)
						if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
							$valid = 0;
							break;
						}
						if($valid==1){
							$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
							for($i = 0; $i < count ( $cart ); $i ++) {
								$cart[$i]->quantity = $arrQuantity[$i];
							}
							$_SESSION ['cart'] = $cart;
						}
						else 
							$error = 'Quantity is InValid';
					}
					
					?>
					<?php echo isset($error) ? $error : ''; ?>
					<form method="post">
						<table cellpadding="4" cellspacing="4" style="margin-top:100px;margin-left:300px ">
							<tr>
								<th style="font-size:23px">Tùy chọn</th>
								<th style="font-size:23px">Mã sản phẩm</th>
								<th style="font-size:23px">Tên sản phẩm</th>
								<th style="font-size:23px">Giá</th>
								<th style="font-size:23px">Số lượng <input type="image" src="images/save.png"> <input
									type="hidden" name="update">
								</th>
								<th style="font-size:23px">Tổng tiền</th>
							</tr>
							<?php
							$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
							$s = 0;
							$index = 0;
							for($i = 0; $i < count ( $cart ); $i ++) {
								$s += $cart [$i]->price * $cart [$i]->quantity;
								?>
							<tr>
								<td><a href="cart.php?index=<?php echo $index; ?>"
									onclick="return confirm('Are you sure?')">Delete</a></td>
								<td style="width: 200px;text-align:center;font-size:18px"><?php echo $cart[$i]->id; ?></td>
								<td style="width: 200px;text-align:center;font-size:18px"><?php echo $cart[$i]->name; ?></td>
								<td style="width: 200px;text-align:center;font-size:18px"><?php echo $cart[$i]->price; ?></td>
								<td><input type="text" value="<?php echo $cart[$i]->quantity; ?>"
									style="width: 100px;text-align:center;font-size:18px" name="quantity[]"></td>
								<td style="width: 200px;text-align:center;font-size:18px"><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
							</tr>
							<?php
							$index ++;
							}
							?>
							<tr>
								<td colspan="5" style="text-align:center;font-size:20px">Tổng tiền</td>
								<td style="text-align:center"><?php echo $s; ?></td>
							</tr>
						</table>
					</form>
					<br>
					<a href="index.php" style="margin-left:300px">Tiếp tục mua hàng</a> | <a href="index.php?page=checkout" >Thanh toán</a> 
					
					
</div>
</div>