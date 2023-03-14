<?php 
 
 
 require_once 'DbOperation2.php';
 

 function isTheseParametersAvailable($params){

 $available = true; 
 $missingparams = ""; 
 
 foreach($params as $param){
 if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
 $available = false; 
 $missingparams = $missingparams . ", " . $param; 
 }
 }
 
 
 if(!$available){
 $response = array(); 
 $response['error'] = true; 
 $response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
 

 echo json_encode($response);
 
 
 die();
 }
 }
 

 $response = array();
 

 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 

 case 'createad':

 isTheseParametersAvailable(array('name','details','date'));
 

 $db = new DbOperation();
 

 $result = $db->createDonation(
 $_POST['name'],
 $_POST['details'],
 $_POST['date']
 );
 

 if($result){

 $response['error'] = false; 

 $response['message'] = 'Event added successfully';
 
 }else{

 $response['error'] = true; 
 
 $response['message'] = 'Some error occurred please try again';
 }
 
 break; 
 
 
 case 'deletead':
 
 
 if(isset($_GET['adID'])){
 $db = new DbOperation();
 if($db->deleteDonation($_GET['adID'])){
 $response['error'] = false; 
 $response['message'] = 'Event deleted successfully';
 }else{
 $response['error'] = true; 
 $response['message'] = 'Some error occurred please try again';
 }
 }else{
 $response['error'] = true; 
 $response['message'] = 'Nothing to delete, provide an id please';
 }
 break; 
 }
 
 }else{

 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }
 

 echo json_encode($response);