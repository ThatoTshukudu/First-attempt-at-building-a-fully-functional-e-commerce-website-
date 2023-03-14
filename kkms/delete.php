<?php

include "DbConnect.php";
$donationID = $_POST['donationID'];

$qry="delete from donation where donationID='$donationID'";
mysqli_query($conn,$qry);
?>