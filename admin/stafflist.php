<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/user.php';?>
<?php include_once '../helpers/format.php';?>

<?php
	$fm = new Format();
    $user = new user();

	if (isset($_GET['DelId']) && $_GET['DelId'] != NULL){
		$del = $user->del_user($_GET['DelId']);
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
                if($list){
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
						<td><a href="staffedit.php?adminId=<?php echo $result['adminId']; ?>">Edit</a> || 
                        <a onclick="deleteask<?php echo $result['adminId']?>()" href="#">Delete</a></td>
							<script>
							function deleteask<?php echo $result['adminId']?>() {
								var result = confirm("Are you sure you want to delete id= <?php echo $result['adminId']?>?");
								
								if (result == true) {
									window.location.href = "stafflist.php?DelId=<?php echo $result['adminId']?>";	
								}
							}
							</script>
					</tr>
				<?php
					}}
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
