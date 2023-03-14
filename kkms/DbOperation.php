<?php
  
class DbOperation
{
    
    private $con;
 
    
    function __construct()
    {
         require_once dirname(__FILE__) . '/dbCon.php';
 
 

        $db = new dbCon();
 

        $this->con = $db->connect();
    }
 

 function createDonation($name, $amount){
 $stmt = $this->con->prepare("INSERT INTO donation (name, amount) VALUES (?, ?)");
 $stmt->bind_param("ss", $name, $amount);
 if($stmt->execute())
 return true; 
 return false; 
 }
 

 function deleteDonation($donationID){
 $stmt = $this->con->prepare("DELETE FROM donation WHERE donationID = ? ");
 $stmt->bind_param("i", $donationID);
 if($stmt->execute())
 return true; 
 
 return false; 
 }
}