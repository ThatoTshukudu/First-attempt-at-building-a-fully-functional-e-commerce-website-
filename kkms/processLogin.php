<!DOCTYPE html>
<html lang="en"> 
<?php include 'dbConn.php';?>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: orange;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: organge;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

</style>

<body> 
   <?php
       // storing inputs
	   $Username = $_REQUEST['Lusername'];
	   $Password = $_REQUEST['Lpassword'];
   
       // hashing password entered so it can be compared to the one in the database 
	   $hashed_Password = hash('md5', $Password);
	   $pass = $hashed_Password;
 
	   // selecting password from user table where hashed password matches password enter which is converted to a hash
	   $sql = mysqli_query($conn, "SELECT password FROM user WHERE password = '$pass'");
	   // selecting username from user table where usersname macthes username entered 
	   $sqlUsername = mysqli_query($conn, "SELECT username FROM user WHERE username = '$Username'");
	   // selecting all data from users table where username entered matches username in database 
	   $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$Username'");
	   
		   // if password entered is not equal to password in database echo incorrect password and redisplay form 
		   if(!mysqli_num_rows($sql) > 0){
			   echo '<p style = "color:red; text-align: left; font-size: 20px; background-color: black" >
			   Password is incorrect</p>';
			   echo '<div style="color:red">Incorrect Password</div>';
			   redisplayForm($Username, $Password);
			  
		   }
		    // else if username entered is not equal to username in database echo incorrect password and redisplay form 
		   else if(!mysqli_num_rows($sqlUsername) > 0){
			    echo '<p style = "color:red; text-align: left; font-size: 20px; background-color: black" >
			   Username is incorrect</p>';
			   echo '<div style="color:red">Incorrect Username</div>';
			   redisplayForm($Username, $Password);
		   }
		   else{
				  echo "<script>window.location.href='home.php'</script>";
		   }
		   
		 // function to redisplay from   
		function redisplayForm($Username, $Password) {
	  
?>

	<h2> WELCOME TO KKM LOGIN PAGE</h2>

<div class="container" id="container">

	<div class="form-container sign-in-container">
		<form action="processLogin.php" method="post">
			<h1>Sign in</h1>
			<input type="text" placeholder="Username" name="Lusername" value="<?php echo  $Username; ?>" required />
			<input type="password" placeholder="Password" name="Lpassword" value="<?php echo  $Password; ?>" required />
			
			<button style="background-color:orange;color:black">Sign In</button>
			
		</form>
	</div>
	<div class="overlay-container">
		<div  style="background-color:black;"class="overlay">
			<div class="overlay-panel overlay-right">
			<img src="images/kkm.png" width="200" height="200">
				<h1 style="color:orange">Hello, Friend!</h1>
				<p style="color:orange">Enter your personal details and start journey with us</p>
				<a href="signup.php"> 
				<button style="background-color:white;color:black" class="ghost" id="signUp">Sign Up</button>
				</a>
			</div>
		</div>
	</div>

</div>
<?php
	}

   ?>
   
	</body>
</html>