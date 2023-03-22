<?php

	include 'inc/header.php';

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
		$quan = $_POST["quan"];
		$cartid = $_POST["cartid"];
		$cartupdate = $cart->update_quan($quan, $cartid); 
	}

	if(isset($_GET["cartid"])){
		$cartdelid = $_GET["cartid"];
		$cart_del = $cart->delete_product($cartdelid);
	}

	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Cart</h2>
					<?php
					if(isset($cartupdate)){
						echo $cartupdate;
					}
					if(isset($cart_del)){
						echo $cart_del;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$get_pro_cart = $cart->get_pro_cart();

								if($get_pro_cart){
									$subtotal = 0;
									$proInCart = 0;
									while ($pro = $get_pro_cart->fetch_assoc()) {																			
							?>
							<tr>
								<td><?php echo $pro["productName"]?></td>
								<td><img src="admin/uploads/<?php echo $pro['image']?>" alt=""/></td>
								<td><?php echo $pro["price"].".đ"?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $pro["cartId"]?>"/>
										<input type="number" name="quan" min="1" value="<?php echo $pro["quantity"]?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td> 
								<?php
									$total = $pro["quantity"]*	$pro["price"];
									echo $total.".đ";							
								?></td>
								<td><a href="?cartid=<?php echo $pro["cartId"]?>">Xóa</a></td>
							</tr>
							<?php
									$proInCart+=1;
									$subtotal+= $total;
									}
									Session::set("ProInCart",$proInCart);
								}
							?>
							
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<?php
								if($check_cart = $cart->check_cart()){										
							?>
									<tr>
										<th>Sub Total : </th>
										<td><?php
											echo $subtotal.".đ";							
										?></td>
									</tr>
									<tr>
										<th>VAT : </th>
										<td>10%</td>
									</tr>
									<tr>
										<th>Grand Total :</th>
										<td>
										<?php
											$grandtotal = $subtotal + $subtotal*0.1;
											echo $grandtotal.".đ";							
										?> </td>
									</tr>
											
							<?php		
								}else{
									echo "<h2 style='color: blue; width: 500px'>YOUR CART IS EMPTY ! </h2>";
								}
							?>
					</table>
					</div>
					<div class="shopping">
						<div class="shopright">
							<?php
								$checklogin = Session::get('checklogin');
								if($checklogin == true){							
									echo '<a href="paymentmethod.php">CHECK OUT <i class="ti-direction"> </i></a>';
								}else{
									echo '<a href="login.php">LOGIN</a>';
								}
							?>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php

	include 'inc/footer.php';

?>	