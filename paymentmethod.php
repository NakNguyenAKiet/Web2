<?php

 	include 'inc/header.php';

    // $checklogin = Session::get('checklogin');
    //     if($checklogin == false){
    //         echo header("Location:login.php");
    //     }
	
    // $cusId =   Session::get('customerid');  
    // $cus = $customer->get_by_id($cusId);

?>
 <div class="main">
    <div class="content">
		<div class="section group">
			<div class="content_top">
                <div class="heading">
                <h3>Payment Method</h3>
                </div>
    		    <div class="clear"></div>
                <div style="border: 1px solid #ddd;padding: 10px;text-align:center;background: #fad9ff;">
                <h2 style="">Choose your payment method</h3>
                <div style="margin:10px;">
                    <a style="color:green;padding:6px; background: #fff863cc;" href="offlinepayment.php">Offline payment method</a>
                    <a style="color:red;padding:6px; background: #fff863cc;" href="onlinepayment.php">Online payment method</a>
                </div>          

                </div>
            </div>

    	</div>
 	</div>
</div>
<?php

	include 'inc/footer.php';

?>	