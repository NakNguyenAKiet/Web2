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
		$statistic = $cart->insert_statistic($_GET["shiftId"]);
	}

	if(isset($_GET["delId"])){
		$shifted = $cart->del_ordered($_GET["delId"]);
	}

	$getAllHoadon = $cart->getAllHoadon();

?>
<style>
a:hover{
	color: red;
}

</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox <?php
					if (isset($shifted)) {
						echo $shifted;
					}
				?></h2>
				<div class="formordered">
					<form action="#" method="POST">
						<span>Filter Time:   </span>
						<label for="datefrom">From: </label><input type="date" id="datefrom" name="datefrom" >
						_
						<label for="datefrom">To: </label><input type="date" id="dateto" name="dateto">

						<input type="submit" value="Filter" name="submit">
					</form>
				</div>
				
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="20%">Date</th>
							<th width="20%">Total Bill </th>
							<th width="20%">Cumtomer</th>
							<th width="20%">View Detail</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_POST["submit"])){
								$getAllHoadon = $cart->getAllHoadonDate($_POST);	
								$from = $_POST['datefrom'];
								$to = $_POST['dateto'];
								if ($from == "") {
									$from = "Not set ";
								}
								if ($to == "") {
									$to = "Not set ";
								}							
								echo "<h4>Get Order From: $from _ To: $to </h4>";
								
							}else{
								$getAllHoadon = $cart->getAllHoadon();
							}
					
								if($getAllHoadon){
									while ($order = $getAllHoadon->fetch_assoc()) {																			
							?>
							<tr>
                                <td><?php echo $fm->formatDate($order["NgayLap"])?></td>
                                
								<td><?php echo $order["TongTien"]?></td>

								<td><a href="customer.php?cusId=<?php echo $order["CustomerId"]?>">Cumtomer detail</a></td>
                                <td>
                                        <a href="hoadondetail.php?orderid=<?php echo $order["mahd"]?>">View</a> 
                                </td>
								<td>
									<?php 
                                    if($order["status"]=='0'){										
                                        echo "<a href='?shiftId=".$order["mahd"]."'>pending</a>";
                                    }else{
                                        echo "<a href='#'>processed</a>";
                                    }
                                	?>
								</td>
						</tr>
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
