<?php

	include 'inc/header.php';

    $cusId =   Session::get('customerid');

	if(isset($_GET['orderid']) && $_GET['orderid']!=NULL){
				$orderid = $_GET['orderid'];
			}else{
				echo "<script> window.location = '404.php'</script>";
			}

?>
<style>
    h2{
        width: auto !important;
    }

    .status{
        color:#ff9d2d;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Order details</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="20%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							<?php
								$get_pro_ordered = $cart->getDetailOrder($orderid);

								if($get_pro_ordered){
									while ($pro = $get_pro_ordered->fetch_assoc()) {																			
							?>
							<tr>
								<td><?php echo $pro["productName"]?></td>
								<td><img src="admin/uploads/<?php echo $pro['image']?>" alt=""/></td>
								<td><?php echo $pro["price"]?></td>
								<td>
										<?php echo $pro["SoLuong"]?>
								</td>
								<td> 
								<?php
									$total = $pro["SoLuong"]*	$pro["price"];
									echo $total;							
								?></td>
                              
							</tr>
							<?php
									}
								}
							?>
							
							
						</table>
					</div>

					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php

	include 'inc/footer.php';

?>	