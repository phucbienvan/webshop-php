<?php
include "../config/config.php";
?>
    
<?php
Class Database{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;
 
 
   public $conn;
   public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 
public function connectDB(){
    try {
      $this->conn = new PDO("mysql:host=localhost:3307;dbname=website_mvc;charset=utf8", 'root', '');
      
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } 
  // Nhánh kết nối thất bại
  catch (PDOException $e) {
      echo "Kết nối thất bại: " . $e->getMessage();
  }
}
  
 // Select or Read data
 public function select($query){
   try {
    //  $this->connectDB();
    $result = $this->conn->prepare("$query");
    $result -> execute();
    $count = $result -> rowCount();
    if($count > 0){
      return $result;
    }else{
      return false;
    }  
  } 
    catch (PDOException $e) {
      echo $e->getMessage();
  }
}
  
 // Insert data
 public function insert($query){
       try {
        $insert_row = $this->conn->prepare("$query");
        $insert_row->execute();
        $count = $insert_row -> rowCount();
        if($count > 0){
          return $insert_row;
        }else{
          return false;
        }  
      } 
        catch (PDOException $e) {
          echo $e->getMessage();
      }
    }
     
   // Update data
    public function update($query){
       try {
        $update_row  = $this->conn->prepare("$query");
        $update_row ->execute();
        $count = $update_row  -> rowCount();
        if($count > 0){
          return $update_row ;
        }else{
          return false;
        }  
      } 
        catch (PDOException $e) {
          echo $e->getMessage();
      }
    }
     
   // Delete data
    public function delete($query){
       try {
        $delete_row  = $this->conn->prepare("$query");
        $delete_row ->execute();
        $count = $delete_row -> rowCount();
        if($count > 0){
          return $delete_row ;
        }else{
          return false;
        }  
      } 
        catch (PDOException $e) {
          echo $e->getMessage();
      }
    } 
      
}