<?php

	include 'inc/header.php';
	include 'inc/slider.php';


?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Oppo</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
				$pronewlist = $pro->getOppo();
				while ($pro_Newitem = $pronewlist->fetch_assoc()) {
										
			?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>"><img src="admin/uploads/<?php echo $pro_Newitem['image']; ?>" alt="" width = 220 height = 220 /></a>
				<h2><?php echo $pro_Newitem['productName']; ?> </h2>
				<p><?php echo $fm->textShorten($pro_Newitem['productDesc'],30); ?></p>
				<p><span class="price"><?php echo $pro_Newitem['price']; ?> .đ</span></p>
				<div class="button"><span><a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
				}
			?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$pronewlist = $pro->getSS();
					while ($pro_Newitem = $pronewlist->fetch_assoc()) {
										
				?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>"><img src="admin/uploads/<?php echo $pro_Newitem['image']; ?>" alt="" width = 220 height = 220 /></a>
						<h2><?php echo $pro_Newitem['productName']; ?> </h2>
						<p><?php echo $fm->textShorten($pro_Newitem['productDesc'],30); ?></p>
						<p><span class="price"><?php echo $pro_Newitem['price']; ?> .đ</span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>" class="details">Details</a></span></div>
					</div>
				<?php
					}
				?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Dell</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$pronewlist = $pro->getDell();
					while ($pro_Newitem = $pronewlist->fetch_assoc()) {
										
				?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>"><img src="admin/uploads/<?php echo $pro_Newitem['image']; ?>" alt="" width = 220 height = 220 /></a>
						<h2><?php echo $pro_Newitem['productName']; ?> </h2>
						<p><?php echo $fm->textShorten($pro_Newitem['productDesc'],30); ?></p>
						<p><span class="price"><?php echo $pro_Newitem['price']; ?> .đ</span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $pro_Newitem['productId'] ?>" class="details">Details</a></span></div>
					</div>
				<?php
					}
				?>
			</div>
    </div>
 </div>
<?php

	include 'inc/footer.php';

?>	