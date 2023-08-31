
<?php
class Dashboard {

    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

    public function updateDeliveryStatus($id, $orderId, $deliveryStatus) {
        try {
            $con = $this->db->getConnection();
//        $query = "SELECT deliveryMemberId FROM deliverymember WHERE name=?";
//        $pstmt = $con->prepare($query);
//        $pstmt->bindValue(1, $name);
//        $pstmt->execute();
//        $result = $pstmt->fetch(PDO::FETCH_OBJ);
//
//        $deliveryMemberId = $result->deliveryMemberId;
            $stmt1 = $con->prepare("UPDATE delivery SET deliveryStatus=? WHERE orderId =? AND deliveryMemberId=?");

            $stmt1->bindParam(1, $deliveryStatus);
            $stmt1->bindParam(2, $orderId);
            $stmt1->bindParam(3, $id);
            $stmt1->execute();
            return true; // Return true if update is successful
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCountProcessing() {
        try{
        $con = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM delivery WHERE deliveryStatus='Processing'";
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
        $sql = "SELECT COUNT(*) FROM delivery WHERE deliveryStatus='Shipped'";
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
        $sql = "SELECT COUNT(*) FROM delivery WHERE deliveryStatus='Delivered'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }}

}
