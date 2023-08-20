<?php

require './classes/DbConnector.php';
use classes\DbConnector;

$dbcon = new DbConnector();

// @include 'config.php';

if (isset($_GET['cart'])) {

    $cartId = $_GET['cart'];
    $size = $_POST['size'];
     
    // take data from clothing collection page
    $dbuser = new DBConnector();
    $con = $dbuser->getConnection();
    $query = "SELECT * FROM product WHERE product_id = $cartId ";
    $pstmt = $con->prepare($query);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs as $rows) {
        //store that values to variables
        $name = $rows['product_name'];
        $price = $rows['price'];
        $photo = $rows['photo'];
        //$size = $rows['size'];
        $description = $rows['discription'];
    }

    //store that values again to database

    $query2 = "INSERT INTO cart(customerId,productId,name,price,size,photo,description) VALUES ('1','$cartId','$name','$price','$size', '$photo', '$description')";
    $pstmt = $con->prepare($query2);
    $a = $pstmt->execute();
}

if (isset($_GET['delete'])) {
    $cartId = $_GET['delete'];
     
    $dbuser = new DBConnector();
    $con = $dbuser->getConnection();
    $query = "DELETE FROM cart WHERE cartId = $cartId";
    $pstmt = $con->prepare($query);
    $pstmt->execute();
    header('Location:cart.php');
}
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
        <a href="" class="navbar-brand"><img src="src_images/logo new.png" style="width:50px; height:50px;"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="nav_tings">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#"class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Wishlist</a></li>
                <li class="nav-item"><a href="#" class='fas fa-user-circle nav-link d-flex'>Login</a></li>
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
    @include 'config.php';
    $select = mysqli_query($conn, "SELECT * FROM cart");
    ?>
    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
    <div class="container mt-3">
    
        <div class="rounded border-0   overflow-hidden" style="background-color:#EEEDED">
        <div class="com">
            <div class="row mt-6">
                <div class="col-12 col-md-6 col-lg-4" style="min-height: 200px;">
                <img src="img/<?php echo $row['photo']; ?>" height="100" alt="picture 1" style="height:250px;" class="mx-auto d-block img-fluid">
                </div>
                <div class="col-md-6 col-lg-4 mt-2 ">
                    <h5 class="text-center" id="item-name"><?php echo $row['name'] ?></h5>
                    <h6 id="item-name-disc"><?php echo $row['description'] ?> </h6>
                     
                    <!--Ieam code or order code-->
                    <h6 id="item-code">Size : <?php echo $row['size'] ?></h6><br>
                    <h5 class="tedxt-center" id="item-price">Rs.<?php echo $row['price'] ?></h5>
                </div>
                <div class="col-md-6 col-lg-4 d-flex flex-row align-items-center justify-content-center"
                    style="display: block;">
                    <form action="payment.php" method="post">
                    <button class="btn btn-warning" style="color:white">Check Out</button> &ensp;
                    </form>
                    <form action="cart.php" method="post">
                    <a href="cart.php?delete=<?php echo $row['cartId']; ?>" class="btn btn-danger"> Remove </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php } ?>
    <!--Item 2-->

    <div class="container mt-3">
        <div class=" rounded border-0 border-dark overflow-hidden" style="background-color:#EEEDED">
        <div class="com">
            <div class="row mt-6">
                <div class="col-12 col-md-6 col-lg-4" style="min-height: 200px;">
                    <img class="mx-auto d-block rounded border-0   overflow-hidden" width="250" height="180" src="https://img.freepik.com/free-photo/fashionable-mannequin-wears-modern-hooded-jacket-generated-by-ai_188544-40166.jpg?size=626&ext=jpg&ga=GA1.1.1882095610.1686062107&semt=sph">
                </div>
                <div class="col-md-6 col-lg-4 mt-2 ">
                    <h5 class="text-center " id="item-name">Jersey</h5>
                    <h6 id="item-name-disc">Classic Hooded Jersey Long Sleeve T-Shirt</h6>
                    <h6 id="item-size">Premium jersey fabric</h6>
                    <!--Ieam code or order code-->
                    <h6 id="item-code">Size : S/M/L/XL/2XL</h6><br>
                    <h5 class="tedxt-center" id="item-price">Rs.2400.00</h5>
                </div>
                <div class="col-md-6 col-lg-4 d-flex flex-row align-items-center justify-content-center"
                    style="display: block;">
                    <button class="btn btn-warning" style="color:white">Check Out</button> &ensp;
                    <button class="btn btn-danger" style="color:white">Remove</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!--Item 3-->

    <div class="container mt-3">
        <div class="  rounded border-0   overflow-hidden" style="background-color:#EEEDED">
        <div class="com">
            <div class="row mt-6">
                <div class="col-12 col-md-6 col-lg-4" style="min-height: 200px;">
                    <img class="mx-auto d-block" width="250" height="180" src="https://img.freepik.com/free-photo/shirt-mockup-concept-with-plain-clothing_23-2149448749.jpg?size=626&ext=jpg&ga=GA1.2.1882095610.1686062107&semt=sph">
                </div>
                <div class="col-md-6 col-lg-4 mt-2 ">
                    <h5 class="text-center" id="item-name">Crew Neck T-Shirt</h5>
                    <h6 id="item-name-disc">Crew Neck short sleeves T-Shirt  </h6>
                    <h6 id="item-size">Premium 100% cotton fabric</h6>
                    <!--Ieam code or order code-->
                    <h6 id="item-code">S/M/L/XL/2XL</h6><br>
                    <h5 class="tedxt-center" id="item-price">Rs.1980.00</h5>
                </div>
                <div class="col-md-6 col-lg-4 d-flex flex-row align-items-center justify-content-center"
                    style="display: block;">
                    <form action="payment.php" method="post">
                    <button class="btn btn-warning" style="color:white">Check Out</button> &ensp;
                    </form>
                    <button class="btn btn-danger" style="color:white">Remove</button>
                </div>
            </div>
        </div>
    </div>
    </div>

       
    &ensp;
    &ensp;

    <!-- fotter -->
<hr>
<div class="container-fluid back">
 <div class="row">
     <div class="col-12 col-md-3">
         <img src="src_images/logo new.png" style="width:200px; height:200px;">
     </div>
     <div class="col-md-3">
         <h6>Contact us</h6>
         <a href="#" class="fa fa-facebook"></a>&ensp;&ensp;
         <a href="#" class="fa fa-twitter"></a>&ensp;&ensp;
         <a href="#" class="fa fa-instagram"></a>&ensp;&ensp;
         <a href="#" class="fa fa-google"></a>&ensp;&ensp;
         <a href="#" class="fa fa-linkedin"></a><br><br>
         <a href="mailto:sanjayakasun44@gmail.com" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">mail</span>vestario@gmail.com</span>&ensp;</a>
         <a href="#" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">call</span>&ensp;0712209112</a>
         <a href="#" class="d-flex" style="Text-decoration:none;"><span class="material-symbols-outlined">call</span>&ensp;0716123050</a>
     </div>
     <div class="col-md-3">
         <h6>
             Services
         </h6>
         <ul>
             <a href="" style="text-decoration:none; color:black"><li>Customize products</li></a>
             <a href="" style="text-decoration:none; color:black"><li>Order Clothes</li></a>
             <a href="" style="text-decoration:none; color:black"><li>Delivery</li></a>
             <a href="" style="text-decoration:none; color:black"><li>Sign-up</li></a>
             <a href="" style="text-decoration:none; color:black"><li>Help</li></a>
         </ul>
     </div>
     <!-- <div class="col-md-3">
         <h6>
             About us
         </h6>
         <p>    
         Welcome to our online clothing store,  When we consider the past era of the apparel industry they had the opportunity to sell their 
         products only from the physical stores. 
         Online shopping platforms often provide customer reviews and ratings for products. This 
        allows customers to read feedback from other buyers, helping them make informed 
        decisions about the quality, fit, and overall satisfaction of the products. 
         </p>
     </div> -->
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
 <hr><hr>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


    
</body>

</html>