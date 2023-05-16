<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    // include_once require_once;

?>

<?php 
    class statistic
    {
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_all_statistic(){
            $query = "SELECT * FROM hoadon";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_date_statistic($data){
            $date_frm = $data['staFrom'];
            $date_to = $data['staTo'];

            $curr_year = date("Y");
            if($date_frm == ""){
                $date_frm = $curr_year . "-01-01";
            }
            if($date_to == ""){
                $date_to = $curr_year . "-12-31";
            }

            $query = "SELECT * FROM hoadon WHERE NgayLap BETWEEN '$date_frm' AND '$date_to'";
            $result = $this->db->select($query);

            return $result;
        }

        public function get_type_product(){
            $query = "SELECT * FROM tbl_brand";
            $result = $this->db->select($query);
            
            return $result;
        }

        public function get_type_statistic($data){
            $date_frm = $data['staFrom'];
            $date_to = $data['staTo'];
            $type = $data['typeSta'];

            $curr_year = date("Y");
            if($date_frm == ""){
                $date_frm = $curr_year-5 . "-01-01";
            }
            if($date_to == ""){
                $date_to = $curr_year . "-12-31";
            }
            if($date_to < $date_frm){
                return false;
            }

            $query = "SELECT hd.mahd,ct.SoLuong,ct.TongGia,hd.NgayLap,b.brandName,p.productName 
            FROM hoadon as hd, chitiethoadon as ct, tbl_product as p, tbl_brand as b 
            where ct.mahd = hd.mahd and p.productId = ct.productId and b.brandId = p.brandId
            and b.brandId = $type and hd.NgayLap BETWEEN '$date_frm' AND '$date_to'";

            $result = $this->db->select($query);
            return $result;
        }

        public function get_Sell($data){
            $date_frm = $data['staProFrom'];
            $date_to = $data['staProTo'];

            $curr_year = date("Y");
            if($date_frm == ""){
                $date_frm = $curr_year-5 . "-01-01";
            }
            if($date_to == ""){
                $date_to = $curr_year . "-12-31";
            }
            if($date_to < $date_frm){
                return false;
            }
            $query = "SELECT hd.mahd,ct.SoLuong,ct.TongGia,hd.NgayLap,p.productName ,p.productId
            FROM hoadon as hd, chitiethoadon as ct, tbl_product as p
            where ct.mahd = hd.mahd and p.productId = ct.productId
            and hd.NgayLap BETWEEN '$date_frm' AND '$date_to' and ct.TongGia > 0";

            $result = $this->db->select($query);
            return $result;
        }

        public function get_AllSell(){
            $query = "SELECT hd.mahd,ct.SoLuong,ct.TongGia,hd.NgayLap,p.productName ,p.productId
            FROM hoadon as hd, chitiethoadon as ct, tbl_product as p
            where ct.mahd = hd.mahd and p.productId = ct.productId
            and ct.TongGia > 0";

            $result = $this->db->select($query);
            return $result;
        }
    }
?>