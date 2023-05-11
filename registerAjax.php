<?php
    include 'lib/session.php';
    include 'helpers/format.php';
    include 'lib/database.php';
    Session::init();

	spl_autoload_register(function ($classname)
	{
		include_once "classes/".$classname.".php";
	});

	$customer = new customer();
    
    $show_alert = '<script>$("#formJoin .alert").show();</script>'; // Hiển thị thông báo lỗi
    $hide_alert = '<script>$("#formJoin .alert").hide();</script>'; // Ẩn thông báo lỗi
    $success_alert = '<script>$("#formJoin .alert").attr("class", "alert success");</script>'; // Thông báo thành công

    $email = $_POST["username"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo $show_alert . "Invalid email format";
    }
    else {
        // Kiểm tra có tồn tại username
    $query_check_exist_email = $customer->query_check_exist_email($_POST);
 
    // Nếu tồn tại username thì thực thi đăng nhập
    if ($query_check_exist_email == false) {
        // Kiểm tra thông tin đăng nhập
            echo $show_alert . $success_alert . 'Tạo tài khoản thành công'; // Thông báo
            echo '<script>window.location.reload();</script>';

    }
        else {
            echo $show_alert . 'email đã tồn tại'; // Thông báo
        } 
    }   

?>