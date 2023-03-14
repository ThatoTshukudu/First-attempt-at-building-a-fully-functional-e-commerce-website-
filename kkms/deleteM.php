<?php

include "DbConnect.php";
$messageID = $_POST['messageID'];

$qry="delete from message where messageID='$messageID'";
mysqli_query($conn,$qry);
?>