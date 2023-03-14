<!DOCTYPE html>

<?php
$servername = "localhost:3306";
$username = "root";

// Create connection
$conn = mysqli_connect($servername, $username,'','kkmdb');

// Check connection
if (!$conn) {
   echo 'error' . mysqli_connect_error();
}
else{
    //connection successful
}
?>