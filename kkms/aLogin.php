<?php 
header('Content-type: application/json');
include_once('connect.php');
$response=array();

if ( isset($_REQUEST['username']) & isset($_REQUEST['password']) ){

  $username = $_REQUEST['username'];
  $password = md5( $_REQUEST['password'] ); 
    
  $stmt = $conn->prepare("SELECT * FROM `users`  WHERE username='$username' AND  password = '$password'  ");  
  
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_OBJ); 
      $row = $stmt->fetch();

      if($row->id != ""){

        $response['id']= $row->id;
        $response['username']= $row->username;
    
        $response["success"] = 1;
        $response["message"] = "Logged in successfully";
        
      }else{
        $response["success"] = 0;
        $response["message"] = "Invalid username or password"; 
      }
  
}else{    
    $response["success"] = 0;
    $response["message"] = "Required parameters are missing";
}
echo json_encode($response);

?>