<?php

require_once 'DbConnector.php';
use classes\DbConnector;
class Admin 
{
  


    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

    public function getUserCount() {
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM registeredcustomer ;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
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
  
    }




 