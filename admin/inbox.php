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
	
	if(isset($_GET["shiftId"])){
		$shifted = $cart->set_shifted($_GET["shiftId"]);
	}

	if(isset($_GET["delId"])){
		$shifted = $cart->del_ordered($_GET["delId"]);
	}

	$getAllOrder = $cart->get_all_order();

?>
<style>
a:hover{
	color: red;
}

</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				<?php
					if (isset($shifted)) {
						echo $shifted;
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Date</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cumtomer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
							if ($getAllOrder) {
								while ($pro = $getAllOrder->fetch_assoc()) {
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $pro["date_order"]?></td>
							<td><?php echo $pro["productName"]?></td>
							<td><?php echo $pro["quantity"]?></td>
							<td><?php echo $pro["price"]?></td>
							<td><a href="customer.php?cusId=<?php echo $pro["customerId"]?>">Cumtomer</a></td>
							<td><?php 
                                    if($pro["status"]=='0'){										
                                        echo "<a href='?shiftId=".$pro["id"]."'>pending</a>";
                                    }else{
                                        echo "<a href='?delId=".$pro["id"]."'>remove</a>";
                                    }
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
