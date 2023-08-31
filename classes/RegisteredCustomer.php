<?php
require './classes/DbConnector.php';
use classes\DbConnector;


class RegisteredCustomer
{
    private $customerId;
    private $name;
    private $email;
    private $contactNumber;
    private $address;
    private $gender;
    private $username;
    private $password;

    public function __construct($name, $email, $contactNumber, $address, $gender, $username, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->contactNumber = $contactNumber;
        $this->address = $address;
        $this->gender = $gender;
        $this->username = $username;
        $this->password = $password;
    }

    public function register($name, $email, $contactNumber, $address, $gender, $username, $password)
    {
        
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'SELECT * FROM registeredcustomer WHERE username = ?';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1,$username);
        $pstmt->execute();

        if ($pstmt->rowCount() == 0) {
            $adminId = 1;
            $query = "INSERT INTO registeredcustomer (name, email, contactNumber, address, gender, username, password, adminId) 
                    VALUES (?,?,?,?,?,?,?,?)";
            
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1,$name);
                $pstmt->bindValue(2,$email);
                $pstmt->bindValue(3,$contactNumber);
                $pstmt->bindValue(4,$address);
                $pstmt->bindValue(5,$gender);
                $pstmt->bindValue(6,$username);
                $pstmt->bindValue(7,$password);
                $pstmt->bindValue(8,$adminId);

                $pstmt->execute();
                if ($pstmt) {
                    return 1; // Registration success
                }else{
                    return 2; 
                }
            
        } else {
            
            return 3;
            
        }
    }

    public function login($username, $password)
    {

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = "select * from registeredcustomer where username = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1,$username);
        $pstmt->execute();
        if ($pstmt->rowCount() > 0) {
            $getRow = $pstmt->fetch(PDO::FETCH_ASSOC);

            if ($password === $getRow['password']) {
                return true;
            } else {
                $errors[] = "Incorrect Username or Password";
            }
        } else {
            $errors[] = "Incorrect Username or Password";
        }
    }

    public function getCustomerId(){
        
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'SELECT customerId FROM registeredcustomer WHERE username = ?';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1,$this->username);
        $pstmt->execute();
        $result=$pstmt->fetch(PDO::FETCH_OBJ);

        return $result->customerId;

    }
}
