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
 $stmt = $conn->prepare("SELECT adID, name, details, date FROM ad;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($adID, $name, $details, $date);
 
 $ads = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['adID'] = $adID; 
 $temp['name'] = $name; 
 $temp['details'] = $details;
 $temp['date'] = $date;   
 array_push($ads, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($ads);