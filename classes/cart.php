<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    // include_once require_once;

?>


<?php

    class cart
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_to_cart($id, $quantity){

            $id = mysqli_real_escape_string($this->db->link, $id);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $sId = session_id();

            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";

            $result = $this->db->select($query)->fetch_assoc();  
            
            $check_exist = "SELECT * FROM tbl_cart WHERE productId = '$id' and sId='$sId'";

            $check = $this->db->select($check_exist);

            if($check){
                //$cur_quan = $check->fetch_assoc();
                //$total_quan = $quantity + $cur_quan["quantity"];
                //$query = "UPDATE tbl_cart SET quantity='$total_quan' where productId = '$id'";
                $msg = "PRODUCT ALREADY ADDED!";
                return $msg;
            }else {
                $query = "INSERT INTO tbl_cart(productName,productId,price,image,quantity,sId)
                VALUE('$result[productName]','$id','$result[price]','$result[image]','$quantity','$sId')";
            }           
                $result2 = $this->db->insert($query);

                if($result2){
                    header('Location:cart.php');
                }else{
                    header('Location:404.php');
                }

        }
         public function get_pro_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            return $this->db->select($query);
        }

        public function update_quan($quan, $cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $quan = mysqli_real_escape_string($this->db->link, $quan);
            $query = "UPDATE tbl_cart SET quantity = '$quan' WHERE cartId = '$cartid'";
            $result = $this->db->update($query);

            if($result){
                return '<span style="color: green">Update quantity successfull !</span>';
            }else {
                return '<span style="color: red">Something wrong !!!</span>';               
            }

            
        }

        public function delete_product($cartdelid){
            $cartdelid = mysqli_real_escape_string($this->db->link, $cartdelid);

            $query = "DELETE from tbl_cart WHERE cartId = '$cartdelid'";
            $result = $this->db->delete($query);

            if($result){
                header('Location: cart.php');
            }else {
                return '<span style="color: red">Something wrong !!!</span>';               
            }
        }

        public function check_cart(){
            $sId = session_Id();

            $check_exist = "SELECT * FROM tbl_cart WHERE sId='$sId'";

            $check = $this->db->select($check_exist);

            return $check;

        }

        public function del_all_cart(){
            $sid = session_Id();
            $query = "DELETE FROM tbl_cart WHERE sId='$sid'";

            $check = $this->db->select($query);

            return $check;
        }

        public function CreatHoadon($cusId){
            $query = "insert into hoadon(TongTien, CustomerId) value('0','$cusId')";
            $result = $this->db->insert($query);
            if($result){

            }else {
                echo "<script> alert(\"creat hoa don error\");</script>";
            }
        }
    
        public function insert_order($cusId)
        {
            //tao new hoa don 
            $this->CreatHoadon($cusId);
            
            // lay hoa don moi nhat de them san pham
            $query = "SELECT * FROM hoadon                        
             ORDER BY mahd DESC LIMIT 1";
            $result = $this->db->select($query);
            $hoadon = $result->fetch_assoc();
            $mahd = $hoadon['mahd'];

            //them sp vao bang chi tiet hoa don
            $sId = session_Id();

            $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";

            $products = $this->db->select($query);

            $tongtien = 0;
            if ($products) {
                while ($product = $products->fetch_assoc()) {
                    //them sp vao bang chi tiet hoa don
                    $proId = $product["productId"];
                    $quan = $product["quantity"];

                    //tinh gia * so luon
                    $price = $product["price"];
                    $price *= $quan;

                    $query = "INSERT INTO chitiethoadon(productId,mahd, SoLuong, TongGia)
                    VALUE('$proId','$mahd','$quan',' $price')";
                    $result = $this->db->insert($query);

                    $tongtien += $price;
                }
            }
            $tongtien += $tongtien*0.1;
            $query = "UPDATE hoadon SET TongTien='$tongtien' where mahd='$mahd '";
            $result = $this->db->update($query);

            return $result;
            
        }

        public function get_pro_ordered($cusId)
        {
            $query = "SELECT * FROM tbl_order WHERE customerId='$cusId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAllHoadon()
        {
            $query = "SELECT * FROM hoadon";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAllHoadonDate($data){
            $from = $data['datefrom'];
            $to = $data['dateto'];
            if ($from == "") {
                $from = "2000-01-01";
            }
            if ($to == "") {
                $to = "2025-01-01";
            }
            $query = "SELECT * FROM hoadon where NgayLap >= '$from' and NgayLap <= '$to'";
            $result = $this->db->select($query);
            return $result;

        }

        public function get_ordered($cusId){
            $query = "SELECT * FROM hoadon WHERE CustomerId='$cusId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getDetailOrder($mahd){
            $query ="SELECT * FROM `tbl_product` a,chitiethoadon c WHERE 
            a.productId = c.productId and c.mahd = '$mahd' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function set_shifted($id)
        {
            $query = "UPDATE hoadon SET status='1' WHERE mahd='$id'";
            $result = $this->db->update($query);
            if($result){
                return ':Update successfull !';
            }else {
                return ':Something wrong !!!';               
            }
        }

        public function del_ordered($id)
        {
            $query = "DELETE FROM hoadon WHERE mahd='$id'";

            $result = $this->db->delete($query);

            if($result){
                return '<span style="color: green">Delete successfull !</span>';
            }else {
                return '<span style="color: red">Something wrong !!!</span>';               
            }
        }

        public function get_all_statistic(){
            $query = "SELECT * FROM tbl_statistic";
            $result = $this->db->select($query);
            return $result;
        }
    
        public function insert_statistic($id){
            $query = "SELECT * FROM tbl_order WHERE Id='$id'";
    
            $result1 = $this->db->select($query);
            $result = false;
            if($result1){
                while($order = $result1->fetch_assoc()){
                    $proId = $order["productId"];
                    $proName = $order["productName"];
                    $cusId = $order["customerId"];
                    $quan = $order["quantity"];
                    $price = $order["price"];
                    $image = $order["image"];
                    $date_order = $order["date_order"]; 
                    $query = "INSERT INTO tbl_statistic(productName,productId,price,image,quantity,customerId,date_order)
                    VALUE('$proName','$proId','$price','$image','$quan','$cusId','$date_order')";
                    $result = $this->db->insert($query);
                }
            }
            return $result;
        }
    }
    

?>