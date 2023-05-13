<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/user.php';?>


<?php
    $user = new user();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insertuser = $user->insert_account($_POST);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
                <?php
                    if(isset($insertuser)){
                        echo $insertuser;
                    }
                ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="Name" placeholder="Enter Account Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Enter email..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>UserName</label>
                    </td>
                    <td>
                        <input type="text" name="user" placeholder="Enter username Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Passord</label>
                    </td>
                    <td>
                        <input type="text" name="pass" placeholder="Enter password Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Level</label>
                    </td>
                    <td>
                        <select name="level" id="">
                            <option value="0">admin</option>
                            <option value="1">staff</option>
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


