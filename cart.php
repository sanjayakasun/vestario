<?php

//require_once 'classes/DbConnector.php';
require 'classes/cart_process.php';

use classes\cart_process;

$Userrr = new cart();

session_start();
if (!isset($_SESSION['customerId'])) {
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

    $Userrr->getProductDetails($cartId, $cusid, $size);
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <style>
        .com:hover {
            background-color: #CDC9C3;
        }

        .navbar {
            font-weight: bold;
        }

        .background_ {
            background-color: #EEEEEE;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
        &ensp;
        <a href="" class="navbar-brand">Vestario</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="nav_tings">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="home.php" class="nav-link ">
                        Home</a></li>
                <li class="nav-item" title="Categories"><a href="home.php#link-to-category" class="nav-link">Categories</a></li>

                <li class="nav-item"><a href="design.php" class="nav-link">Customize Products</a></li>

                <?php
                if (isset($_SESSION['customerId'])) {
                    $cu_name = $_SESSION['customerName'];
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <ion-icon name="person-circle-outline" style="font-size: 19px;" class="d-inline-flex"></ion-icon></i> Hello,<?php echo $cu_name ?>!
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="user.php">Profile</a>
                            <a class="dropdown-item" href="payment.php">Pay</a>
                            <a class="dropdown-item" href="check.php">Order Summary</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">LogOut</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item"><a href="logout.php" class="nav-link"></a></li> -->

                <?php } else { ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <?php }
                ?>
                <br>
                <ul class="d-flex ">

                    <li class="nav-item"><a href="cart.php" class="nav-link active"><ion-icon name="cart-outline" size="large"></ion-icon></a></li>
                    <li class="nav-item"><a href="wishlist.php" class="nav-link"><ion-icon name="heart-circle-outline" size="large" title="WishList"></ion-icon></a></li>

                </ul>
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
                            <br>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-2 ">
                            <h5 class="text-center" id="item-name"><?php echo $row['name'] ?></h5>
                            <h6 id="item-name-disc"><?php echo $row['description'] ?> </h6>

                            <!--Ieam code or order code-->
                            <h6 id="item-code">Size : <?php echo $row['size'] ?></h6><br>
                            <h5 class="tedxt-center" id="item-price">Rs.<?php echo $row['price'] ?></h5>
                        </div>
                        <div class="col-md-6 col-lg-4 d-flex flex-row align-items-center justify-content-center" style="display: block;">
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
<div style="background-color:#222831; color: white;">
    <hr>
    <div class="container-fluid back ">
        <div class="row">
            <div class="col-12 col-md-3">
            <a href="#navbar" style="text-decoration: none; color: white;">
                    <h2>Vestario</h2>
                </a>
                
                
            </div>
            <div class="col-md-3" style="color: white;">
                
                    <h6>Follow us on</h6>
                
                <a href="#" style="text-decoration: none; color: white;"><ion-icon name="logo-facebook" size="large"></ion-icon></a>&ensp;&ensp;
                <a href="#" style="text-decoration: none; color: white;"><ion-icon name="logo-google" size="large"></ion-icon> </ion-icon></a>&ensp;&ensp;
            </div>
            <div class="col-md-3">
                <h6>
                    Services
                </h6>
                <ul>
                    <a href="design.php" style="text-decoration:none; color:white">
                        <li>Customize products</li>
                    </a>
                    <a href="#link-to-category" style="text-decoration:none; color:white">
                        <li>Order Clothes</li>
                    </a>
                    <a href="review.php" style="text-decoration:none; color:white">
                        <li>Review</li>
                    </a>
                    <a href="contactus.php" style="text-decoration:none; color:white">
                        <li>Contact Us</li>
                    </a><a href="returnpolicy.html" style="text-decoration:none; color:white">
                        <li>Refund Policy</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-3">
            <a href="contactus.php" style="text-decoration: none; color: white;">
                <h6>
                    Contact
                </h6>
            </a>
                <a href="mailto:sanjayakasun44@gmail.com" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">mail&ensp;</span>vestario@gmail.com</span>&ensp;</a>
                <a href="#" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">call</span>&ensp;0712209112</a>
                <a href="#" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">call</span>&ensp;0113456987</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid back">
        <div class="row">
            <div class="col-12 col-md-6">
                <h6>This site is protected by <a href="privancy.html"  style="color: white;"> Privacy Policy </a> and Terms of Service apply.</h6>
            </div>
            <div class="col-md-6">
                <h6 class="text-center">&copy;2023 VESTARIO Technologies</h6>
            </div>
        </div>
    </div>
    <hr>
</div>


<!--end of footer-->

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>