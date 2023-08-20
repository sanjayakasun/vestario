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
       

  <form>
    <div class="container col-7 col-md-4 col-sm-8 mt-5">
        <div class="row mt-2">
<h3>Delivery Dashboard</h3>
        </div>
        <div class="row mt-2">
            <label for="validationTooltip01" class="form-label">Order ID</label> 
            <input type="text" class="form-control" id="validationTooltip01" value="" required>

        </div>
        <div class="row mt-2">
            <label for="validationTooltip02" class="form-label">Delivery member name</label>
            <input type="text" class="form-control" id="validationTooltip02" value="" required>        </div>
        <div class="row mt-2">
            <label for="validationTooltip04" class="form-label">State</label>
            <select class="form-select" id="validationTooltip04" required>
              <option selected disabled value="">Choose...</option>
              <option>Processing</option>
              <option>Shipped</option>
              <option>Delivered</option>
            </select>        </div>
            <div class="row mt-2">
                <input type="submit" value="Update" style="background-color:#87CBB9; border:1px solid rgb(0, 183, 255); border-radius: 5px; ">
            </div>
    </div>
    </form>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">No. of products processing</h5>
          <p class="card-text">250</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">No. of products shipped</h5>
          <p class="card-text">25</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">No. of products delivered</h5>
          <p class="card-text">20</p>
        </div>
      </div>
    </div>
  </div>
</section>
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
</body>
</html>