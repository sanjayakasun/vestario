<?php

require_once 'DbConnector.php';
use classes\DbConnector;
class Admin 
{
  


    

    public function getUserCount() {
        
        $dbcon = new DbConnector();
    $con = $dbcon->getConnection();
        $sql = "SELECT COUNT(*) FROM user WHERE role='customer'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
         public function getCount($tablename) {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
        $sql = "SELECT COUNT(*) FROM $tablename";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    public function getUsers($tablename) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $sql = "SELECT * FROM $tablename ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
  
    }




 