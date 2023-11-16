<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Womens premium Legging</title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Navbar</title>
        <style>

.navbar {
            font-weight: bold;
        }

        .background_ {
            background-color: #EEEEEE;
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
                    <li class="nav-item"><a href="home.php" class="nav-link ">
                            Home</a></li>
                    <li class="nav-item" title="Categories"><a href="#link-to-category" class="nav-link active">Categories</a></li>

                    <li class="nav-item"><a href="design.php" class="nav-link">Customize Products</a></li>

                    <?php
                    session_start();
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




            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="bg-light border rounded border-0 border-dark overflow-hidden">
                        <div class="row">
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="text-center">Women's premium Legging</h1>
                                    </div>
                                </div><!--row header-->

                                <?php
                                @include 'config.php';
                                $select = mysqli_query($conn, "SELECT * FROM product WHERE category = 'women' AND product_name LIKE 'womens prem%' ");
                                ?>
                                <!-- throw the database connection selecting the data and store them in to a variable -->
                                <div class="container">
                                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                        <!--opening { bracket-->
                                            <form action="cart.php?cart=<?php echo $row['product_id']; ?>" method="post">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <p class="text-center lead"><?php echo $row['product_name'] ?></p>
                                                <img src="img/<?php echo $row['photo']; ?>" height="100" alt="picture 1" style="height:250px;" class="mx-auto d-block img-fluid">
                                                <h5 class="text-center">Rs.<?php echo $row['price'] ?> </h5> <br>
                                                <br>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <p class="text-center lead"><?php echo $row['discription'] ?></p> <br>
                                                <h5 class="text-center">Size</h5> 
                                                <form>
                                                <div class="row" >
                                                        <div class="col-6 col-sm-6 col-md-2 ">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
                                                            <br>
                                                            S
                                                        </div>
                                                        <div class="col-6 col-sm-6 col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="M" />
                                                            <br>
                                                            M
                                                        </div>
                                                        <div class="col-6 col-sm-6 col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="L" />
                                                            <br>
                                                            L
                                                        </div>
                                                        <div class="col-6 col-sm-6 col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="XL" />
                                                            <br>
                                                            XL
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="XXL" />
                                                            <br>
                                                            XXL
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 pt-5" style="text-align: center;">     
                                            
                                                 <button class="btn btn-outline-success">Add to Cart</button>
                                                <!-- <a href= class="btn btn-outline-success"> Add to Cart </a> -->
                                                </form>
                                                <br><br>
                                                <form action="payment.php?pay=<?php echo $row['product_id']; ?>" method="post">
                                                <button class="btn btn-primary" name="pay" title="Only one piece">Place Order</button>
                                                </form>
                                                <br><br>

                                                <form action="wishlist.php?wishlist=<?php echo $row['product_id']; ?>" method="post">
                                                <button class="btn btn-outline-warning" title="Add to wishlist"><i class="fa fa-heart-o"></i></button><br><br>
                                                </form>
                                            </div>
                                            </form>
                                        </div>
                                    <?php } ?>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <br><br>
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
                <a href="contactus.php" style="text-decoration: none; color: white;">
                    <h6>Follow us on</h6>
                </a>
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
                    <a href="chatbot.html" style="text-decoration:none; color:white">
                        <li>Chat Bot</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>
                    Contact
                </h6>
                <a href="mailto:sanjayakasun44@gmail.com" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">mail&ensp; </span>vestario@gmail.com</span>&ensp;</a>
                <a href="#" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">call</span>&ensp;0712209112</a>
                <a href="#" class="d-flex" style="text-decoration: none; color: white;"><span class="material-symbols-outlined">call</span>&ensp;0113456987</a>
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
</div>


<!--end of footer-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>



