<?php

 	include 'inc/header.php';

    $checklogin = Session::get('checklogin');
        if($checklogin == false){
            echo header("Location:login.php");
        }
	
    $cusId =   Session::get('customerid');  
    $cus = $customer->get_by_id($cusId);

    if (isset($_GET["orderid"])) {
        $insertOrder = $cart->insert_order($cusId);
        $delcart = $cart->del_all_cart(); 
        header("Location:success.php");
    }

    // $checklogin = Session::get('checklogin');
    //     if($checklogin == false){
    //         echo header("Location:login.php");
    //     }
	
    // $cusId =   Session::get('customerid');  
    // $cus = $customer->get_by_id($cusId);

?>
<style>
    .order-submit{
    width: fit-content;
    display: block;
    margin: 20px;
    background: #ae089e;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5%;
    }

    .order-submit:hover{
        opacity: 0.8;
        cursor: pointer;
    }

    center{
        display:inline-block;
    }
</style>
 <div class="main">
    <div class="content">
		<div class="section group">
			<div class="content_top">
                <div class="heading">
                <h3>Online Payment Method</h3>
                </div>
    		    <div class="clear"></div>                            
                </div>

                <div class="box_left" style="border: 1px solid #ddd;padding:4px;display: inline-block;width:49%; float:left">
                    						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
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
								<td><?php echo $pro["price"]?></td>
								<td>
										<?php echo $pro["quantity"]?>
								</td>
								<td> 
								<?php
									$total = $pro["quantity"]*	$pro["price"];
									echo $total;							
								?></td>
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
											echo $subtotal;							
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
											echo $grandtotal;							
										?> </td>
									</tr>
											
							<?php		
								}else{
									echo "<h2 style='color: blue; width: 500px'>YOUR CART IS EMPTY ! </h2>";
								}
							?>
					</table>
                </div>
                <div class="box_right" style="padding:4px;border: 1px solid #ddd;display: inline-block;width:49%; float:right">
                    <table class="tblone">
                        <?php
                            if($cus){
                                while ($info = $cus->fetch_assoc()) {                           
                        ?>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $info["name"]?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?php echo $info["city"]?> </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><?php echo $info["country"]?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $info["address"]?> </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $info["phone"]?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $info["email"]?> </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><?php echo $info["zipcode"]?> </td>
                        </tr>
                        <tr>
                            <td colspan="3"><a href="editprofile.php">Edit profile</a></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
                


            </div>
    <center>
        <form action="momopay.php" method="post">
        <input type="hidden" value="<?php echo $grandtotal?>" name="total">
        <button class="order-submit" name="payWithATM">ATM MOMO</button>
        </form>
    </center>

    <center>
        <form action="momopay.php" method="post">
        <input type="hidden" value="<?php echo $grandtotal?>" name="total">
        <button class="order-submit" name="captureWallet">QR MOMO</button>

        </form>
    </center>

    	</div>
 	</div>
</div>
<?php

	include 'inc/footer.php';

?>	