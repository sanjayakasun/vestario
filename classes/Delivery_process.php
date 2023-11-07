
<?php
class Dashboard {

    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

    public function updateDeliveryStatus($id, $orderId, $deliveryStatus,$location) {
        try {
            $con = $this->db->getConnection();
            $stmt1 = $con->prepare("UPDATE orders SET deliveryStatus=? ,location=? WHERE orderId =?");

            $stmt1->bindParam(1, $deliveryStatus);
            $stmt1->bindParam(2, $location);
            $stmt1->bindParam(3, $orderId);
            $a=$stmt1->execute();
            return true; // Return true if update is successful
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCountProcessing() {
        try{
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM orders WHERE deliveryStatus='Processing'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }}

    public function getCountShipped() {
        try{
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM orders WHERE deliveryStatus='Shipped'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }}

    public function getCountDelivered() {
        try{
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM orders WHERE deliveryStatus='Delivered'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }}
public function getUsers($tablename) {
        $con = $this->db->getConnection();
        $sql = "SELECT * FROM $tablename ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
   
}
