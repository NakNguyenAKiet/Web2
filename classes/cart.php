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
    
        public function insert_order($cusId)
        {
            $sId = session_Id();

            $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";

            $products = $this->db->select($query);

            if ($products) {
                while ($product = $products->fetch_assoc()) {
                    $proId = $product["productId"];
                    $proName = $product["productName"];
                    $quan = $product["quantity"];
                    $price = $product["price"]*$quan;
                    $image = $product["image"];
                    $query = "INSERT INTO tbl_order(productName,productId,price,image,quantity,customerId)
                    VALUE('$proName','$proId','$price','$image','$quan','$cusId')";
                    $result = $this->db->insert($query);
                }
            }
            return $result;
            
        }

        public function get_pro_ordered($cusId)
        {
            $query = "SELECT * FROM tbl_order WHERE customerId='$cusId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_all_order()
        {
            $query = "SELECT * FROM tbl_order";
            $result = $this->db->select($query);
            return $result;
        }

        public function set_shifted($id)
        {
            $query = "UPDATE tbl_order SET status='1' WHERE id='$id'";
            $result = $this->db->update($query);
            if($result){
                return '<span style="color: green">Update successfull !</span>';
            }else {
                return '<span style="color: red">Something wrong !!!</span>';               
            }
        }

        public function del_ordered($id)
        {
            $query = "DELETE FROM tbl_order WHERE id='$id'";

            $result = $this->db->delete($query);

            if($result){
                return '<span style="color: green">Delete successfull !</span>';
            }else {
                return '<span style="color: red">Something wrong !!!</span>';               
            }
        }
    }
    

?>