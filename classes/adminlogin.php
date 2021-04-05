<?php
include "../lib/session.php";
Session::checkLogin();
include "../lib/database.php";
include "../helpers/format.php"

?>
<?php
    class adminlogin {
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            
        }
        public function login_admin($adminUser, $adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);


            // $adminUser 
            if(empty($adminUser) || empty($adminPass)){
                $alert = 'must be not empty';
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
                $result = $this -> db ->select($query);
                if($result != false){
                    $value = $result->fetch(PDO::FETCH_ASSOC);
                    Session::set('adminlogin', true);
                    Session::set('adminid', $value['adminid']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);

                    header('Location:index.php');
                    // $alert = 'thanh cong';
                    // return $alert;
                    
                }else{
                    $alert = 'must not match';
                    return $alert;
                }
            }
        }
    }


?>