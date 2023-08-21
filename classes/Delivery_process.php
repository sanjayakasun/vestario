
<?php 
class Dashboard {
    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

    public function updateDeliveryStatus($name, $orderId, $deliveryStatus) {
        try {
            $con = $this->db->getConnection();
            $stmt = $con->prepare("UPDATE delivery SET deliveryStatus = :deliveryStatus WHERE orderId = :orderId AND  name = :name");
            $stmt->bindParam(':deliveryStatus', $deliveryStatus);
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return true; // Return true if update is successful
        } catch (PDOException $e) {
            // Handle the exception (e.g., log, return false)
            return false; // Return false if update fails
        }
    }
}
