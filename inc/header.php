<?php
    include 'lib/session.php';
	 Session::init();
    include 'helpers/format.php';
    include 'lib/database.php';

	spl_autoload_register(function ($classname)
	{
		include_once "classes/".$classname.".php";
	});
	
	$db = new Database();
	$fm = new Format();
	$cat = new category();
	$user = new user();
	$cart = new cart();
	$pro = new product();
	$brand = new brand();
	$customer = new customer();

	if(isset($_GET['customerid'])){
		$delcart = $cart->del_all_cart();
		Session::destroy();
	}

	$checkLogin = Session::get("checklogin");


?>



<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/newcss.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/themify-icons/themify-icons.css" rel="stylesheet" type="text/css" media="all"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Quicksand&display=swap" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
	<style>
		

	</style>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><span class="sign">Nak Shop</span></a>
			</div>
			  <div class="header_top_right">	
				
					<div class="login">
						<?php
							if($checkLogin){
								echo "<a href='?customerid=".Session::get('customerid')."'>Logout></a>";
							}else{
								echo "<a href='login.php'>Login</a> <i class='ti-user'></i>";
							}
						?>			
					</div>
					<?php					
						if($checkLogin){
							$cusId =   Session::get('customerid');  
    						$cus = $customer->get_by_id($cusId);
							echo '<div class="hello_user">
									<span>
										'.$cus->fetch_assoc()["name"].'
									</span>
								</div>';
						}
					?>	
		 <div class="clear"></div>
	 	</div>
		 <div class="clear"></div>
		 <div class="wrapp-cart">					
				<div class="cart-icon">
				<a href="cart.php">
					<i class="ti-shopping-cart"></i>
				</a>
				</div>
				<div class="cart">
					<a href="cart.php" title="View my shopping cart" rel="nofollow">
							
							<span class="no_product">
							<?php
								$check_cart = $cart->check_cart();
								if($check_cart){
									$ProInCart = Session::get("ProInCart");
									echo '<a class="product_cart"> '.$ProInCart.'</a>';
								}else {
									echo '<a class="product_cart"> 0 </a>';
								}
							?>
								
							</span>
						</a>
				</div>
			</div>		
		</div>
		 <div class="clear"></div>

<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="search.php">Search</a> </li>
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="#">Category</a> 
	  	<ul>
			<?php
				$listCat = $cat->show_category();
				if($listCat){
					while ($catitem = $listCat->fetch_assoc()) {
											
			?>
				<li><a href="productbycat.php?catId=<?php echo $catitem['catId']?>"><?php echo $catitem['catName']?></a></li>
			<?php
				}
			}
			?>

    	</ul>
		</li>

	  <li><a href="topbrands.php">Top Brands</a></li>

	  <?php
	  
		if($checkLogin == true){
			echo "<li><a href='ordered.php'>Ordered</a></li>";
	  		echo "<li><a href='profile.php'>Profile</a></li>";
		}else{
			echo "";
		}
	  ?>
	  
	  <li><a href="contact.php">Contact</a> </li>
	  
	  <div class="clear"></div>
	</ul>
</div>

<!-- <script > alert(document.getElementById('select_category').value)</script> -->