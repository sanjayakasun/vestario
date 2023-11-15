<?php

 //require_once 'classes/DbConnector.php';
require 'classes/cart_process.php';

use classes\cart_process;
$Userrr = new cart();

session_start();
    if(!isset($_SESSION['customerId'])){
        header('Location:login.php');
    }
    // storing customer id from session
    $cusid = $_SESSION['customerId'];        
                                
                                 
//    if (isset($_GET['cart'])) {              
//    $cartId = $_GET['cart'];
//    $size = $_POST['size'];    
//      $Userrr->getProductDetails($size);                  
//}
if (isset($_GET['cart'])) {
    
    $size = $_POST['size'];

    $cartId = $_GET['cart'];
    $size = $_POST['size'];
    
      $Userrr->getProductDetails($cartId,$cusid,$size);               
    
}
 
    
  if (isset($_GET['delete'])) {
    $cartId = $_GET['delete'];
    $Userrr->removeFromCart($cartId);
  }  
  
 

//if (isset($_GET['delete'])) {
//    $cartId = $_GET['delete'];
     
//    $dbuser = new DBConnector();
//    $con = $dbuser->getConnection();
//    $query = "DELETE FROM cart WHERE cartId = $cartId";
//    $pstmt = $con->prepare($query);
//    $pstmt->execute();
//    header('Location:cart.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <style>

.com:hover {
        background-color: #CDC9C3;
        }

        

    </style>
</head>

<body> 

<nav class="navbar navbar-light navbar-expand-lg" style="background-color:#87CBB9">
            &ensp;
            <a href="" class="navbar-brand"><img src="src_images/logo new.png" style="width:50px; height:50px;">&ensp;Vestario</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="home.php#link-to-category" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>
                    <li class="nav-item"><a href="design.php" class="nav-link">Customize Products</a></li>
                    <li class="nav-item"><a href="wishlist.php" class="nav-link">Wishlist</a></li>
                    <?php
                    if (isset($_SESSION['customerId'])) { 
                        $cu_name = $_SESSION['customerName'];
                        ?>
                        <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
                    <li class="nav-item nav-link" ><i class="fa fa-user-circle-o" style="color:black; font-size:20px"></i> Hello,<?php echo $cu_name ?>!</li>
                    <?php } else { ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <?php }
                    ?>

                </ul>
            </div>
        </nav>


    <div class="container mt-3">
    
        <div class="rounded border-0 overflow-hidden" style="background-color:#EEEDED">
         
            <div class="row mt-3">
                 
             
                    <h3 class="text-center" id="item-name">MY CART</h3>
                     
                 
        </div>
        </div>
    </div>

    

    
    <!--Item 1-->
    <?php
     //include 'config.php';
 
     $Cartt = $Userrr->getItems($cusid);

     foreach ($Cartt as $row) {
         
   //$Userrr->getItems($cusid);
    ?>
     
    <div class="container mt-3">
    
        <div class="rounded border-0   overflow-hidden" style="background-color:#EEEDED">
        <div class="com">
            <div class="row mt-6">
                <div class="col-12 col-md-6 col-lg-4" style="min-height: 200px;"><br>
                <img src="img/<?php echo $row['photo']; ?>" height="100" alt="picture 1" style="height:250px;" class="mx-auto d-block img-fluid">
                <br></div>
                <div class="col-md-6 col-lg-4 mt-2 ">
                    <h5 class="text-center" id="item-name"><?php echo $row['name'] ?></h5>
                    <h6 id="item-name-disc"><?php echo $row['description'] ?> </h6>
                     
                    <!--Ieam code or order code-->
                    <h6 id="item-code">Size : <?php echo $row['size'] ?></h6><br>
                    <h5 class="tedxt-center" id="item-price">Rs.<?php echo $row['price'] ?></h5>
                </div>
                <div class="col-md-6 col-lg-4 d-flex flex-row align-items-center justify-content-center"
                    style="display: block;">
                    <form action="payment.php?pay=<?php echo $row['cartId']; ?>" method="POST">
                    <input type="number" name="quan" placeholder="Quantity" required>
                    <br><br>
                    <button class="btn btn-warning" style="color:white">Check Out</button> &ensp;
                    
                    <form action="cart.php" method="post">
                    <a href="cart.php?delete=<?php echo $row['cartId']; ?>" class="btn btn-danger"> Remove </a>
                    </form>    
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php } ?>

&ensp;&ensp;

    <!-- fotter -->
    <hr>
    <div class="container-fluid back">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="src_images/logo new.png" style="width:200px; height:200px;">
            </div>
            <div class="col-md-3">
                <a href="contactus.php"><h6>Contact us</h6></a>
                <a href="#" class="fa fa-facebook"></a>&ensp;&ensp;
                <a href="#" class="fa fa-google"></a>&ensp;&ensp;
                <br><br>
                <a href="mailto:sanjayakasun44@gmail.com" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">mail</span>vestario@gmail.com</span>&ensp;</a>
                <a href="#" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">call</span>&ensp;0712209112</a>
                <a href="#" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">call</span>&ensp;0113456987</a>
            </div>
            <div class="col-md-3">
                <h6>
                    Services
                </h6>
                <ul>
                    <a href="design.php" style="text-decoration:none; color:black">
                        <li>Customize products</li>
                    </a>
                    <a href="#link-to-category" style="text-decoration:none; color:black">
                        <li>Order Clothes</li>
                    </a>
                    <a href="review.php" style="text-decoration:none; color:black">
                        <li>Review</li>
                    </a>
                    <!-- <a href="" style="text-decoration:none; color:black"><li></li></a> -->
                    <!-- <a href="" style="text-decoration:none; color:black">
                        <li>Help</li>
                    </a> -->
                </ul>
            </div>
            <div class="col-md-3">
                <h6>
                    Location
                </h6>
                <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.4842255938223!2d79.96344996947397!3d6.777534431309632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24fd7781fbd17%3A0x36b8c930439bdc4f!2sVestario!5e0!3m2!1sen!2slk!4v1693714871562!5m2!1sen!2slk" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid back">
        <div class="row">
            <div class="col-12 col-md-6">
                <h6>This site is protected by Google Privacy Policy and Terms of Service apply.</h6>
            </div>
            <div class="col-md-6">
                <h6 class="text-center">&copy;2023 VESTARIO Technologies</h6>
            </div>
        </div>
    </div>
    <hr>
    <hr>

    <!--end of footer-->

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    
</body>

</html>