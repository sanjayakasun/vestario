<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
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
    <title>Navbar</title>
    <style>
        .navbar{
            font-weight: bold;
        }
        .background_{
            background-image:url(src_images/bg3.jpg);
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-size:cover;
        }
        .serch{
            width:150px;
        }
    </style>

</head>
<body>
    <?php
    session_start();
    $uname = $_SESSION['customerId'];
    // if(isset($_SESSION['customerName'])){
    //     header('Location:home.php');
    // }else{
    //     header('Location:login.php');
    // }
     ?>
    <!--Header-->
    <div class="background_">
    <nav class="navbar navbar-light navbar-expand-lg"  style="background-color:#87CBB9">
        &ensp;
        <a href="" class="navbar-brand"><img src="src_images/logo new.png" style="width:50px; height:50px;">&ensp;Vestario</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="nav_tings">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="home_logged.php" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="#link-to-category" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Customize Products</a></li>
                <li class="nav-item"><a href="wishlist.php" class="nav-link">Wishlist</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
                <li class="nav-item" ><a href="home.php" class="nav-link"><i class="fa fa-user-circle-o" style="color:yellow; font-size:20px"></i> Hello, <?php echo $uname ?> !</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="form-inline my-2 my-lg-0 d-flex">
                    <input class="form-control mr-sm-2 bar" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <div class="col-md-6">
                <button class="btn btn-outline-dark my-2 my-sm-0 serch" type="submit">Search Items</button>
            </div>
        </div> 
    </div>

    <div id="link-to-category">
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="bg-light border rounded border-0 border-dark overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="text-dark p-4 p-md-5">
                                <h2 class="fw-bold text-dark mb-3"><strong>Men Collection</strong></h2>
                                <p class="mb-4">We provide to you best quality products for you</p>
                                <div class="my-3"><a class="btn  btn-lg me-2" role="button" href="men.php" style="background:#87CBB9 ;">Goto Collection</a></div>
                            </div>
                        </div>
                        <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="src_images/men.jpg"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="link-to-category">
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="bg-light border rounded border-0 border-dark overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6"><img class="w-100 h-100 fit-cover" src="src_images/women.jpg"></div>
                        <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                            <div class="text-dark p-4 p-md-5">
                                <h2 class="fw-bold text-dark mb-3"><strong>Women Collections</strong></h2>
                                <p class="mb-4">We provide to you best quality products for you</p>
                                <div class="my-3"><a class="btn btn-lg me-2" role="button" href="women.php" style="background:#87CBB9;"><span style="color: var(--bs-btn-hover-color);">Goto Collection</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


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
             <a href="#link-to-category" style="text-decoration:none; color:black"><li>Order Clothes</li></a>
             <a href="" style="text-decoration:none; color:black"><li>Delivery</li></a>
             <!-- <a href="" style="text-decoration:none; color:black"><li></li></a> -->
             <a href="" style="text-decoration:none; color:black"><li>Help</li></a>
         </ul>
     </div>
     <div class="col-md-3">
         <h6>
            Location
         </h6>
         <p>    
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.232221977519!2d81.07370807384885!3d6.981900517669062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva%20Wellassa%20University%20of%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1693496700699!5m2!1sen!2slk" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
 <hr><hr>
    
</body>
</html>