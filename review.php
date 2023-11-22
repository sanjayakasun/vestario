<?php
session_start();
require './classes/Review.php';
require './classes/RegisteredCustomer.php';

// if (!isset($_SESSION['customerId'])) {
//     header('Location:login.php');
// }

// $customerId=$_SESSION['customerId'];
//$customerId=26;

if (isset($_POST['submit'])) {
    if (empty($_POST['rate']) || empty($_POST['comment']) || empty($_POST['name']) ) {
      $errors[] = "Please fill required fields";
    } else {
      $rate = $_POST['rate'];
      $comment = $_POST['comment'];
      $name = $_POST['name'];
  
      $dbcon = new DbConnector();
      $con = $dbcon->getConnection();
  
      $user=new RegisteredCustomer(null,null,null,null,null,null,null);
      $reviewPlacing = $user->placeReview($name,$rate,$comment);
      if ($reviewPlacing) {
        $success = 'Review Added Successfully';
      } else {
        $errors[] = "Failed to Add a Review";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>

    <!--<link rel="stylesheet" href="review1.css">-->
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
    <script src="https://kit.fontawesome.com/d8fba019aa.js" crossorigin="anonymous"></script>

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
                    <li class="nav-item"><a href="home.php" class="nav-link active">
                            Home</a></li>
                    <li class="nav-item" title="Categories"><a href="home.php#link-to-category" class="nav-link">Categories</a></li>

                    <li class="nav-item"><a href="design.php" class="nav-link">Customize Products</a></li>

                    <?php
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
        <h2 id="fh2" style="color:black; font-family:segoe-ui ">WE APPRECIATE YOUR REVIEW!</h2>
        <h6 id="fh6">Your review will help us to improve our web hosting quality products, and customer services.</h6>


        <form id="feedback" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
            



            <div class="pinfo">Rate our overall services.</div>
            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input type="text" name="name" class="form-control" id="review" rows="3">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-star"></i></span>
                        <select class="form-control" id="rate" name="rate">
                            <option value="1star">1</option>
                            <option value="2stars">2</option>
                            <option value="3stars">3</option>
                            <option value="4stars">4</option>
                            <option value="5stars">5</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="pinfo">Write your feedback.</div>


            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <textarea class="form-control" id="review" rows="3" name="comment"></textarea>

                    </div>
                </div>
            </div>

            <button style="background-color: rgb(135, 203, 185);border-color: rgb(135, 203, 185);color: #009432; border-radius:10px" type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <div class="review-view">
            <h2>Customer Reviews</h2>
            <?php

      $dbcon = new DbConnector();
      $con = $dbcon->getConnection();
      $review = new Review(null, null);
      $pstmt = $review->displayReview();


      while ($result = $pstmt->fetch(PDO::FETCH_OBJ)) {

        // $cusId = $result->customerId;
        $rating = $result->rating;
        $comments = $result->comment;
        $name = $result->name;

        // $query3 = "SELECT name FROM registeredcustomer WHERE customerId=?";
        // $pstmt3 = $con->prepare($query3);
        // $pstmt3->bindValue(1, $cusId);
        // $pstmt3->execute();

        // $result1 = $pstmt3->fetch(PDO::FETCH_OBJ);
        // $name = $result1->name;

      ?>
                <!--code to loop-->
                <div class="review">
                    <div class="review-info">
                        <span class="review-rating"><?php echo $rating; ?></span>
                        <div class="star">
                            <?php for ($i = 0; $i < $rating; $i++) {
                            ?>
                                <i class="fa-solid fa-star" style="color: #faf200;"></i>&nbsp;
                            <?php
                            }
                            ?>
                        </div>
                        <span class="review-name"><?php echo $name; ?></span>
                    </div>
                    <div class="review-comment">
                        <Strong><p><?php echo $comments; ?></p></Strong>

                    </div>
                    <div>
                        <p style="text-align: right;"><?php $currentDateTime = date('Y-m-d H:i:s'); echo $currentDateTime?></p>

                    </div>

                </div>
                <hr>
            <?php
            }
            ?>
            <!--loop end-->

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
<style>
    #feedback {

        max-width: 50%;
        width: 80%;
        margin: 10px auto;
        padding: 20px;
        border: solid 1px #f1f1f1;
        background: #fbfbfb;
        box-shadow: #e6e6e6 0 0 4px;
        border-radius: 10px;
    }

    @media (max-width: 720px) {
        #feedback {
            max-width: 90%;
        }
    }

    @media (max-width: 500px) {
        #feedback {
            padding: 10px;
        }
    }

    .review-view>h2 {
        color: #009432;
    }

    #fh2 {
        padding: 2px 15px;
        color: #009432;
        text-align: center;


    }

    @media (max-width: 400px) {
        #fh2 {
            font-size: 20px;

        }
    }


    #fh6 {
        padding: 2px 15px;
        text-align: center;
        font-weight: normal;
    }

    @media (max-width: 400px) {
        #fh6 {
            font-size: 12px;
        }
    }

    .pinfo {
        margin: 8px auto;
        font-weight: bold;
        line-height: 1.5;
        color: #0d0d0d;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        line-height: 1.25;
        font-weight: bold;
        color: #6C6262;
        background-color: #fff;
        background-image: none;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
        -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
        transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
        -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
    }

    .form-control::-ms-expand {
        background-color: transparent;
        border: 0;
    }

    .form-control:focus {

        color: #696060;
        background-color: #fff;
        border-color: #5cb3fd;
        outline: none;
    }

    .form-control::-webkit-input-placeholder {
        color: #F34949;
        opacity: 1;
    }

    .form-control::-moz-placeholder {
        color: brown;
        opacity: 1;
    }

    .form-control:-ms-input-placeholder {
        color: blue;
        opacity: 1;
    }

    .form-control::placeholder {
        color: white;
        opacity: 1;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: red;
        opacity: 1;
    }

    .form-control:disabled {
        cursor: not-allowed;
    }

    select.form-control:not([size]):not([multiple]) {
        height: calc(2.25rem + 2px);
    }

    select.form-control:focus::-ms-value {
        color: green;
        background-color: #fff;
    }

    .form-control-file,
    .form-control-range {
        display: block;
    }

    .input-group {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        width: 100%;

    }

    .input-group .form-control {
        position: relative;
        z-index: 2;
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        width: 1%;
        margin-bottom: 0;
    }

    .input-group .form-control:focus,
    .input-group .form-control:active,
    .input-group .form-control:hover {
        z-index: 3;
    }

    .input-group-addon,
    .input-group-btn,
    .input-group .form-control {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .input-group-addon:not(:first-child):not(:last-child),
    .input-group-btn:not(:first-child):not(:last-child),
    .input-group .form-control:not(:first-child):not(:last-child) {
        border-radius: 0;
    }

    .input-group-addon,
    .input-group-btn {
        white-space: nowrap;
        vertical-align: middle;
    }

    .input-group-addon {
        width: 45px;
        padding: 0.5rem 0.75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: normal;
        line-height: 1.25;
        color: #2e2e2e;
        text-align: center;
        background-color: #eceeef;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
    }

    .input-group-addon.form-control-sm,
    .input-group-sm>.input-group-addon,
    .input-group-sm>.input-group-btn>.input-group-addon.btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
    }

    .input-group-addon.form-control-lg,
    .input-group-lg>.input-group-addon,
    .input-group-lg>.input-group-btn>.input-group-addon.btn {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
        border-radius: 0.3rem;
    }

    .input-group-addon input[type="radio"],
    .input-group-addon input[type="checkbox"] {
        margin-top: 0;
    }

    .input-group .form-control:not(:last-child),
    .input-group-addon:not(:last-child),
    .input-group-btn:not(:last-child)>.btn,
    .input-group-btn:not(:last-child)>.btn-group>.btn,
    .input-group-btn:not(:last-child)>.dropdown-toggle,
    .input-group-btn:not(:first-child)>.btn:not(:last-child):not(.dropdown-toggle),
    .input-group-btn:not(:first-child)>.btn-group:not(:last-child)>.btn {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .input-group-addon:not(:last-child) {
        border-right: 0;
    }

    .input-group .form-control:not(:first-child),
    .input-group-addon:not(:first-child),
    .input-group-btn:not(:first-child)>.btn,
    .input-group-btn:not(:first-child)>.btn-group>.btn,
    .input-group-btn:not(:first-child)>.dropdown-toggle,
    .input-group-btn:not(:last-child)>.btn:not(:first-child),
    .input-group-btn:not(:last-child)>.btn-group:not(:first-child)>.btn {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }

    .form-control+.input-group-addon:not(:first-child) {
        border-left: 0;
    }

    .btn {
        display: inline-block;
        font-weight: normal;
        line-height: 1.25;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .btn:focus,
    .btn:hover {
        text-decoration: none;
    }

    .btn:focus,
    .btn.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.25);
        box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.25);
    }

    .btn.disabled,
    .btn:disabled {
        cursor: not-allowed;
        opacity: .65;
    }

    .btn:active,
    .btn.active {
        background-image: none;
    }

    a.btn.disabled,
    fieldset[disabled] a.btn {
        pointer-events: none;
    }

    .btn-primary {
        color: #fff;
        background-color: #0275d8;
        border-color: #0275d8;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #025aa5;
        border-color: #01549b;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        -webkit-box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.5);
        box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.5);
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
        background-color: #0275d8;
        border-color: #0275d8;
    }

    .btn-primary:active,
    .btn-primary.active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #025aa5;
        background-image: none;
        border-color: #01549b;
    }

    .review-form,
    .review-view {
        width: 675px;
        margin: 20px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .review-form h2,
    .review-view h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .review-rating {
        font-size: 20px;
        font-weight: bold;
        margin-right: 5px;
    }

    .review-comment {
        border-left: 2px solid #ccc;
        padding-left: 10px;
    }

    .star {
        width: 30px;
        height: 30px;
        background-color: transparent;
        display:flex;


        background-size: cover;
        cursor: pointer;
        margin: 0 2px;
    }
</style>

</html>