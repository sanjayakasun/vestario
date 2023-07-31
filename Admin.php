
<?php

        if(isset($_POST['add_product'])){
            @include 'config.php';
           $selectd_value = $_POST['category'] ;
           $name = $_POST['title'];
           $price = $_POST['product_price'];
           $image = $_FILES['product_image']['name'];
           $image_tmp_name = $_FILES['product_image']['tmp_name'];
           $image_folder ='img/'.$image ;
           $selectd_value3 = $_POST['size'];
           $discription = $_POST['discription'];
            if(empty($selectd_value) || empty($selectd_value3) || empty($name) || empty($price) || empty($image) || empty($discription)){
                $message_null = '<h3 style="color:red;" class="text-center">please fill out all</h3>';
                echo $message_null;
//                $null = 1;
//                echo '<script>Messagenull()</script>';
            }else{
                $insert = "INSERT INTO product(category,name,price,photo,size,discription) VALUES('$selectd_value','$name','$price','$image','$selectd_value3','$discription')";
                $upload = mysqli_query($conn,$insert);
                if($upload){
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message_done = '<h3 style="color:green;" class="text-center">Product Added Sucessfully</h3>';
                    echo $message_done;
                }else{
                    $message_no = '<h3 style="color:red;" class="text-center">Did Not Added</h3>';
                    echo $message_no; 
                } 
//                $null = 0;
//                echo '<script>Messagenull()</script>';
            }
        }

        if (isset($_GET['delete'])){
            @include 'config.php';
            $id = $_GET['delete'];
            mysqli_query($conn,"DELETE FROM product WHERE id = '$id' ");
            header('Location:Admin.php');
        }
       ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbjFIV3BGRTc4V1FVYTQwVk5GNnFDbGRPaExFZ3xBQ3Jtc0ttUGpHSXpLbmFzWGozZE1OczJBTnZXSHVZQ2tqVkZkelZ3YlkxSFR4NjItTjk1VjVwMVg3M1FMRUhuOEJiRmsxTnp3SXo0dlZCdmx1WXJSWUE2X3pSMHE0R2h5NU13Mm5NcDdKVWluWGtIUHA4VFc4UQ&q=https%3A%2F%2Fcdnjs.com%2Flibraries%2Ffont-awesome&v=UQpZJdQ2o-I">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!--    <script src="admin.js"></script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>

    /* .btn{

    } */
    </style>
</head>
<body>
    <h1 class="text-center">ADMIN</h1>
    <div class="container">
   <div class="admin-product-form-container">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <!-- <form> -->
         <h3>add a new product</h3>
         <select class="box" name="category">
             <option>Select the category</option>
             <option value="men">Men</option>
             <option value="women">Women</option>
        </select>

         <input type="text" placeholder="Enter Product Name" name="title" class="box">
         <!-- product name means mens chino pant-brown.mens chino pant-red like wiseeee-->
         <input type="number" placeholder="Enter Product Price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
        <select class="box" name="size">
            <option>Select the Product Size</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
        </select>
         <input type="text" placeholder="Enter Product Discription" name="discription" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>
   </div>
  </div>
    
    <!-- by using database selecting the things we enterd by adding products -->
    <?php
    @include 'config.php';
   $select = mysqli_query($conn,"SELECT * FROM product");
   ?>
    <!-- throw the database connection selecting the data and store them in to a variable -->
    <div class="container">
        <?php while($row = mysqli_fetch_assoc($select)){?>
        <!--opening { bracket-->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <img src="img/<?php echo $row['photo'];?>" height="100" alt="">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h3>Category : <?php echo $row['category'];?></h3>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h3>Name : <?php echo $row['name'];?></h3>
                <br>
                <h3>Price : <?php echo $row['price'];?></h3>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h3>Size : <?php echo $row['size'];?></h3>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
                <h3>Note : <?php echo $row['discription'];?></h3>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
            <a href="update.php?edit=<?php echo $row['id']; ?>" class="btn" name="update_product"> update </a>
            <a href="Admin.php?delete=<?php echo $row['id']; ?>" class="btn_remove"> delete </a>
            
            </div>
        </div>
        <?php } ?>
<!--closing that opend } bracket-->
    </div>
</body>
</html>


