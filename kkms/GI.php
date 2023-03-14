<!DOCTYPE html>
	<?php include 'dbConn.php'; ?> <!-- including database connection -->
<style>* {
	-webkit-transition-property: all;
	-webkit-transition-duration: .2s;
  -moz-transition-timing-function: cubic-bezier(100,50,21,6);
	-moz-transition-property: all;
  -moz-transition-timing-function: cubic-bezier(100,50,21,6);
}

body{
  padding:75px;
  text-align:center;
  font-family: 'Oswald', sans-serif;
}

h1{
  color:black;
  font-weight:100;
}

.btn{
  color:white;
  background:black;
  padding:10px 20px;
  font-size:12px;
  text-decoration:none;
  letter-spacing:2px;
  text-transform:uppercase;
}

.btn:hover{
  border:none;
  background:rgba(0, 0, 0, 0.4);
  background:#fff;
  padding:20px 20px; #000;
  color:#1b1b1b;
}

.footer{
  font-size:8px;
  color:#fff;
  clear:both;
  display:block;
  letter-spacing:5px;
  border:1px solid #fff;
  padding:5px;
  text-decoration:none;
  width:210px;
  margin:auto;
  margin-top:400px;
}
 button, input {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background: #3e3e3e;
  border-radius: 15px;
}

.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
  z-index: -1;
}

.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: #4d4d4f;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.screen-header-left {
  margin-right: auto;
}

.screen-header-button {
  display: inline-block;
  width: 8px;
  height: 8px;
  margin-right: 3px;
  border-radius: 8px;
  background: white;
}

.screen-header-button.close {
  background: #ed1c6f;
}

.screen-header-button.maximize {
  background: #e8e925;
}

.screen-header-button.minimize {
  background: #74c54f;
}

.screen-header-right {
  display: flex;
}

.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #285EA4;
  font-size: 26px;
}



.app-contact {
  margin-top: auto;
  font-size: 12px;
  color: white;
}

.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.message {
  margin-top: 40px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: #666;
}

.app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: none;
  border: none;
  color: #285EA4;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.app-form-button:hover {
  color: orange;
}
.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}

@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }

  .screen-body-item.left {
    margin-bottom: 30px;
  }

  .app-title {
    flex-direction: row;
  }

  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}
</style>

<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<header>
<img style="position:fixed; top:0; left:0;"src="images/image.png" width="200" height="200">
    
    <div  style=" padding-left:30%">
    <a href="home.php" class="btn">Home</a>
    <a href="about.php" class="btn">About Us</a>
    <a href="donate.php" class="btn">Donate</a>
    <a style="background:#285EA4;color:white;"  href="GI.php" class="btn">Get Invovled</a>
	<a href="login.php" class="btn">Sign Out</a>
	</div>
</header>
<?php
 
  // If send button is clicked ...
  if (isset($_POST['submit'])) {
	 $name = $_POST['Gname'];
	 $email = $_POST['Gemail'];
	 $myMessage = $_POST['myMessage'];
	 $number = $_POST['Gnumber'];
 
        // Get all the submitted data from the form
        $sql = "INSERT INTO message (name, email, phoneNumber, message) 
		VALUES ('$name', '$email', '$number', '$myMessage')";
 
        // Execute query
        mysqli_query($conn, $sql);
         
		  // Execute query
        mysqli_query($conn, $sql);
         echo '<script>alert("Your Message Has Been Sent.")</script>';
  }

?>
<body>
<div style="padding-top:5%">
<h1 >Get Invovled</h1>
<p>We'll be happy to hear from you! Fill out the form below and we will get back to you.</p>
<p>Make sure to check your email.</p>
<div>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO: <br>+27 81 216 4574<br>EMAIL: kkm@kindlekinghtmovement.com</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
		  <form method="POST" enctype="multipart/form-data" action="">
            <div class="app-form-group">
              <input class="app-form-control" name="Gname" placeholder="NAME">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" name="Gemail" placeholder="EMAIL">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" name="Gnumber" placeholder="CONTACT NO">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" name="myMessage" placeholder="MESSAGE">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCEL</button>
              <button type="submit" name="submit" class="app-form-button">SEND</button>
            </div>
			</form>
          </div>
        </div>
      </div>
    </div>

</div>
<style>
a {
  color: #fff;
  text-decoration: none;
}

.social {
  position: fixed;
  top: 200px;
}
.social ul {
  padding: 0px;
  transform: translate(1000px, 0);
}
.social ul li {
  display: block;
  margin: 5px;
  background: rgba(0, 0, 0, 0.36);
  width: 300px;
  text-align: left;
  padding: 10px;
  border-radius: 0 30px 30px 0;
  transition: all 1s;
}
.social ul li:hover {
  transform: translate(-110px, 0);
  background: rgba(255, 255, 255, 0.4);
}
.social ul li:hover a {
  color: #000;
}
.social ul li:hover i {
  color: #fff;
  background: rgba(0, 0, 0, 0.36);
  transform: rotate(360deg);
  transition: all 1s;
}
.social ul li i {
  margin-left: 10px;
  color: #000;
  background: #fff;
  padding: 10px;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  font-size: 20px;
  background: #ffffff;
  transform: rotate(0deg);
}</style>
  
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<nav class="social">
  
 
          <ul>
              <li><a href="https://www.youtube.com/channel/UCu_DprZI2_Vj-cqql6W527w">YouTube<i class="fa fa-youtube"></i></a></li>
            <li><a href="https://www.instagram.com/kindle_knight_movement/?igshid=YmMyMTA2M2Y%3D">Instagram <i class="fa fa-instagram"></i></a></li>
            <li><a href="https://m.facebook.com/kindleknightInternationalFoundation/videos/">Facebook<i class="fa fa-facebook"></i></a></li>
              </ul>
      </nav>
<body>
    
	