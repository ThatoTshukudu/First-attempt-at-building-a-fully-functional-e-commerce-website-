<?php

include "DbConnect.php";
$adID = $_POST['adID'];

$qry="delete from ad where adID='$adID'";
mysqli_query($conn,$qry);
?>