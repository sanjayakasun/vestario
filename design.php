<?php
session_start();
    if(!isset($_SESSION['customerId'])){
        header('Location:login.php');
    }
    ?>

<?php
$massage = null;

if(isset($_GET['status'])){
    $status= $_GET['status'];
    if ($status==0){
        $massage ="<h6 class='text-danger'>required values1 not submitted</h6>";
        
    }
    elseif ($status==1) {
        $massage = "<h6 class='text-danger'>you must fill all fields </h6>";   
    }
    elseif ($status==2) {
        $massage = "<h6 class='text-success'> you have successfully submitted and thanks for the order we will contact you soon</>";
    }
    else {
        $massage = "<h6 class='text-danger'>error occurred during the designing</h6>" ;   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customise Design</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d8fba019aa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/design.css">

    <style>
        .navbar {
            font-weight: bold;
        }

        .background_ {
            background-color: #EEEEEE;
        }
      </style>
</head>

<body class="background_"> 

<nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
            &ensp;
            <a href="" class="navbar-brand">Vestario</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link ">
                            Home</a></li>
                    <li class="nav-item" title="Categories"><a href="home.php#link-to-category" class="nav-link">Categories</a></li>

                    <li class="nav-item"><a href="design.php" class="nav-link active">Customize Products</a></li>

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






     






    <div class="container">
    <div class="text-center mb-5">
      <p><h3>Customized Design</h3></p>
      <p class="lead">Unleash your creativity and fashion-forward spirit as you embark on a personalized style journey like no other.</p>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">CD</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">You can build your Customized  Design from here</h4>
              
            </div>
             
            <div class="col-sm-3 text-lg-end">
              <a href="https://printify.com/app/editor/12/50" class="btn btn-primary stretched-link">Click here</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">CD</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">Upload your Design</h4>
              
            </div>
             
            <div class="col">
            <?=$massage?>
              <form action="design1.php" method="post" enctype="multipart/form-data">
                <table>
                  <tr>
                    <td><input type="file" name="image" accept="image/png,image/jpeg,image/jpg" required/></td>
                  </tr>
                  <tr>
                    <td><p class="name" >customer Id</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="customerName" value="<?php echo $_SESSION['customerId'] ?>" disabled></td>
                  </tr>
                  <tr>
                    <td><p class="name" >email</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="email"></td>
                  </tr>
                  <tr>
                    <td><p class="name" >delivery address</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="deliveryAddress" required></td>
                  </tr>
                  <tr>
                    <td><p class="name">Size</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="size" required></td>
                  </tr>
                  <tr>
                    <td><p class="name">quantity</p></td>
                  </tr>
                  <tr>
                    <td><input type="number" name="quantity" required></td>
                  </tr>
                  <tr>
                    <td><input type="submit" value="Submit" class="submit"></td>
                  </tr>

                </table>
              </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>

     
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

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>

</html>