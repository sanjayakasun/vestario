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
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Summery</title>
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
      background-image: url(src_images/bg3.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .serch {
      width: 150px;
    }
  </style>

</head>

<body>
  <!--Header-->
  <div class="background_">
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
            <li class="nav-item nav-link"><i class="fa fa-user-circle-o" style="color:black; font-size:20px"></i> Hello,<?php echo $cu_name ?>!</li>
          <?php } else { ?>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <?php }
          ?>

        </ul>
      </div>
    </nav>


    <section class="h-100 gradient-custom">
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
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0 text-center">Order Summary</h5>
                </div>
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
                <h5 class="mb-0 text-center">Payment</h5>
              </div>
              <div class="card-body mx-auto d-block">
                <!--get card number and cvv-->
                <form name="pay">
                  <input type="text" placeholder="Enter card number" name="num" required> &ensp;&ensp; <input type="text" placeholder="CVV" name="cv" required><br><br>
                </form>
                <hr>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Total Amount : </strong>
                      <strong> </strong>
                    </div>
                    <?php 
                    $tot = $user->gettotalprice($cid);
                    ?>
                    <span><strong>Rs.<?php echo $tot; ?>.00</strong></span>
                  </li>
                </ul>
                <hr>
                <button class="btn btn-primary btn-lg btn-block mx-auto d-block" onclick="fill(<?php echo $pid ?>)">Pay Now</button>
              </div>
            </div>
          </div>

        </div>
    </section>
  </div>


  <!-- fotter -->
  <hr>
  <div class="container-fluid back">
    <div class="row">
      <div class="col-12 col-md-3">
        <img src="src_images/logo new.png" style="width:200px; height:200px;">
      </div>
      <div class="col-md-3">
        <a href="contactus.php">
          <h6>Contact us</h6>
        </a>
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
  <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-swipe.js"></script>
  <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-off-canvas-sidebar.js"></script>
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