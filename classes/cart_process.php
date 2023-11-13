<?php


require 'DbConnector.php';

class cart{
//    
//    private $db;
//
//    public function __construct() {
//        $this->db = new DbConnector();
//    }
    private $name;
    private $price;
    private $discription;
    private $size;
    private $img;
       
    // take data from clothing collection page
//    public function getProductDetails($cartId,$cusid) {   //public function getItems($cusid){
//        //$con = $this->db->getConnection();
//        try{
//        $dbcon = new DbConnector();
//        $con = $dbcon->getConnection();
//        $query = "SELECT * FROM product WHERE product_id = ?"; //$query = "SELECT * FROM cart WHERE customerid=?";
//        $pstmt = $con->prepare($query);
//                                        $pstmt->bindParam(1, $cusid);   
//        $pstmt->execute();
//        $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
//        
//        foreach ($rs as $rows) {
//            //store that values to variables
//            $name = $rows['product_name'];
//            $price = $rows['price'];
//            $photo = $rows['photo'];
//            //$size = $rows['size'];
//            $description = $rows['discription'];
//            $this->name = $name;
//            $this->price=$price;
//            $this->photo=$photo;
//            $this->description = $description;
//            
//             
//        $query2 = "INSERT INTO cart(customerId,productId,name,price,size,photo,description) VALUES ('$cusid','$cartId','$name',$price','$size', '$photo', '$description')";
//        $pstmt2 = $con->prepare($query2);
//        $a = $pstmt->execute();
//        } 
//        } catch (PDOException  $e) {
//            echo "Error: " . $e->getMessage();
//        }
//        
//        
//    }
    
    
    
    public function getProductDetails($cartId, $cusid,$size) {
    try {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM product WHERE product_id = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindParam(1, $cartId, PDO::PARAM_INT);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($rs)) {
            $row = $rs[0];
            $pid = $row['product_id'];
            $name = $row['product_name'];
            $price = $row['price'];
            $photo = $row['photo'];
//            $size = $row['size'];
            $description = $row['discription'];

            $query2 = "INSERT INTO cart(customerId, productId,size,price,name,photo,description) VALUES (?, ?,?,?,?,?,?)";
            $pstmt2 = $con->prepare($query2);
            $pstmt2->bindParam(1, $cusid, PDO::PARAM_INT);
            $pstmt2->bindParam(2, $pid, PDO::PARAM_INT);
            $pstmt2->bindParam(3, $size);
           $pstmt2->bindParam(4, $price);
           $pstmt2->bindParam(5, $name );
           $pstmt2->bindParam(6, $photo);
           $pstmt2->bindParam(7, $description);

            $a = $pstmt2->execute();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
    
    
    
     
    
        //Display the items in the database
        public function getItems($cusid) {
        try {
            $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
            $query = "SELECT * FROM cart WHERE customerId = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1, $cusid);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    //remove from cart
     public function removeFromCart($cartId) {

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "DELETE FROM cart WHERE cartId = $cartId";   
        //$sql = "DELETE  FROM cart WHERE cartId=? ";
        $pstmt = $con->prepare($query);
        //$stmt->bindParam(1, $cartId);
        $pstmt->execute();
    }

      
}


 
?>

 