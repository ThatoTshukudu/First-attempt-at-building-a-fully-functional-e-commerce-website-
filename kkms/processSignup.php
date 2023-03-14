<!DOCTYPE html>
<?php include 'dbConn.php';?>
<html lang="en">
	<head>
		<title>Process sign up page</title>
	

    <style media="screen">
          *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: black;
}
.background{
	
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #ff512f,
        #f09819
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}


label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 40px;
    width: 100%;
    background-color: #FFFFFF;
	color: #000000;
	font: bold;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}

 </style>
	</head>
<?php
   // storing register details
   $username = $_POST['Susername'];
   $email = $_POST['Semail'];
   $password = $_POST['Spassword'];
   
   //hashing password 
   $hashed_Password = hash('md5', $password);
   $Rpass = $hashed_Password;
   
   //inserting values 
   $qry = "insert into user (username, email, password)
   values('$username','$email','$Rpass')";
	mysqli_query($conn, $qry);

				
?>
	
     
    <body>
	   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
	<img src="images/kkm.png" width="200" height="200">
	<div>
	   <!--Displaying success messsage-->
	   <h3 style = " position: absolute;top: 50%; left: 45%;color:white"> 
		SUCCESS!</h3> <br><br>
		<h3 style = " position: absolute;top: 55%; left: 40%;color:white"> 
		YOU CAN NOW LOGIN</h3><br>
		<h1><a style= "color: orange; position: absolute;top: 60%; left: 45%;" href="login.php">
		<strong>LOGIN</strong></a></h1>
	</div>
	</body>
	
	</html>