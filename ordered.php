<?php

	include 'inc/header.php';

    $cusId =   Session::get('customerid');

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
			    	<h2>Your Orders</h2>
						<table class="tblone">
							<tr>
								<th width="25%">Date</th>
								<th width="25%">total bill amount</th>
								<th width="25%">Status</th>
								<th width="25%">ViewDetail</th>

							</tr>
							<?php
								$ordered = $cart->get_ordered($cusId);

								if($ordered){
									while ($order = $ordered->fetch_assoc()) {																			
							?>
							<tr>
                                <td><?php echo $fm->formatDate($order["NgayLap"])?></td>
                                
								<td><?php echo $order["TongTien"]?></td>

                                <td class="status">
                                    <?php 
                                    if($order["status"]=='0'){
                                        echo "pending";
                                    }else{
                                        echo "processed";
                                    }
                                    ?>
                                </td>
                                <td>
                                        <a href="orderdetail.php?orderid=<?php echo $order["mahd"]?>">View</a> 
                                </td>
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