<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/user.php';?>
<?php include_once '../helpers/format.php';?>

<?php
	$fm = new Format();
	$pro = new product();
    $user = new user();

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
					<th>Email</th>
					<th>Level</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$list = $user->getalluser();

					while ($result = $list->fetch_assoc()) {					

				?>
					<tr class="odd gradeX">
						<td><?php echo $result['adminId']; ?></td>
						<td><?php echo $result['adminName']; ?></td>
						<td><?php echo $result['adminEmail']; ?></td>
						<td><?php 
                        if($result['level'] == 0)
                        echo "Admin";
                        else {
                            echo "Staff";
                        }
                        ?></td>					
						<td><a href="productedit.php?productId=<?php echo $result['productId']; ?>">Edit</a> || <a href="?DelId=<?php echo $result['productId']; ?>">Delete</a></td>
					</tr>
				<?php
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
