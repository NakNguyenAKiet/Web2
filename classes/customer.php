<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    // include_once require_once;

?>


<?php

    class customer
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data)
        {
            $name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $city = mysqli_real_escape_string($this->db->link, $data['City']);
            //$zip = mysqli_real_escape_string($this->db->link, $data['Zip-Code']);
            //$country = mysqli_real_escape_string($this->db->link, $data['Country']);
            $email = mysqli_real_escape_string($this->db->link, $data['username']);
            $phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
            $pass = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $add = mysqli_real_escape_string($this->db->link, $data['Address']);

            $query = "INSERT INTO tbl_customer(name,address,city,country,zipcode,phone,email,password)
                VALUES('$name','$add','$city','VietNam','123','$phone','$email','$pass')";
                $result = $this->db->insert($query);

                if($result){
                    $alert = "<span class = 'successfull' style='color:green'> Created account successfull !! </span>";
                    return $alert;
                }else{
                    $alert = "<script>alert('sql wrong') </script>";
                    return $alert;
                }
            
        }

        public function check_login($data)
        {
            $user = mysqli_real_escape_string($this->db->link, $data['username']);
            $pass = mysqli_real_escape_string($this->db->link, md5($data['password']));

            $query = "SELECT * from tbl_customer where email='$user' and password='$pass'";
            $result = $this->db->select($query);
            if($result){
                $customer = $result->fetch_assoc();
                Session::set("checklogin",true);
                Session::set("username",$customer["name"]);
                Session::set("customerid",$customer["id"]);

                //header("Location:index.php");
                return true;
            }else{           
                return false;
            }      
        }

        public function get_by_id($cusId)
        {
            $query = "SELECT * from tbl_customer where id='$cusId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function edit_customer($data,$cusId){
            $name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $city = mysqli_real_escape_string($this->db->link, $data['City']);
            $zip = mysqli_real_escape_string($this->db->link, $data['Zip-Code']);
            $country = mysqli_real_escape_string($this->db->link, $data['Country']);

            $phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
            $add = mysqli_real_escape_string($this->db->link, $data['Address']);


            $query = "UPDATE tbl_customer SET name='$name', address='$add',city='$city',country ='$country',zipcode='$zip',phone='$phone' where id='$cusId'";
                $result = $this->db->insert($query);

                if($result){
                    $alert = "<span class = 'successfull' style='color:green'> Update account successfull !! </span>";
                    return $alert;
                }else{
                    $alert = "<span class = 'successfull'> Something wrong !! </span>";
                    return $alert;
                }
        }

        public function query_check_exist_email($data){
            $email = mysqli_real_escape_string($this->db->link, $data['username']);
            $query = "SELECT * from tbl_customer where email='$email'";
                $result = $this->db->select($query);
                if($result){
                    //header("Location:index.php");                  
                return true;
                }else{
                    $a = $this->insert_customer($data);
                    $b = $this->check_login($data);
                    return false;
                }  
        }
    }

?>    