<?php 

 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'kkmdb');
 
 
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT donationID, name, amount FROM donation;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($donationID, $name, $amount);
 
 $donations = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['donationID'] = $donationID; 
 $temp['name'] = $name; 
 $temp['amount'] = $amount;  
 array_push($donations, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($donations);