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
 $stmt = $conn->prepare("SELECT messageID, name, email, phoneNumber, message FROM message;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($messageID, $name, $email, $phoneNumber, $message);
 
 $messages = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['messageID'] = $messageID; 
 $temp['name'] = $name; 
 $temp['email'] = $email; 
 $temp['phoneNumber'] = $phoneNumber; 
 $temp['message'] = $message; 
 array_push($messages, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($messages);