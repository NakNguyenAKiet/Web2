<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                <?php 
                    $level = Session::get('level');
                    if($level == 0){
                        echo '
                            <li><a class="menuitem">Staff Manager</a>
                                <ul class="submenu">
                                    <li><a href="staffadd.php">Add Account Account</a> </li>
                                    <li><a href="stafflist.php">Manage Account</a> </li>
                                </ul>
                            </li>
                        ';
                    }else {
                        echo '
                        <li><a class="menuitem">Category</a>
                            <ul class="submenu">
                                <li><a href="catadd.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Brand</a>
                            <ul class="submenu">
                                <li><a href="brandadd.php">Add Brand</a> </li>
                                <li><a href="brandlist.php">List Brand</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Product</a>
                            <ul class="submenu">
                                <li><a href="productadd.php">Add Product</a> </li>
                                <li><a href="productlist.php">List Product</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Slider</a>
                            <ul class="submenu">
                                <li><a href="slideradd.php">Add Slider</a> </li>
                                <li><a href="sliderlist.php">List Slider</a> </li>
                            </ul>
                        </li>
                        ';
                    }
                ?>
                
               <!-- <li><a class="menuitem">Site Option</a>
                    <ul class="submenu">
                        <li><a href="titleslogan.php">Title & Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        <li><a href="copyright.php">Copyright</a></li>
                        
                    </ul>
                </li>
				
                 <li><a class="menuitem">Pages</a>
                    <ul class="submenu">
                        <li><a>About Us</a></li>
                        <li><a>Contact Us</a></li>
                    </ul>
                </li>
				<li><a class="menuitem">Slider Option</a>
                    <ul class="submenu">
                        <li><a href="addslider.php">Add Slider</a> </li>
                        <li><a href="sliderlist.php">Slider List</a> </li>
                    </ul>
                </li> -->
                
   
            </ul>
        </div>
    </div>
</div>