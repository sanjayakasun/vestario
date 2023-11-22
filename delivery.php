
<?php
require_once 'classes/DbConnector.php';
require 'classes/Delivery_process.php';
$userr = new DeliveryMember();
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
            .navbar {
            font-weight: bold;
        }

        .background_ {
            background-color: #EEEEEE;
        }
      
        </style>
    </head>
    <body>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

        <div class="background_">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
                &ensp;
            
                <h4 class="navbar-brand">Hello Delivery Member! </h4>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse " id="nav_tings">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="home.php" class="nav-link active">LogOut</a></li>
                        
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
                        </select>        
                    </div>
                    <div class="row mt-2">
                        <label for="validationTooltip02" class="form-label">Location Link</label>
                        <input type="text" name="location" class="form-control" id="validationTooltip02" value="">        </div>
                    <div class="row mt-2">
                        <input type="submit" name="update" value="Update" style="background-color:#00ADB5; border:1px solid rgb(0, 183, 255); border-radius: 5px; ">
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
                            <th colspan="7">Order Details</th>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Location Url</th>
                            <th>Delivery Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = $userr->getUsers();

                        foreach ($users as $userData) {
                            ?>
                            <tr aria-rowspan="3">
                                <td><?php echo $userData['orderId']; ?></td>
                                <td><?php echo $userData['customerId']; ?></td>
                                <td><?php echo $userData['orderDate']; ?></td>
                                 <td><?php echo $userData['price']; ?></td>
                                <td><?php echo $userData['deliveryStatus']; ?></td>
                                <td><?php echo $userData['location']; ?></td>
                                <td><?php echo $userData['address']; ?></td>
                            </tr><?php }
                        ?>
                    </tbody>

                </table>
            </section>
        </body>
        </body>
        </html>