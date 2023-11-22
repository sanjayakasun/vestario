<!DOCTYPE html>
<?php
require 'classes/Admin_dashboard_process.php';

$user = new Admin();
$dbcon =  new DbConnector();
//if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
//    $id = $_POST["customerId"];
//    $user->deleteUser($id);
//}

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    if (isset($_POST['customerId']) && isset($_POST['submit'])) {
//        $id = $_POST['customerId'];
//        
//      
//        
//        if ($success) {
//            // Redirect back to the page or display a success message
//            header('Location: admin_dashboard.php');
//            exit;
//        }
//    }
//}
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <style>
        .row {
            padding: 20px 10px 10px 20px;

        }

        .card {
            box-shadow: 5px 10px #f3f1f1;
        }

        .card:hover {
            background-color: rgb(216, 217, 218);

        }

        .s1 {
            padding: 20px 10px 10px 20px;
        }

        .btn {
            position: relative;
            left: 100px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <div class="background_">

        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#222831">
            <a href="" class="navbar-brand">Vestario</a>&ensp;
            <h4 class="navbar-brand">Hello Admin! </h4>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_tings"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="nav_tings">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link active">LogOut</a></li>

                </ul>
            </div>
        </nav>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. of customers</h5>
                        <p class="card-text"> <?php
                                                $countt = $user->getCount('registeredcustomer');
                                                echo $countt;
                                                ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. of products</h5>
                        <p class="card-text"><?php
                                                $countt = $user->getCount('product');
                                                echo $countt;
                                                ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. of orders</h5>
                        <p class="card-text">
                            <?php
                            $countt = $user->getCount('orders');
                            echo $countt;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="5">Customers</th>
                    </tr>
                    <tr>
                        <th>CustomerID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('registeredcustomer');

                    foreach ($users as $userData) {
                    ?>
                        <tr>
                            <td><?php echo $userData['customerId']; ?></td>
                            <td><?php echo $userData['name']; ?></td>
                            <td><?php echo $userData['email']; ?></td>
                            <td><?php echo $userData['contactNumber']; ?></td>
                            <td><?php echo $userData['address']; ?></td>

                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>


        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="4">Products
                            <a type="button" class="btn btn-outline-dark" href="Admin.php">Add Products</a> </button>
                        </th>
                    </tr>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('product');

                    foreach ($users as $userData) {
                    ?>
                        <tr>
                            <td><?php echo $userData['product_id']; ?></td>
                            <td><?php echo $userData['product_name']; ?></td>
                            <td><?php echo $userData['price']; ?></td>

                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>

        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="6">Orders</th>
                    </tr>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Id</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Order Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUser('orders');

                    foreach ($users as $userData) {
                    ?>
                        <tr>
                            <td><?php echo $userData['orderId']; ?></td>
                            <td><?php echo $userData['customerId']; ?></td>
                            <td><?php echo $userData['orderDate']; ?></td>
                            <td><?php echo $userData['price']; ?></td>
                            <td><?php echo $userData['quantity']; ?></td>
                            <td><?php echo $userData['deliveryStatus']; ?></td>


                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>
        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="7">Customized Designs</th>
                    </tr>
                    <tr>
                        <th>Customer Id</th>
                        <th>Item Id</th>
                        <th>Designed Image</th>
                        <th>E-mail</th>
                        <th>Delivery Address</th>
                        <th>Size</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('designitem');

                    foreach ($users as $userData) {
                    ?>
                        <tr>
                            <td><?php echo $userData['customerId']; ?></td>
                            <td><?php echo $userData['itemId']; ?></td>
                            <td><img src="img/<?php echo $userData['image']; ?>" style="width:50px;"></td>
                            <td><?php echo $userData['email']; ?></td>
                            <td><?php echo $userData['deliveryAddress']; ?></td>
                            <td><?php echo $userData['size']; ?></td>
                            <td><?php echo $userData['quantity']; ?></td>
                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>
        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="4">Reviews</th>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('review');

                    foreach ($users as $userData) {
                        $id = $userData['reviewId'];
                    ?>
                        <tr>
                            <td><?php echo $userData['name']; ?></td>
                            <td><?php echo $userData['rating']; ?></td>
                            <td><?php echo $userData['comment']; ?></td>
                            <td><a href="classes/Admin_dashboard_process.php?delete=<?php echo $id; ?>" class="btn btn-danger"> Remove </a></td>
                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>
        <section class="s1">
            <table class="table table-hover table-striped">

                <?php
                // $con = $dbcon->getConnection();
                // $sql = "SELECT * FROM registeredcustomer ";
                // $stmt = $con->prepare($sql);
                // $stmt->execute();
                // $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <thead>
                    <tr>
                        <th colspan="4">Inquiry</th>
                    </tr>
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('inquiry');
                    $cusID = $userData['customerId'];
                    foreach ($users as $userData) {
                        $con = $dbcon->getConnection();
                        $sql = "SELECT * FROM registeredcustomer WHERE customerId = $cusID";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $users = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <tr>
                            <td><?php echo $userData['customerId']; ?></td>
                            <td><?php echo $users['name']; ?></td>
                            <td><?php echo $users['email']; ?></td>
                            <td><?php echo $userData['message']; ?></td>

                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>
        <section class="s1">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th colspan="4">Payment Details</th>
                    </tr>
                    <tr>

                        <th>Order Id</th>
                        <th>Payment Date</th>
                        <th>Payment Method</th>
                        <th>Price Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $user->getUsers('orders');

                    foreach ($users as $userData) {
                    ?>
                        <tr>
                            <td><?php echo $userData['orderId']; ?></td>
                            <td><?php echo $userData['orderDate']; ?></td>
                            <td>Card Pay</td>
                            <td><?php echo $userData['price']; ?></td>

                        </tr><?php }
                                ?>
                </tbody>

            </table>
        </section>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const deliveryId = this.parentElement.querySelector('input[name="deliveryId"]').value;

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this delivery!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to delete action with deliveryId
                        window.location.href = `admin_dashboard.php?deleteDelivery=${deliveryId}`;
                    }
                });
            });
        });
    });
</script>

</html>