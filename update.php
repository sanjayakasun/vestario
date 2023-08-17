<?php

require './classes/DbConnector.php';
use classes\DbConnector;

$dbcon = new DbConnector();

// @include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_size = $_POST['size'];
   
//   $product_image = $_FILES['product_image']['name'];
//   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
//   $product_image_folder = 'img/'.$product_image;


   if(empty($product_name) || empty($product_price) || empty($product_size)){
      $message[] = 'please fill out all!';    
   }else{
      $con = $dbcon->getConnection();

      $update_data = "UPDATE product SET product_name='$product_name', price='$product_price', size='$product_size'  WHERE product_id = '$id'";

      $pstmt = $con->prepare($update_data);
      $pstmt->execute();

      // $upload = mysqli_query($conn, $update_data);

      if($pstmt){
//         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      $con2 = $dbcon->getConnection();
      $select = "SELECT * FROM product WHERE product_id = '$id'";
      $pstmt = $con2->query($select);
      $rs = $pstmt->fetch(PDO::FETCH_ASSOC);
       foreach($rs as $rows){
           $p_name = $rs['product_name'];
           $p_price = $rs['price'];
           $size= $rs['size'];
       }

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $p_name;?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $p_price;?>" placeholder="enter the product price">
      <input type="text" class="box" name="size" value="<?php echo $size;?>" placeholder="enter product size">
      
<!--      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">-->
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="Admin.php" class="btn">go back!</a>
   </form>
   

   

</div>

</div>

</body>
</html>