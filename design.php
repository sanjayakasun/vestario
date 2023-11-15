<?php
session_start();
    if(!isset($_SESSION['customerId'])){
        header('Location:login.php');
    }
    ?>

<?php
$massage = null;

if(isset($_GET['status'])){
    $status= $_GET['status'];
    if ($status==0){
        $massage ="<h6 class='text-danger'>required values1 not submitted</h6>";
        
    }
    elseif ($status==1) {
        $massage = "<h6 class='text-danger'>you must fill all fields </h6>";   
    }
    elseif ($status==2) {
        $massage = "<h6 class='text-success'> you have successfully submitted and thanks for the order we will contact you soon</>";
    }
    else {
        $massage = "<h6 class='text-danger'>error occurred during the designing</h6>" ;   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customise Design</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="css/design.css">

     
</head>

<body> 

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






     






    <div class="container">
    <div class="text-center mb-5">
      <p><h3>Customized Design</h3></p>
      <p class="lead">Unleash your creativity and fashion-forward spirit as you embark on a personalized style journey like no other.</p>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">CD</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">You can build your Customized  Design from here</h4>
              
            </div>
             
            <div class="col-sm-3 text-lg-end">
              <a href="https://printify.com/app/editor/12/50" class="btn btn-primary stretched-link">Click here</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">CD</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">Upload your Design</h4>
              
            </div>
             
            <div class="col">
            <?=$massage?>
              <form action="design1.php" method="post" enctype="multipart/form-data">
                <table>
                  <tr>
                    <td><input type="file" name="image" accept="image/png,image/jpeg,image/jpg" required/></td>
                  </tr>
                  <tr>
                    <td><p class="name" >customer Id</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="customerName" required></td>
                  </tr>
                  <tr>
                    <td><p class="name" >email</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="email"></td>
                  </tr>
                  <tr>
                    <td><p class="name" >delivery address</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="deliveryAddress" required></td>
                  </tr>
                  <tr>
                    <td><p class="name">Size</p></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="size" required></td>
                  </tr>
                  <tr>
                    <td><p class="name">quantity</p></td>
                  </tr>
                  <tr>
                    <td><input type="number" name="quantity" required></td>
                  </tr>
                  <tr>
                    <td><input type="submit" value="Submit" class="submit"></td>
                  </tr>

                </table>
              </form>
            
            </div>
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

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>

</html>