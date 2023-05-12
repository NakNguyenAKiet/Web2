<?php
    include 'lib/session.php';
    include 'helpers/format.php';
    include 'lib/database.php';

	spl_autoload_register(function ($classname)
	{
		include_once "classes/".$classname.".php";
	});

    $fm = new format();
    $pro = new product();

    $listPro = null;
    
    $cat = $_POST["category"];
    $from = $_POST["pricefrom"];
    $to = $_POST["priceto"];
    $key = $_POST["keyword"];
    
    $listPro = $pro->getbyallinformation($_POST);
    
    if($listPro){
			while ($product = $listPro->fetch_assoc()) {						
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $product['productId'] ?>"><img style="height:220px" src="admin/uploads/<?php echo $product['image']?>" alt="" /></a>
					 <h2><?php echo $product['productName']; ?> </h2>
					 <?php echo $fm->textShorten($product['productDesc'],30); ?>
					 <p><span class="price"><?php echo $product['price']; ?> .đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $product['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php
					}
				}else {
					echo "<h3 style='font-size:40px'>No products were found!</h3>";
				}	
?>