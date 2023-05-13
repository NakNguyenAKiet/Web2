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

        public function Update_user($data,$id)
        {
            $name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $level = mysqli_real_escape_string($this->db->link, $data['level']);

            $query = "update tbl_admin set
                adminName='$name',
                adminEmail='$email',
                level='$level'
                          
                where adminId='$id'";     
                   
                $result = $this->db->update($query);

                if($result){
                    $alert = "Update successfull !";
                    return $alert;
                }else{
                    $alert = "Something wrong !!";
                    return $alert;
                }
        }

        public function Update_userProfile($data,$id)
        {
            $name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $pass = mysqli_real_escape_string($this->db->link, $data['password']);
            $user = mysqli_real_escape_string($this->db->link, $data['username']);

            $pass = md5($pass);

            $query = "update tbl_admin set
                adminName='$name',
                adminEmail='$email',
                adminPass='$pass',
                adminUser='$user'
                where adminId='$id'";     
                   
                $result = $this->db->update($query);

                if($result){
                    $alert = "Update successfull !";
                    return $alert;
                }else{
                    $alert = "Something wrong !!";
                    return $alert;
                }
                

        }

        public function del_user($Id)
        {
            $query = "DELETE FROM tbl_admin WHERE adminId = '$Id';";
            $result = $this->db->delete($query);
            if($result)
            return 'delete successfull !';
            return 'FAILED';
        }

        public function getUserById($id)
        {
            $query = "SELECT * FROM tbl_admin WHERE adminId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
    }
?>