<?php

include "../lib/database.php";
include "../helpers/format.php"

?>
<?php
    class category {
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            
        }
        // them san pham
        public function insert_category($catName){
            $catName = $this->fm->validation($catName);

            if(empty($catName)){
                $alert = 'must be not empty';
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                $result = $this -> db ->insert($query);
               if($result){
                   $alert = 'Them san pham thanh cong';
                   return $alert;
               }else{
                   $alert = 'Them san pham that bat';
                   return $alert;
               }
            }
        }

        //show danh sach san pham
        public function show_category(){
            $query = "SELECT * FROM tbl_category";
            $result = $this->db->select($query);
            return $result;
        }
    }


?>