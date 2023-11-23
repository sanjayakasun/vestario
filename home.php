<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <script src="js/bootstrap.js"></script>
    <!-- <link rel="stylesheet" href="css/text.css"> -->
    <!--for animated images in category-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style_for_anim_img.css">
    <!--end-->
    <!--slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/styles_slider.min.css">

    <!--end-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Home</title>
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

        :root {
            --blue: #00ADB5;
            --orange: #f39c12;
            --red: #e74c3c;
            --white: #fff;
            --light-color: #aaa;
            --black: #222;
            --light-bg: #333;
        }
    </style>

</head>
<?php
?>

<body>

    <!--Header-->
    <div class="background_">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831" id="navbar">
            &ensp;
            <a href="" class="navbar-brand">Vestario</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link active">
                            Home</a></li>
                    <li class="nav-item" title="Categories"><a href="#link-to-category" class="nav-link">Categories</a></li>

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
        <!--header finish-->

        <!--search-->
        <div class="container mt-5  mx-auto d-block">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline my-2 my-lg-0 d-flex" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                        <input class="form-control mr-sm-2 bar" type="search" placeholder="Ex:Women, Men, Crew Neck Shirt..etc" aria-label="Search" name="search">
                        &ensp;

                        <button class="btn  my-2 my-sm-0 search" type="submit" name="submit" style="background-color: var(--blue); color: var(--white);">

                            <ion-icon name="search-outline" size="medium"></ion-icon>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        
        <!--start search engine code-->
        <?php
        include "classes/DbConnector.php";
        if (isset($_POST['submit'])) {
            $ae_item = $_POST['search'];
            if (empty($_POST['search'])) {
                $message = "Enter Valid Product to search"; ?>
                <div class="container" style="width:fit-content;">
                    <div class="row" style="border-left: 4px solid red; background-color:#ff9999;">
                        <div class="col-12">
                            <?php echo $message; ?>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM product WHERE product_name LIKE '$ae_item%' ";
                $pstmt = $con->prepare($query);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rs as $row) { ?>
                    <div class="container">
                        <br>
                        <form action="cart.php?cart=<?php echo $row['product_id']; ?>" method="post">
                            <div class="row" style="border-left: 4px solid black; background-color:whitesmoke;">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <br>
                                    <p class="text-center lead"><b><?php echo $row['product_name'] ?></b></p>
                                    <img src="img/<?php echo $row['photo']; ?>" height="100" alt="picture 1" style="height:250px;" class="mx-auto d-block img-fluid">
                                    <h5 class="text-center">Rs.<?php echo $row['price'] ?> </h5> <br>
                                    <br>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <br>
                                    <p class="lead"><?php echo $row['discription'] ?></p> <br>
                                    <h5 class="text-center">Size</h5>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-2 ">
                                                <br>
                                                <input type="radio" name="size" value="S" />
                                                <br>
                                                S
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                <input type="radio" name="size" value="M" />
                                                <br>
                                                M
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                <input type="radio" name="size" value="L" />
                                                <br>
                                                L
                                            </div>
                                            <div class="col-md-2">
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

    </div>
    </div>
<?php }
            }
        }
?>
<!--end search engine code-->




        <!-- Start: Simple Slider -->
        <div class="simple-slider mx-auto d-block" style="width: 1200px;">
            <!-- Start: Slideshow -->
            <div class="swiper-container">
                <!-- Start: Slide Wrapper -->
                <div class="swiper-wrapper">
                    <!-- Start: Slide -->
                    <div data-aos="fade" class="swiper-slide text-center">
                        <img src="src_images/1.png">
                    </div>
                    <!-- End: Slide -->
                    <!-- Start: Slide -->
                    <div data-aos="fade" class="swiper-slide text-center">
                        <img src="src_images/2.png">
                    </div>
                    <!-- End: Slide -->
                    <!-- Start: Slide -->
                    <div data-aos="fade" class="swiper-slide text-center">
                        <img src="src_images/3.jpg">
                    </div>
                    <!-- End: Slide -->
                    <!-- Start: Slide -->
                    <div data-aos="fade" class="swiper-slide text-center">
                        <img src="src_images/4.png">
                    </div>
                    <!-- End: Slide -->
                </div>
                <!-- End: Slide Wrapper -->
                <!-- Start: Pagination -->
                <div class="swiper-pagination">
                </div>
                <!-- End: Pagination -->
                <!-- Start: Previous -->
                <div class="swiper-button-prev">
                </div>
                <!-- End: Previous -->
                <!-- Start: Next -->
                <div class="swiper-button-next">
                </div>
                <!-- End: Next -->
            </div>
            <!-- End: Slideshow -->
        </div>
        <!-- End: Simple Slider -->

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="font-size: 100px; font-family: 'Times New Roman', Times, serif;">“<span style="font-size: 40px;">Clothes</span> <span style="font-size:20px;">that make you feel as good as you look ?</span>
                    <span style="font-size: 20px;">Embrace your </span><span style="font-size: 40px; font-family: 'Times New Roman', Times, serif;" >Style</span> <span style="font-size: 20px;">evolution.</span>” </h1>
                </div>
            </div>
        </div>


        
<div id="link-to-category">
    <section class="py-4 py-xl-5">
        <div class="container" style="border-left: 4px solid #00ADB5; ">
            <div class="bg-light border rounded-4 border-0 border-dark overflow-hidden "  style="box-shadow: 10px 10px 30px #6b6b6a;">
                <div class="row g-0">
                    <div class="col-md-6 text-center mt-5">
                        <div class="text-dark p-4 p-md-5 ">
                            <h2 class="fw-bold text-dark mb-3"><strong>Men Collection</strong></h2>
                            <p class="mb-4">We provide best quality products for you</p>
                            <div class="my-3"><a class="btn  btn-lg me-2" role="button" href="men.php" style="background:#00ADB5 ;">Goto Collection</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last" style="height:350px;">
                        <div class="container-img" style="min-height: 350px;">
                            <img src="Anim/1.png">
                            <img src="Anim/2.png" />
                            <img src="Anim/3.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="link-to-category">
    <section class="py-4 py-xl-5">
        <div class="container" style="border-right: 4px solid #00ADB5;">
            <div class="bg-light border rounded-4 border-0 border-dark overflow-hidden" style="box-shadow: -10px 10px 30px #6b6b6a;">
                <div class="row g-0">
                    <div class="col-md-6 " style="height: 350px;">
                        <div class="container-img" style="min-height: 350px;">
                            <img src="Anim/4.png" />
                            <img src="Anim/5.png" />
                            <img src="Anim/6.png" />
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last">
                        <div class="text-dark p-4 p-md-5 text-center mt-5">
                            <h2 class="fw-bold text-dark mb-3"><strong>Women Collections</strong></h2>
                            <p class="mb-4">We provide best quality products for you</p>
                            <div class="my-3"><a class="btn btn-lg me-2" role="button" href="women.php" style="background:#00ADB5;"><span style="color: var(--bs-btn-hover-color);">Goto Collection</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script src="https://chatrace.com/webchat/plugin.js?v=2"></script><script>ktt10.setup({"pageId":"1328583","headerTitle":"Vestario","color":"#00ADB5"});</script>
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


<!--script part--->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>