<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    // include_once require_once;
?>
<?php
    class user
    {
        private $db;
        private $fm;
        
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function getalluser(){
            $query = "SELECT * from tbl_admin ";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_account($data)
        {
            $Name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $user = mysqli_real_escape_string($this->db->link, $data['user']);
            $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
            $level = mysqli_real_escape_string($this->db->link, $data['level']);
            $pass = md5($pass);

                $query = "INSERT INTO tbl_admin(adminName,adminEmail,adminUser,adminPass,level)
                 VALUE('$Name','$email','$user','$pass','$level')";
                $result = $this->db->insert($query);

                if($result){
                    $alert = "Insert successfull !";
                    return $alert;
                }else{
                    $alert = "Something wrong !!";
                    return $alert;
                }
          
        }
       
    }
?>