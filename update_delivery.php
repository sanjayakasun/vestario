<?php 

require_once 'classes/DbConnector.php'; // Include your DB connection
require_once 'classes/Delivery_process.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $orderId = $_POST['orderid'];
    $deliveryStatus = $_POST['status'];
    $location = $_POST['location'];
    
    $dashboard = new Dashboard();
    $success = $dashboard->updateDeliveryStatus($id, $orderId, $deliveryStatus,$location);
    if ($success) {
        // Redirect back to the form or display a success message
        header('Location: delivery.php?error=0');
        exit;
    } else {
        // Handle update failure (e.g., display an error message)
                header('Location: delivery.php?error=1');

    }
} else {
    // Invalid request
    http_response_code(400);
            header('Location: delivery.php?error=2');


}


