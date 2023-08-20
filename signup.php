<?php

require './classes/RegisteredCustomer.php';


if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contactNumber = trim($_POST['phone-no']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    

    if (!empty($name) && !empty($email) && !empty($contactNumber) && !empty($address) && !empty($gender) && !empty($username) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $customer = new RegisteredCustomer($name, $email, $contactNumber, $address, $gender, $username, $password);
            $registrationResult = $customer->register($name, $email, $contactNumber, $address, $gender, $username, $password);

            if ($registrationResult === 1) {
                $success = 'User has been created successfully';
            } elseif($registrationResult===2) {
                $errors[] = "Registration Unsuccessful";
            }else{
                $errors[] = "User Already Exist";
            }
        } else {
            $errors[] = "Email address is not valid";
        }
    } else {
        $errors[] = 'Fill the required fields';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingUp</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/login.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Navbar</title>
    <style>
        .navbar{
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
                <li class="nav-item"><a href="#"class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Wishlist</a></li>
                <li class="nav-item"><a href="#" class='fas fa-user-circle nav-link d-flex'>Login</a></li>
            </ul>
        </div>
    </nav>
<div class="singup">
    <div class="form-container">
    
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Sign Up</h3>
            <?php 
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                    echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                }
            }
            if (isset($success)) {
                echo '<div class="alert alert-success">' . $success . '</div>';
            }
            ?>
            <input type="text" name="username" placeholder="Enter UserName" class="box" required/>
            <input type="text" name="name" placeholder="Enter Name" class="box" required/>
            <input type="email" name="email" placeholder="Enter Email" class="box" required/>
            <input type="text" name="phone-no" placeholder="Enter Contact Number" class="box" required/>
            <input type="text" name="address" placeholder="Enter Address" class="box" required/>
            <input type="password" name="password" placeholder="Enter Password" class="box" required/>
            <select name="gender" class="box">
                <option selected disabled value="default">Please select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            

            <input type="submit" name="submit" class="btn1" value="Sign Up" />
            <p>Already have an account? <a href="login.php">Login</a></p>

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

</body>
</html>