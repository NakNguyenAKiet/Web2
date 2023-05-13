<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>
<?php include_once '../helpers/format.php';?>

<?php
	$fm = new Format();
	$pro = new product();
	if (isset($_GET['DelId']) && $_GET['DelId'] != NULL){
		$del = $pro->del_pro($_GET['DelId']);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
		<?php
			if(isset($del)){
				echo '<span>';
				echo $del; 
				echo '</span>';
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Type</th>
					<th>Price</th>
					<th>Image</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$list = $pro->show_product();

					if ($list) {				
					while ($result = $list->fetch_assoc()) {					
					$cat = new category();
					$brand = new brand();
				?>
					<tr class="odd gradeX">
						<td><?php echo $result['productId']; ?></td>
						<td><?php echo $result['productName']; ?></td>
						<td><?php echo $fm->textShorten($result['productDesc'], 50) ; ?></td>
						<td><?php echo $cat->getnamebyid($result['catId']); ?></td>
						<td><?php echo $brand->getnamebyid($result['brandId']); ?></td>
						<td><?php echo $result['type']; ?></td>
						<td> <?php echo $result['price']; ?></td>
						<td> <img src="uploads/<?php echo $result['image']; ?> " alt="" width= '50px'> </td>
						<td>
							<a href="productedit.php?productId=<?php echo $result['productId']; ?>">Edit</a>
							 || 						 
							 <a onclick="deleteask<?php echo $result['productId']?>()" href="#">Delete</a></td>
							<script>
							function deleteask<?php echo $result['productId']?>() {
								var result = confirm("Are you sure you want to delete product id= <?php echo $result['productId']?>?");
								
								if (result == true) {
									window.location.href = "productlist.php?DelId=<?php echo $result['productId']?>";	
								}
							}
							</script>
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
