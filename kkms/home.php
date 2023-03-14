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
}</style>

<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<header >
<img style="position:fixed; top:0; left:0;"src="images/image.png" width="200" height="200">
    
    <div  style="position:fixed; padding-left:30%;">
    <a style="background:#285EA4;color:white;"href="home.php" class="btn">Home</a>
    <a href="about.php" class="btn">About Us</a>
    <a href="donate.php" class="btn">Donate</a>
    <a href="GI.php" class="btn">Get Invovled</a>
	<a href="login.php" class="btn">Sign Out</a>
	</div>
</header>

<body>
<div style="padding-top:5%">
<h1 >HOME OF <br> KKM Upcoming Events</h1>
<div>

<h2 style="float:left"></h2>
<br><br><br><br>


<?php 
$result = mysqli_query($conn,"SELECT * FROM ad");

while($row = mysqli_fetch_assoc($result)){
    echo "<div>
	<div >". "<strong>"."NAME: ". "</strong>".$row['name']."</div>
	<div >"."<strong>"."DETAILS: ". "</strong>".$row['details']."</div>
	<div>". "<strong>"."DATE: ". "</strong>".$row['date']."</div>
	 </div>
	<br><br><br>";
}
		
mysqli_close($conn);
?>


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
  color: black;
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
<footer  style="background-image:url('images/b.jpg');background-size: 50%;  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;">KKM</footer>
    
    