<?php
	include 'inc/header.php';

    
?>

 <div class="main">
    <div class="content">
				<div class="search_nav">
			<form action="" method="POST" id="formJoin" onsubmit="return false;">		
				<div class="selectbox">
					<span>Category:</span>
					<select id="select_category" name="category">                       
							<option></option>
							<?php
								$cat = new category();
								$catlist = $cat->show_category();

								if($catlist){
									while ($result = $catlist->fetch_assoc()) {
																	   
							?>
								<option value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
							<?php
									}
								}                          
							?>
						</select>
				</div>

				<div class="selectbox pricefromto">
					<span>Price:</span>
					<input type="number" placeholder="From" id="pricefrom">
					<input type="number" placeholder="To" id="priceto">
				</div>
			
				<div class="search_box">
					<input type="text" placeholder="Search for Products" name="keyword" id="searchkey">
					<!-- <input type="submit" class="btn-submit" value="Search" name="search">	 -->
					<button class="btn-submit" id="btn-login" >Search</button>

				</div>
			</form>			
		</div>
		 <div class="clear"></div>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Search results:</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group contentsearch">
			
			</div>

	
	
    </div>
 </div>
 <script type="text/javascript">
	function Join() {
    // Khai báo các biến dữ liệu trong form
	var cat = document.querySelector("#select_category").value;
	var key = document.querySelector("#searchkey").value;
	var from = document.querySelector("#pricefrom").value;
	var to1 = document.querySelector("#priceto").value;

    // Gửi dữ liệu
    $.ajax({
        url: 'xulisearch.php', // Đường dẫn file xử lý
        type: 'POST', // Phương thức
        // Các dữ liệu
        data: {
            category: cat,
            keyword: key,
            pricefrom: from,
            priceto: to1,
            // Thực thi khi gửi dữ liệu thành công
        }, success: function (result) {
            //$('#formJoin .btn-submit').html('Bắt đầu');
            $('.contentsearch').html(result); // Thông báo
        }
    });
}
 
// Bắt sự kiện click vào nút bắt đầu của form
	$('#formJoin .btn-submit').click(function () {
		// Thực thi gửi dữ liệu
		Join();
	});
 </script>
<?php

	include 'inc/footer.php';

?>	