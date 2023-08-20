<?php
session_start(); 

// Check if the user is logged in
if (isset($_SESSION['customerId'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
    
    // Redirect to the home page
    header("Location: home.php"); 
    exit();
}
?>