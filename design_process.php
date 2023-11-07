<?php
require 'classes/DbConnector.php';

$dbcon = new DbConnector();




if(isset($_FILES['image'],$_POST["customerName"],$_POST["deliveryAddress"],$_POST["size"],$_POST["quantity"])){
    if (empty($_FILES['image'])||empty($_POST["customerName"])|| empty($_POST["deliveryAddress"])|| empty($_POST["size"])|| empty($_POST["quantity"])){
        header ("Location: design.php");
    }
    else{
        
        
        $img = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder ='img/'.$img ;
        $customerName = $_POST['customerName'];
        $deliveryAddress = $_POST['deliveryAddress'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        try {
           
            $con = $dbcon->getConnection();
            $query = "INSERT INTO designitem (image,customerName,deliveryAddress,size,quantity) VALUES (?,?,?,?,?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$img, PDO::PARAM_LOB);
            $pstmt->bindValue(2,$customerName);
            $pstmt->bindValue(3,$deliveryAddress);
            $pstmt->bindValue(4,$size);
            $pstmt->bindValue(5,$quantity);
            $pstmt->execute();
            if($pstmt->rowCount() > 0){
                $file_upload = move_uploaded_file($image_tmp_name, $image_folder); 
                echo "<script> alert('Sucessfully Add!!!!!'); 
                document.location.href = 'design.php';
                </script>";


            
                
                
                
                
            }
           


            
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
?>