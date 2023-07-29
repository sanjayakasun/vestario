<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout and Payment</title>
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
    
    <style>
        .navbar{
            font-weight: bold;
        }

        .serch{
            width:150px;
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


    <section class="h-100 gradient-custom" >
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            <div class="row">
                                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                        <img src="https://ae01.alicdn.com/kf/Sd8570c0ff5d24a9b9888aaa6bc50c3cbC/Panhua-long-dress-skirt-2023-new-solid-color-temperament-long-loose-large-dress-pleated-women.jpg_220x220xz.jpg_.webp"
                                             class="w-100" alt="women-dress" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </div>

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                    <!-- Data -->
                                    <p><strong>Frock </strong></p>
                                    <p>Size: s</p>

                                    <!-- Data -->
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <div class="form-outline">
                                            <!--<input id="form1" min="0" name="quantity" value="1" type="fixed" class="form-control" />-->
                                            <label class="form-label" for="form1">Quantity: 1</label>
                                        </div>
                                    </div>
                                    <!-- Quantity -->

                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>Rs.4580.00</strong>
                                    </p>
                                    <!-- Price -->
                                </div>
                            </div>
                            <!-- Single item -->

                            <hr class="my-4" />

                            <!-- Single item -->
                            <div class="row">
                                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                        <img src="https://ae01.alicdn.com/kf/Sf9c7db4509134e42a2ab8fab673787697/2023-Trendy-men-s-beach-shorts-Summer-classic-men-s-seaside-fashion-shorts-daily-leisure-sports.jpg_220x220xz.jpg_.webp" class="w-100" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </div>

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                    <!-- Data -->
                                    <p><strong>Short</strong></p>

                                    <p>Size: 36</p>

                                    <!-- Data -->
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <!-- Quantity -->
                                    <div class="form-outline">
                                        <!--<input id="form1" min="0" name="quantity" value="1" type="fixed" class="form-control" />-->
                                        <label class="form-label" for="form1">Quantity: 1</label>
                                    </div>

                                    <!-- Quantity -->

                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>Rs.1400.00</strong>
                                    </p>
                                    <!-- Price -->
                                </div>
                            </div>
                            <!-- Single item -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Payment</h5>
                            </div>
                            <div>
                                <strong style="margin: 20px">Select Payment Method</strong>
                                <select style="
                      background-color: rgb(135, 203, 185);
                      color: #333;
                      padding: 5px;
                      margin: 20px;
                    ">
                                    <option value="option1">Bank Deposits</option>
                                    <option value="option2">Online Payment Method</option>
                                </select>
                            </div>

                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                            <strong> </strong>
                                        </div>
                                        <span><strong>Rs.5980.00</strong></span>
                                    </li>
                                </ul>
                                <div class="" style="margin-bottom: 20px">
                                    <strong class="mb-0">Payment Date</strong>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <input type="date" />
                                        <span></span>
                                    </li>
                                </div>

                                <button style="
                      background-color: #009432;
                      border: none;
                      margin-left: 80vh;
                    " type="button" class="btn btn-primary btn-lg btn-block">
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <img class="me-2" width="45px"
                                 src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/363_Visa_Credit_Card_logo-512.png"
                                 alt="Visa" />
                            <img class="me-2" width="45px"
                                 src="https://images.squarespace-cdn.com/content/v1/5ac2a5125cfd798fdb4125cd/1683379790005-OA8JCV5Q3K300IZI1B0P/american-express-logo.png"
                                 alt="American Express" />
                            <img class="me-2" width="45px"
                                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/2560px-MasterCard_Logo.svg.png"
                                 alt="Mastercard" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
<script src="https://kit.fontawesome.com/d8fba019aa.js" crossorigin="anonymous"></script>
</body>
</html>