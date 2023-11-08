<?php
session_start();

// require_once 'classes/DbConnector.php';
require_once 'classes/RegisteredCustomer.php';

// use classes\DbConnector;
// use classes\RegisteredCustomer;

$dbcon = new DbConnector;
$con = $dbcon->getConnection();

$customerId = $_SESSION['customerId']; //put customerId taken from session variable
$cu_name = $_SESSION['customerName'];

$user = new RegisteredCustomer(null, null, null, null, null, null, null);
$result = $user->diplayCustomerDetails($customerId);

$username = $result->username;
$name = $result->name;
$email = $result->email;
$contactNumber = $result->contactNumber;
$address = $result->address;
$password = $result->password;
$gender = $result->gender;

if (isset($_POST['update'])) {
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['phone-no']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $gender = trim($_POST['user_type']);

    $user = new RegisteredCustomer(null, null, null, null, null, null, null);
    if ($user->updateProfile($name, $email, $contactNumber, $address, $gender, $username, $password, $customerId)) {
        $success = 'Profile Updated Successfully';
    } else {
        $errors[] = "Failed to Update Profile";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!--<link rel="stylesheet" href="review1.css">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/user.css">
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

    <style>
        .navbar {
            font-weight: bold;
        }

        /* .background_ {
            background-image: url(src_images/bg3.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        } */
        .form-container form{
    width:auto;
    border-radius: .5rem;
    background-color: rgb(135, 203, 185);
    padding:2rem;
    text-align: center;
}
    </style>

</head>

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
                    <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
                    <li class="nav-item nav-link"><i class="fa fa-user-circle-o" style="color:black; font-size:20px"></i>Hello,<?php echo $cu_name ?>!</li>
                </ul>
            </div>
        </nav>

            <div class="container">
                <div class="row ">
                    <div class="col-12 col-md-6">
                        <div class="singup">
                            <div class="form-container">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                    <h3><i class="fa-solid fa-user"></i> &nbsp; User Profile</h3>
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
                                    <input type="text" value="<?php echo $username; ?>" name="username" placeholder="Enter Username" class="box" required />
                                    <input type="text" value="<?php echo $name; ?>" name="name" placeholder="Enter Name" class="box" required />
                                    <input type="email" value="<?php echo $email; ?>" name="email" placeholder="Enter Email" class="box" required />
                                    <input type="text" value="<?php echo $contactNumber; ?>" name="phone-no" placeholder="Enter Contact Number" class="box" required />
                                    <input type="text" value="<?php echo $address; ?>" name="address" placeholder="Enter Address" class="box" required />
                                    <input type="password" value="<?php echo $password; ?>" name="password" placeholder="Enter Password" class="box" required />
                                    <select name="user_type" class="box">
                                        <option selected disabled value="default"><?php echo $gender; ?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    <input type="submit" name="update" class="btn1" value="Update Info" />
                                    <input type="submit" name="logout" class="btn1" value="Log Out" />
                                </form>
                                <?php
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $user = new RegisteredCustomer(null, null, null, null, null, null, null);
                    $totalOrders = $user->displayTotalOrders($customerId);
                    ?>
                    <div class="col-md-6">
                        <div class="container">
                            <h2 style="color: gray;">Successful Orders </h2>
                            <div class="counter" id="count"><?php echo $totalOrders; ?></div>
                            <h2 style="color: gray;">Track your order here</h2>
                            <?php
                                $user = new RegisteredCustomer(null, null, null, null, null, null, null);
                                $rs = $user->getorderdetails($customerId);
                                foreach ($rs as $rows) {
                                    $oid = $rows['orderId'];
                                    $sts = $rows['deliveryStatus'];
                                    $url = $rows['location'];
                                ?>
                            <div class="tracking" style="width:auto; height: auto;">  
                                    <div style="text-align: left;">
                                        <label >Order Id &ensp;&ensp;&ensp; : <?php echo $oid ?></label> <br><br>
                                        <label>Order Status : </label>
                                        <label style="border-radius:5px; width:200px;background-color:whitesmoke; text-align: center;"> <?php echo $sts ?> </label>
                                        <br><br>
                                    </div>
                                    <form action="" method="post">
                                    <?php 
                                    if($sts == 'Shipped'){ ?>
                                        <div>
                                            <button class="btn btn-success" name="track">Track Location</button>
                                        </div>
                                        <br>
                                    <?php 
                                    if(isset($_POST['track'])){ 
                                        //php code goes from here to update order place mapping calling the function to get link
                                        ?>
                                    <div>
                                        <div>
                                            <!-- <iframe src="" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                                        <?php echo $url ?>
                                        </div>    
                                    </div>
                                    <?php }
                                        ?>
                                     
                                    <?php }
                                    ?>
                                    </form>
                                    <br>
                            </div>
                            <?php }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
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


</body>

</html>