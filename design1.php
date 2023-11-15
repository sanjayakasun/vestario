<?php
require_once './classes/DbConnector.php';
require_once './classes/design_process.php';



if(isset($_FILES['image'],$_POST["customerName"],$_POST["email"],$_POST["deliveryAddress"],$_POST["size"],$_POST["quantity"])){
    if(empty($_FILES['image'])||empty($_POST["customerName"])||empty($_POST["email"])|| empty($_POST["deliveryAddress"])|| empty($_POST["size"])|| empty($_POST["quantity"])){
        $location = "design.php?status=1";
    }
    else{
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder ='img/'.$image ;
        $customerId = $_POST['customerName'];
        $email = $_POST['email'];
        $deliveryAddress = $_POST['deliveryAddress'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $design_process = new design_process($image,$customerId,$email,$deliveryAddress,$size,$quantity); 

        if($design_process->deliveryProcess($con)){
            $file_upload = move_uploaded_file($image_tmp_name, $image_folder); 
            $location ="design.php?status=2";
        }
       else {
            $location ="design.php?status=3";  
        }


    }
}
else {
    $location="design.php?status=0";
}
header("Location:".$location);
?>
