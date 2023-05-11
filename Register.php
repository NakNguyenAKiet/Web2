<?php
	include 'inc/header.php';

	if(Session::get('username') != null){
    	header("Location:index.php");	
	}
?>

 <div class="main">
    <div class="content">
		<div class="content_top content_top_center">
    		<div class="heading">
    		<h3>Already have an account</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		
    	 <div class="login_panel">
        	<h3>Login</h3>
			<?php
				if (isset($checklogin)) {
					echo $checklogin;
				}
			?>
        	<form action="" method="POST" id="formJoin" onsubmit="return false;">
				<div class="alert danger" style="color: red"></div>
				<input  type="text" name="user" id="E-Mail" class="field" placeholder="Email" required>
				<input  type="password" name="pass" id="Password" class="field" placeholder="Password" required>
				<input type="text" name="pass" id="Name" class="field" placeholder="Name" required>
				<input type="text" name="pass" id="Phone" class="field" placeholder="Phone" required>
				<input type="text" name="pass" id="Address" class="field" placeholder="Address" required>
				<input type="text" name="pass" id="City" class="field" placeholder="City" required>

				<a href="./Register.php">Don't Have account? Register here.</a>			
				<button class="buttons login_buton btn-submit" id="btn-login" style="padding:8px; margin-top:2px">Login</button>
			</form>
         </div>
    		<div class="clear"></div>
    </div>
 </div>
 <script type="text/javascript">
	function Join() {
    // Khai báo các biến dữ liệu trong form
    //$username = $('#username').val();
    //$password = $('#password').val();
	var usernamevl = document.querySelector("#E-Mail").value;
	var pass = document.querySelector("#Password").value;
	var phone1 = document.querySelector("#Phone").value;
	var add = document.querySelector("#Address").value;
	var name1 = document.querySelector("#Name").value;
	var ct = document.querySelector("#City").value;

    // Gửi dữ liệu
    $.ajax({
        url: 'registerAjax.php', // Đường dẫn file xử lý
        type: 'POST', // Phương thức
        // Các dữ liệu
        data: {
            Email: usernamevl,
            Password: pass,
            Phone: phone1,
            Address: add,
            Name: name1,
            City: ct,
            // Thực thi khi gửi dữ liệu thành công
        }, success: function (result) {
            $('#formJoin #btn-login').html('Bắt đầu');
            $('#formJoin .alert').html(result); // Thông báo
        }
    });
}
 
// Bắt sự kiện click vào nút bắt đầu của form
	$('#formJoin .btn-submit').click(function () {
		$(this).html('Đang tải ...');
		// Thực thi gửi dữ liệu
		Join();
	});
 </script>
<?php

	include 'inc/footer.php';

?>	