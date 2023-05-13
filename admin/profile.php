<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/user.php';?>


<?php
    $user = new user();

    $id = Session::get('adminId');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updateuser = $user->Update_userProfile($_POST,$id);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit User</h2>
                <?php
                    if(isset($updateuser)){
                        echo $updateuser;
                    }
                    
                ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php
               $curuser = $user->getUserById($id);
                    if($curuser){
                        while ($user_cur = $curuser->fetch_assoc()) {

               ?>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="Name" value="<?php echo $user_cur['adminName']; ?>" class="medium" />
                    </td>
                </tr>

				<tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $user_cur['adminEmail']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $user_cur['adminUser']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $user_cur['adminPass']; ?>" class="medium" />
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>

                <?php
                                            
                        }
                    }
                ?>
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


