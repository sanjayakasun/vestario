<?php

session_start();
require './classes/RegisteredCustomer.php';



if (isset($_POST['submit'])) {
    if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = ($_POST['password']);

        $adminCredentials = array("username" => "admin123", "password" => "admin456");
        $deliveryCredentials = array("username" => "delivery123", "password" => "delivery456");

        if ($adminCredentials["username"] == $username && $adminCredentials["password"] == $password) {
            header('Location:admin.php');
            exit();
        } elseif ($deliveryCredentials["username"] == $username && $deliveryCredentials["password"] == $password) {
            header('Location:delivery.php');
            exit();
        } else {
            $customer = new RegisteredCustomer($name = null, $email = null, $contactNumber = null, $address = null, $gender = null, $username, $password);
            $loginResult = $customer->login($username, $password);

            if ($loginResult == true) {
                header('location:home.html');
                exit();
            } else {

                $errors[] = "Incorrect Username or Password";
            }
        }
    } else {
        $errors[] = "Username and Password Are Required";
    }
    $SESSION['customerId']=$customer->getCustomerId();
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/login.css">
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
    </style>

</head>

<body>
    <!--Header-->
    <div class="background_">
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color:#87CBB9">
            &ensp;
            <a href="" class="navbar-brand"><img src="src_images/logo new.png" style="width:50px; height:50px;"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Wishlist</a></li>
                    <li class="nav-item"><a href="#" class='fas fa-user-circle nav-link d-flex'>Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="login">
            <div class="form-container">

                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Log In</h3>
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        foreach ($errors as $error_msg) {
                            echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                        }
                    }
                    ?>
                    <input type="text" name="username" placeholder="Enter User Name" class="box" required />
                    <input type="password" name="password" placeholder="Enter Password" class="box" required />
                    <input type="submit" name="submit" class="btn1" value="Log In" />
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

                </form>

            </div>
        </div>



        <!-- footer -->
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
                        <a href="" style="text-decoration:none; color:black">
                            <li>Customize products</li>
                        </a>
                        <a href="" style="text-decoration:none; color:black">
                            <li>Order Clothes</li>
                        </a>
                        <a href="" style="text-decoration:none; color:black">
                            <li>Delivery</li>
                        </a>
                        <a href="" style="text-decoration:none; color:black">
                            <li>Sign-up</li>
                        </a>
                        <a href="" style="text-decoration:none; color:black">
                            <li>Help</li>
                        </a>
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
        <hr>
        <hr>

</body>

</html>