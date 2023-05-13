<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

	include '../helpers/format.php';
    include '../lib/database.php';

	spl_autoload_register(function ($classname)
	{
		include_once "../classes/".$classname.".php";
	});

	$cart = new cart();
	$fm = new Format();
	
if(isset($_GET['orderid']) && $_GET['orderid']!=NULL){
			$orderid = $_GET['orderid'];
		}else{
			echo "<script> window.location = '404.php'</script>";
		}

?>
<style>
a:hover{
	color: red;
}

</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order Detail</h2>
				<?php
					if (isset($shifted)) {
						echo $shifted;
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="19%">Product Name</th>
                            <th width="19%">Image</th>
                            <th width="19%">Price</th>
                            <th width="19%">Quantity</th>
                            <th width="19%">Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
								$get_pro_ordered = $cart->getDetailOrder($orderid);

								if($get_pro_ordered){
									while ($pro = $get_pro_ordered->fetch_assoc()) {																			
							?>
							<tr>
								<td><?php echo $pro["productName"]?></td>
								<td><img src="uploads/<?php echo $pro['image']?>" alt="" width= '50px'/></td>
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
							
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
