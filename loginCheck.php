<?php
    include 'lib/session.php';
	 Session::init();
    include 'helpers/format.php';
    include 'lib/database.php';

	spl_autoload_register(function ($classname)
	{
		include_once "classes/".$classname.".php";
	});

	$customer = new customer();


    $username = $_POST['username'];
    $password = $_POST['password'];  
    
    $show_alert = '<script>$("#formJoin .alert").show();</script>'; // Hiển thị thông báo lỗi
$hide_alert = '<script>$("#formJoin .alert").hide();</script>'; // Ẩn thông báo lỗi
$success_alert = '<script>$("#formJoin .alert").attr("class", "alert success");</script>'; // Thông báo thành công
// Kiểm tra có tồn tại username
$query_check_exist_user = $customer->check_login($_POST);
 
// Nếu username hoặc password trống
if ($username == '' || $password == '') {
    echo $show_alert . 'Vui lòng điền đầy đủ thông tin bên trên.'; // Thông báo
}
// Ngược lại
else {
    // Nếu tồn tại username thì thực thi đăng nhập
    if ($query_check_exist_user == true) {
        // Kiểm tra thông tin đăng nhập
            echo $show_alert . $success_alert . 'Đăng nhập thành công.'; // Thông báo
            echo '<script>window.location.reload();</script>';
            //header("Location:index.php");

        // Ngược lại
    }
        else {
            echo $show_alert . 'Tên đăng nhập hoặc mật khẩu không chính xác.'; // Thông báo
        }
    
    
}
?>