<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women collection</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <title>Navbar</title>
    <style>
        .navbar {
            font-weight: bold;
        }

/*        .btn-explo {
            display: block;
            width: 100%;
            cursor: pointer;
            border-radius: .5rem;
            margin-top: 1rem;
            font-size: 1.7rem;
            padding: 1rem 3rem;
            background: var(--green);
            color: var(--white);
            text-align: center;
        }

        .btn-explo:hover {
            background: var(--black);
            color: var(--white);
        }*/
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
                    session_start();
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
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="bg-light border rounded border-0 border-dark overflow-hidden">
                    <div class="row">
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="text-center">Women's Collection</h1>
                                </div>
                            </div><!--row header-->
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                                    <p class="text-center lead">Comfirt Fit Crew Neck T-Shirt</p>
                                    <img src="src_images/women/comfirt fit crew neck t-shirt - orange/comfirt fit crew neck t-shirt - orange.jpg"
                                        alt="picture 1" style="height:250px;" class="mx-auto d-block img-fluid">
                                    <br><p class="text-center lead" style="font-size: 15px;">Price Range: <b>Rs.1500 - Rs.2000</b> <br> 
                                    Select your favorite Colors and matching sizes</p>
                                    <center><a href="women_crew_neck_T_Shirt.php" class="btn btn-outline-dark  btn-sm ">See more</a></center>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 ">
                                    <p class="text-center lead">Women's Slim Fit T-Shirt</p>
                                    <img src="src_images/women/Womens Slim Fit T-Shirt/Womens Slim Fit T-Shirt - blue.png" alt="picture 1"
                                        style="height:250px;" class="mx-auto d-block img-fluid">
                                    <br><p class="text-center lead" style="font-size: 15px;">Price Range: <b>Rs.1800 - Rs.2000</b> <br> 
                                    Select your favorite Colors and matching sizes</p>
                                    <center><a href="Women's_Slim_Fit_T_Shirt.php" class="btn btn-outline-dark btn-sm ">See more</a></center>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 ">
                                    <p class="text-center lead">Womens Traveler Pant</p>
                                    <img src="src_images/women/womens traveler pant/Womens Traveler Pant - Drift Wood.jpg" alt="picture 1"
                                        style="height:250px;" class="mx-auto d-block img-fluid">
                                    <br><p class="text-center lead" style="font-size: 15px;">Price Range: <b>Rs.2000 - Rs.2500</b> <br> 
                                    Select your favorite Colors and matching sizes</p>
                                    <center><a href="womens_traveler_pant.php" class="btn btn-outline-dark btn-sm ">See more</a></center>
   </center>                             </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 ">
                                    <p class="text-center lead">Womens Premium Legging</p>
                                    <img src="src_images/women/legging/womens premium Legging - white.jpg" alt="picture 1"
                                        style="height:250px;" class="mx-auto d-block img-fluid">
                                    <br><p class="text-center lead" style="font-size: 15px;">Price Range: <b>Rs.2000 - Rs.2500</b> <br> 
                                    Select your favorite Colors and matching sizes</p>
                                    <center><a href="legging.php" class="btn btn-outline-dark btn-sm ">See more</a></center>
                </center>                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 ">
                                    <p class="text-center lead">Womes's Classic Pant</p>
                                    <img src="src_images/women/Womens Classic Pant/Womens Classic Pant - Miracle Navy.jpg" alt="picture 1"
                                        style="height:250px;" class="mx-auto d-block img-fluid">
                                    <br><p class="text-center lead" style="font-size: 15px;">Price Range: <b>Rs.1800 - Rs.2100</b> <br> 
                                    Select your favorite Colors and matching sizes</p>
                                    <center><a href="Womess_Classic_Pant.php" class="btn btn-outline-dark btn-sm ">See more</a></center>
    </center>                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <br><br>
    </div>





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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>