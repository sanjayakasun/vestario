<?php 

// require 'DbConnector.php';
// use PDO;
 class Review{
    private $reviewId;
    private $rate;
    private $comment;

    public function __construct($rate,$comment){
        $this->rate=$rate;
        $this->comment=$comment;
    }

    public function displayReview() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM review";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        
        return $pstmt;
    }

    public function getdetails(){
        //
    }
 }