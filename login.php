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
            header('Location:admin_dashboard.php');
            exit();
        } elseif ($deliveryCredentials["username"] == $username && $deliveryCredentials["password"] == $password) {
            header('Location:delivery.php');
            exit();
        } else {
            $customer = new RegisteredCustomer($name = null, $email = null, $contactNumber = null, $address = null, $gender = null, $username, $password);
            $loginResult = $customer->login($username, $password);

            if ($loginResult == true) {
                $_SESSION['customerName']=$username;
                $_SESSION['customerId']=$customer->getCustomerId();
                header('location:home.php');
                exit();
            } else {

                $errors[] = "Incorrect Username or Password";
            }
        }
    } else {
        $errors[] = "Username and Password Are Required";
    }
    // $_SESSION['customerId']=$customer->getCustomerId();
    
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

        .background_ {
            background-color: #EEEEEE;
            background-image: url(src_images/bg3.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

    </style>

</head>

<body>
    <!--Header-->
    <div class="background_">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
            &ensp;
            <a href="" class="navbar-brand">Vestario</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="nav_tings">
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link active">Home</a></li>
                    <!-- <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Wishlist</a></li>
                    <li class="nav-item"><a href="#" class='fas fa-user-circle nav-link d-flex'>Login</a></li> -->
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-4">
                    <div class="card" style="background-color: #222831">
                        <div class="card-body">
                            <h3 class="card-title text-center" style="color: white;">Log In</h3>

                            <?php
                            if (isset($errors) && count($errors) > 0) {
                                foreach ($errors as $error_msg) {
                                    echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                                }
                            }
                            ?>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" name="username" placeholder="Enter User Name" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="submit" class="btn1" value="Log In" />
                                </div>
                            </form>

                            <p class="text-center"  style="color: white;">Don't have an account? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>