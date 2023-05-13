<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php

    $brand = new brand();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];
        $insertbrand = $brand->insert_brand($brandName);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Welcome to admin panel !</h2>
                
            </div>
        </div>
<?php include 'inc/footer.php';?>