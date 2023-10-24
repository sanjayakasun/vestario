
<?php
require_once 'classes/DbConnector.php';
require 'classes/Delivery_process.php';
$userr = new Dashboard();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delivery Dashboard</title>
        <link rel="stylesheet" href="styles.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
            />

        <style>
            .row{
                padding: 30px 40px 10px 40px;

            }
            .card{
                box-shadow: 5px 10px #f3f1f1;
            }
            .card:hover{
                background-color: rgb(220, 220, 220);

            }        
        </style>
    </head>
    <body>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"
        ></script>
        <div class="background_">
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color:#87CBB9">
                &ensp;
                <img src="src_images/logo new.png" style="width:50px; height:50px;"> &ensp;
                <h4 class="navbar-brand">Hello Delivery Member! </h4>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="nav_tings">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="home.php" class="nav-link">LogOut</a></li>
                        
                    </ul>
                </div>
            </nav>

            <form action="update_delivery.php" method="POST">
                <div class="container col-7 col-md-4 col-sm-8 mt-5">
                    <div class="row mt-2">
                        <h3>Delivery Dashboard</h3>
                    </div>
                    <div class="row mt-2">
                        <?Php
                    if(isset($_GET['error']))   {
                        if ($_GET['error'] == 0) {
                            echo '<h3 style="color:green;" class="text-center">Successfully Updated</h3>';
                        } elseif ($_GET['error'] == 1) {
                            echo '<h3 style="color:red;" class="text-center">Failed to update delivery status.</h3>';
                        } else {
                            echo '<h3 style="color:red;" class="text-center">Invalid request.</h3>';
                        }
                    } 
                    
                    ?>
                        <label for="validationTooltip01" class="form-label">Order ID</label> 
                        <input type="text" name="orderid"class="form-control" id="validationTooltip01" value="" required>

                    </div>
                    <div class="row mt-2">
                        <label for="validationTooltip02" class="form-label">Delivery member ID</label>
                        <input type="text" name="id" class="form-control" id="validationTooltip02" value="" required>        </div>
                    <div class="row mt-2">
                        <label for="validationTooltip04" class="form-label">State</label>
                        <select class="form-select" name="status"id="validationTooltip04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                        </select>        </div>
                    <div class="row mt-2">
                        <input type="submit" name="update" value="Update" style="background-color:#87CBB9; border:1px solid rgb(0, 183, 255); border-radius: 5px; ">
                    </div>
                </div>
            </form>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No. of products processing</h5>
                            <p class="card-text"><?php
                    $count = $userr->getCountProcessing();
                    echo $count;
                    ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No. of products shipped</h5>
                            <p class="card-text"><?php
                                $count = $userr->getCountShipped();
                                echo $count;
                    ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No. of products delivered</h5>
                            <p class="card-text"><?php
                                $count = $userr->getCountDelivered();
                                echo $count;
                    ?></p>
                        </div>
                    </div>
                </div>
            </div>
         <section class="s1">
                <table class="table table-hover table-striped">

                    <thead>
                        <tr>
                            <th colspan="4">Order Details</th>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = $userr->getUsers('orders');

                        foreach ($users as $userData) {
                            ?>
                            <tr>
                                <td><?php echo $userData['orderId']; ?></td>
                                <td><?php echo $userData['customerId']; ?></td>
                                <td><?php echo $userData['orderStatus']; ?></td>

                            </tr><?php }
                        ?>
                    </tbody>

                </table>
            </section>
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
        </body>
        </body>
        </html>