<?php


require_once 'DbConnector.php';

if(isset($_GET['delete'])){
     $id = $_GET['delete'];
     $db = new DbConnector();
   $con = $db->getConnection();
   $sql = "DELETE  FROM review WHERE reviewId=$id ";
   $stmt = $con->prepare($sql);
   $a = $stmt->execute();  
   if($a >0) {
    header('Location:../admin_dashboard.php');
   }
}

class Admin 
{
  


    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

//    public function getUserCount() {
//        $con = $this->db->getConnection();
//        $sql = "SELECT COUNT(*) FROM user WHERE role='customer'";
//        $stmt = $con->prepare($sql);
//        $stmt->execute();
//        $count = $stmt->fetchColumn();
//        return $count;
//    }
         public function getCount($tablename) {
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM $tablename";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    public function getUsers($tablename) {
        $con = $this->db->getConnection();
        $sql = "SELECT * FROM $tablename ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUser($tablename) {
        $con = $this->db->getConnection();
        $sql = "SELECT * FROM $tablename";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
   
    
    }




 