<?php


session_start();
if (!isset($_SESSION['customerId'])) {
  header('Location:login.php');
}
$cid = $_SESSION['customerId'];
require 'checkout.php';
require 'classes/DbConnector.php';
$dbuser = new DbConnector();
// when using pay from cart
if (isset($_POST['quan'])) {
  $number = $_POST['quan'];
  
  $id = $_GET['pay'];
  $cid = $_SESSION['customerId'];
  
  $con = $dbuser->getConnection();
  $query = "SELECT * FROM cart WHERE cartId = '$id' ";
  $pstmt = $con->prepare($query);
  $pstmt->execute();
  $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rs as $rows) {
    //store that values to variables
    $pid = $rows['productId'];
    $name = $rows['name'];
    $price = $rows['price'];
    $image = $rows['photo'];
    $productid = $rows['productId'];
    $size = $rows['size'];
    // $total = $number * $price;
  }

  $date = date("Y-m-d");
  $query2 = "INSERT INTO orders (orderDate,price,quantity,productId,customerId,cartId,name,size,photo,deliveryStatus) VALUES ('$date','$price','$number','$pid','$cid','$id','$name','$size','$image','Processing')";
  $pstmt = $con->prepare($query2);
  $pstmt->execute();

  $query3 = "INSERT INTO payment (paymentDate,price,quantity,productId,customerId,cartId,name,size,photo) VALUES ('$date','$price','$number','$pid','$cid','0','$name','$size','$image')";
  $pstmt = $con->prepare($query3);
  $pstmt->execute();
}

// when using direct pay method
if (isset($_POST['pay'])) {
  // require 'classes/DbConnector.php';
  // pid eka thami danna onee
  $pid = $_GET['pay'];
  $cid = $_SESSION['customerId'];
  // $dbuser = new DbConnector();
  $con = $dbuser->getConnection();
  $query = "SELECT * FROM product WHERE product_id = '$pid' ";
  $pstmt = $con->prepare($query);
  $pstmt->execute();
  $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rs as $rows) {
    //store that values to variables
    $name = $rows['product_name'];
    $price = $rows['price'];
    $image = $rows['photo'];
    $size = $rows['size'];
    $number = 1;
    // $total = $number * $price;
  }


  $date = date("Y-m-d");

  $query2 = "INSERT INTO orders (orderDate,price,quantity,productId,customerId,cartId,name,size,photo,deliveryStatus) VALUES ('$date','$price','$number','$pid','$cid','0','$name','$size','$image','Processing')";
  $pstmt = $con->prepare($query2);
  $pstmt->execute();

  $query3 = "INSERT INTO payment (paymentDate,price,quantity,productId,customerId,cartId,name,size,photo) VALUES ('$date','$price','$number','$pid','$cid','0','$name','$size','$image')";
  $pstmt = $con->prepare($query3);
  $pstmt->execute();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
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
  <title>Navbar</title>
  <style>
    .navbar {
            font-weight: bold;
        }

        .background_ {
            background-color: #EEEEEE;
        }


    .serch {
      width: 150px;
    }
  </style>

</head>

<body>
  <!--Header-->
  <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
            &ensp;
            <a href="" class="navbar-brand">Vestario</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link active">
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

                        <li class="nav-item"><a href="cart.php" class="nav-link"><ion-icon name="cart-outline" size="large"></ion-icon></a></li>
                        <li class="nav-item"><a href="wishlist.php" class="nav-link"><ion-icon name="heart-circle-outline" size="large" title="WishList"></ion-icon></a></li>

                    </ul>
                </ul>
            </div>
        </nav>


    <section class="h-100 gradient-custom">
    <div class="container">
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header py-3">
                <center><img src="src_images/PayHere-Logo.png" style="width:100px;"><h5 class="mb-0">Payment</h5></center>           
                </div>
              </div>
            </div>
          </div>
    </div>
    
      <?php
      $user = new Orders();
      // // require 'classes/DbConnector.php';
      // $cuid = $_SESSION['customerId'];
      // // $dbuser = new DbConnector();
      // $con = $dbuser->getConnection();
      // $query = "SELECT * FROM orders WHERE customerid = '$cuid' ";
      // $pstmt = $con->prepare($query);
      // $pstmt->execute();
      // $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
      $rs = $user->getdetails();
      foreach ($rs as $rows_order) {
        //store that values to variables
        $name = $rows_order['name'];
        $price = $rows_order['price'];
        $image = $rows_order['photo'];
        $size = $rows_order['size'];
        $quantity = $rows_order['quantity'];
        $pid = $rows_order['productId'];
        $total = $quantity * $price;
      ?>
        <div class="container">
        <div>
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-12">
              <div class="card mb-4" style="border-radius:8px;">
                <!-- <div class="card-header py-3">
                  <h5 class="mb-0 text-center">Order Summary</h5>
                </div> -->
                <div class="card-body">
                  <!-- Single item -->
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      &ensp;&ensp; <button style="background-color:white; border: none;" id="myButton" onclick="this.clicked = true; checkButtonClick(<?php echo $pid; ?>);"><span class="material-symbols-outlined" title="cancel this item">cancel</span></button>
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="img/<?php echo $rows_order['photo']; ?>" class="w-50" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>

                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p> Name: <br><strong><?php echo $rows_order['name']; ?> </strong></p>
                      <br>
                      <p>Product id: <br><strong> <?php echo $rows_order['productId']; ?> </strong></p>
                      <br>
                      <p> Size: <br><strong><?php echo $rows_order['size']; ?> </strong></p>

                      <!-- Data -->
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                      <!-- Price -->
                      <p class="text-start text-md-center">
                      <h6>Price: </h6><strong>Rs.<?php echo $rows_order['price']; ?>.00</strong>
                      </p>
                      <!-- Price -->

                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 300px">
                        <div class="form-outline">
                          <!--<input id="form1" min="0" name="quantity" value="1" type="fixed" class="form-control" />-->
                          <label class="form-label" for="form1">Quantity: <br><strong> <?php echo $rows_order['quantity']; ?> </strong></label>
                        </div>
                      </div>
                      <!-- Quantity -->
                    </div>
                    <hr class="my-4" />  
                  </div>
              
                  <!-- Single item -->
                </div>
              </div>  
            </div>
          <?php } ?>
      </div>
      </div>  
          <!--Payment form-->
          <div class="row">
            <div class="card mb-4 mb-lg-0">
              <strong>
                <h6 class="text-center">We Accept</h6>
              </strong>
              <div class="card-body mx-auto d-block">
                <img class="me-2" width="220px" src="img/visa.png">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="card mb-3">
              <div class="card-header py-3">
              <center><img src="src_images/PayHere-Logo.png" style="width:100px;"></center>
              </div>
              <div class="card-body mx-auto d-block">
                <!--get card number and cvv-->
                <hr>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Total Amount : </strong>
                      <strong> </strong>
                    </div>
                    <?php 
                    $tot = $user->gettotalprice($cid);
                    $cuid = $_SESSION['customerId'];
                    ?>
                    <span><strong>Rs.<?php echo $tot; ?>.00</strong></span>
                  </li>
                </ul>
                <hr>
                
                <button class="btn btn-primary btn-lg btn-block mx-auto d-block" onclick="paymentGateWay(<?php echo $tot; ?>,<?php echo $cuid; ?>);">Pay Here</button>
                <!-- <button class="btn btn-primary btn-lg btn-block mx-auto d-block">Pay Now</button> -->
              </div>
            </div>
          </div>

        </div>
    </section>
  </div>


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


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-swipe.js"></script>
  <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-off-canvas-sidebar.js"></script>
  <script src="script.js"></script>
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script>
    function checkButtonClick(x) {
      // Check if the button is clicked
      var buttonClicked = document.getElementById('myButton').clicked;

      // Display the result
      if (buttonClicked) {
        location.href = "order_delete_process.php?id=" + x;
      } else {
        alert('Button is not clicked.');
      }
    }
    var ac_num = document.forms['pay']['num'];
    var ac_cv = document.forms['pay']['cv'];

    function fill(x) {
      if (ac_num.value.length > 15 && ac_num.value.length < 17) {
        if (ac_cv.value.length > 2 && ac_cv.value.length < 4) {
          alert("Payment Success");
          location.href = "ordre_statues.php?stat=" + x;

        } else {
          alert("Payment Unseccess \n \t\t\tCheck your CVV number.");
        }
      } else {
        alert("Payment Unseccess \n \t\t\tCheck your Card Number.");
      }
    }
  </script>
</body>

</html>