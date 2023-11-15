<?php


require_once 'DbConnector.php';

class design_process{
  
    private $image;
    private $customerName;
    private $email;
    private $deliveryAddress;
    private $size;
    private $quantity;
   

    public function __construct($image,$customerName,$email,$deliveryAddress,$size,$quantity){
        $this->image=$image;
        $this->customerName = $customerName;
        $this->email = $email;
        $this->deliveryAddress=$deliveryAddress;
        $this->size=$size;
        $this->quantity=$quantity;
    }
    
    public function deliveryProcess($con){
        try {
           
            $query = "INSERT INTO designitem (image,customerId,email,deliveryAddress,size,quantity) VALUES (?,?,?,?,?,?)";
            $pstm = $con->prepare($query);
            $pstm->bindParam(1,$this->image, PDO::PARAM_LOB);
            $pstm->bindValue(2,$this->customerName);
            $pstm->bindValue(3,$this->email);
            $pstm->bindValue(4,$this->deliveryAddress);
            $pstm->bindValue(5,$this->size);
            $pstm->bindValue(6,$this->quantity);
            $pstm->execute();

           return ($pstm->rowCount()>0); 
                
            
           
          

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    

}