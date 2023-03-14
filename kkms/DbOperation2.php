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
 

 function createDonation($name, $details, $date){
 $stmt = $this->con->prepare("INSERT INTO ad (name, details, date) VALUES (?, ?, ?)");
 $stmt->bind_param("sss", $name, $details, $date);
 if($stmt->execute())
 return true; 
 return false; 
 }
 

 function deleteDonation($adID){
 $stmt = $this->con->prepare("DELETE FROM ad WHERE adID = ? ");
 $stmt->bind_param("i", $adID);
 if($stmt->execute())
 return true; 
 
 return false; 
 }
}