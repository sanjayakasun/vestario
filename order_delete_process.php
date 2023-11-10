<?php 


if(isset($_GET['id'])){
    $productid = $_GET['id'];
    require 'classes/DbConnector.php';
    $dbuser = new DbConnector();
      $con = $dbuser->getConnection();
      $query = "DELETE FROM payment WHERE productId = '$productid' ";
      $pstmt = $con->prepare($query);
      $pstmt->execute();
      if($pstmt->rowCount() >0 ){
        header('Location:payment.php');
      }else{
        echo "Not Completed";
      }

      $query2 = "DELETE FROM orders WHERE productId = '$productid' ";
      $pstmt = $con->prepare($query2);
      $pstmt->execute();
      if($pstmt->rowCount() >0 ){
        header('Location:payment.php');
      }else{
        echo "Not Completed";
      }
}
?>