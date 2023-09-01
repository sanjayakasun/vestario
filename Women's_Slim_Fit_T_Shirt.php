<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Women's Slim Fit T-Shirt</title>
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
        </style>

    </head>

    <body>
        <!--Header-->
        <div class="background_">
            <nav class="navbar navbar-light navbar-expand-lg" style="background-color:#87CBB9">
                &ensp;
                <a href="" class="navbar-brand"><img src="src_images/logo new.png" style="width:50px; height:50px;"></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="nav_tings">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="home.html" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="home.html#link-to-category" class="nav-link active">Categories</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Wishlist</a></li>
                        <li class="nav-item"><a href="#" class='fas fa-user-circle nav-link d-flex'>Login</a></li>
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
                                        <h1 class="text-center">Women's Slim Fit T-Shirt</h1>
                                    </div>
                                </div><!--row header-->

                                <?php
                                @include 'config.php';
                                $select = mysqli_query($conn, "SELECT * FROM product WHERE category = 'women' AND product_name LIKE 'Womens Slim%' ");
                                ?>
                                <!-- throw the database connection selecting the data and store them in to a variable -->
                                <div class="container">
                                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                        <!--opening { bracket-->
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
                                                    <div class="row">
                                                        <div class="col-12 col-md-2" style="border: 1px solid green">
                                                            <h6>Stock</h6>
                                                            <input type="radio" name="size" value="<?php echo $row['size'] ?>" checked="checked"/>
                                                            <br>
                                                            <?php echo $row['size'] ?>
                                                        </div>
                                                        <div class="col-md-2 ">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
                                                            <br>
                                                            S
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
                                                            <br>
                                                            M
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
                                                            <br>
                                                            L
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
                                                            <br>
                                                            XL
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <input type="radio" name="size" value="S" />
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
                                                <button class="btn btn-primary">Place Order</button>
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
        <hr>
        <div class="container-fluid back">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="src_images/logo new.png" style="width:200px; height:200px;">
                </div>
                <div class="col-md-4">
                    <h6>Contact us</h6>
                    <a href="#" class="fa fa-facebook"></a>&ensp;&ensp;
                    <a href="#" class="fa fa-twitter"></a>&ensp;&ensp;
                    <a href="#" class="fa fa-instagram"></a>&ensp;&ensp;
                    <a href="#" class="fa fa-google"></a>&ensp;&ensp;
                    <a href="#" class="fa fa-linkedin"></a><br><br>
                    <a href="mailto:sanjayakasun44@gmail.com" class="d-flex" style="Text-decoration:none;"><span
                            class="material-symbols-outlined">mail</span>vestario@gmail.com</span>&ensp;</a>
                    <a href="#" class="d-flex" style="Text-decoration:none;"><span
                            class="material-symbols-outlined">call</span>&ensp;0712209112</a>
                    <a href="#" class="d-flex" style="Text-decoration:none;"><span
                            class="material-symbols-outlined">call</span>&ensp;0716123050</a>
                </div>
                <div class="col-md-4">
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


