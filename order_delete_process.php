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

if(isset($_GET['cid'])){
  $cid = $_GET['cid'];
  require 'classes/DbConnector.php';
  $dbuser = new DbConnector();
  // $con = $dbuser->getConnection();
    // $query = "SELECT cartId  FROM payment WHERE customerId = '$cid' ";
    // $pstmt = $con->prepare($query);
    // $pstmt->execute();
    // $users = $pstmt->fetch(PDO::FETCH_ASSOC);
    // foreach($users as $rows){
    //   $cartid = $rows['cartId'];
    //   $query = "DELETE FROM cart WHERE cartId = '$cartid' ";
    // $pstmt = $con->prepare($query);
    // $pstmt->execute();
    // }
    
    
    $con = $dbuser->getConnection();
    $query = "DELETE FROM payment WHERE customerId = '$cid' ";
    $pstmt = $con->prepare($query);
    $pstmt->execute();
    if($pstmt->rowCount() >0 ){
      header('Location:payment.php');
    }else{
      echo "Not Completed";
    }

}


?>