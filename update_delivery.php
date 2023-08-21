<?php 

require_once 'classes/DbConnector.php'; // Include your DB connection
require_once 'classes/Delivery_process.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $orderId = $_POST['orderid'];
    $deliveryStatus = $_POST['status'];
    
    $dashboard = new Dashboard();
    $success = $dashboard->updateDeliveryStatus($name, $orderId, $deliveryStatus);
    
    if ($success) {
        // Redirect back to the form or display a success message
        header('Location: delivery.php');
        exit;
    } else {
        // Handle update failure (e.g., display an error message)
        echo "Failed to update delivery status.";
    }
} else {
    // Invalid request
    http_response_code(400);
    echo "Invalid request.";
}


