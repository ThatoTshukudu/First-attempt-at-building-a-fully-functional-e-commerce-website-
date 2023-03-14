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
.mainscreen
{
	min-height: 100vh;
	width: 100%;
	display: flex;
    flex-direction: column;
    background-color: #DFDBE5;
    background-image: url("https://wallpaperaccess.com/full/3063067.png");
    color:#963E7B;
}

.card {
	width: 60rem;
    margin: auto;
    background: white;
    position:center;
    align-self: center;
    top: 50rem;
    border-radius: 1.5rem;
    box-shadow: 4px 3px 20px #3535358c;
    display:flex;
    flex-direction: row;
    
}

.leftside {
	background: #030303;
	width: 25rem;
	display: inline-flex;
    align-items: center;
    justify-content: center;

}

.product {
    object-fit: cover;
	width: 20em;
    height: 20em;
    border-radius: 100%;
}

.rightside {
    background-color: #ffffff;
	width: 35rem;
	border-bottom-right-radius: 1.5rem;
    border-top-right-radius: 1.5rem;
    padding: 1rem 2rem 3rem 3rem;
}

p{
    display:block;
    font-size: 1.1rem;
    font-weight: 400;
    margin: .8rem 0;
}

.inputbox
{
    color:black;
	width: 100%;
    padding: 0.5rem;
    border: none;
    border-bottom: 1.5px solid #ccc;
    margin-bottom: 1rem;
    border-radius: 0.3rem;
    font-family: 'Roboto', sans-serif;
    color: #615a5a;
    font-size: 1.1rem;
    font-weight: 500;
  outline:none;
}

.expcvv {
    display:flex;
    justify-content: space-between;
    padding-top: 0.6rem;
}

.expcvv_text{
    padding-right: 1rem;
}
.expcvv_text2{
    padding:0 1rem;
}

.button{
    background: #285EA4;
    padding: 15px;
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 400;
    font-size: 1.2rem;
    margin-top: 10px;
    width:100%;
    letter-spacing: .11rem;
    outline:none;
}

.button:hover
{
	transform: scale(1.05) translateY(-3px);
    box-shadow: 3px 3px 6px #38373785;
}

@media only screen and (max-width: 1000px) {
    .card{
        flex-direction: column;
        width: auto;
      
    }

    .leftside{
        width: 100%;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
      border-top-right-radius:0;
      border-radius:0;
    }

    .rightside{
        width:auto;
        border-bottom-left-radius: 1.5rem;
        padding:0.5rem 3rem 3rem 2rem;
      border-radius:0;
    }
}
</style>

<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<header>
<img style="position:fixed; top:0; left:0;"src="images/image.png" width="200" height="200">
    
    <div  style=" padding-left:30%">
    <a href="home.php" class="btn">Home</a>
    <a href="about.php" class="btn">About Us</a>
    <a style="background:#285EA4;color:white;" href="donate.php" class="btn">Donate</a>
    <a href="GI.php" class="btn">Get Invovled</a>
	<a href="login.php" class="btn">Sign Out</a>
	</div>
</header>

<body>
<div style="padding-top:5%">
<h1 >Donate</h1>
<p style = "text-align: center">Make a differeance.<br> All donations will go
 towards goods and clothes for the needy.</p>
<div>
<?php
 
  // If send button is clicked ...
  if (isset($_POST['submit'])) {
	 $name = $_POST['name'];
	 $amount = $_POST['amount'];
 
        // Get all the submitted data from the form
        $sql = "INSERT INTO donation (name, amount) 
		VALUES ('$name', '$amount')";
 
        // Execute query
        mysqli_query($conn, $sql);
         echo '<script>alert("Thank You For Making A Donation!")</script>';
  }

?>
<div class="mainscreen">
      <div class="card">
        <div class="leftside">
          <img
            src="images/donate.jpg"
            class="product"
            alt="Shoes"
          />
        </div>
        <div class="rightside">
          <form method="POST" enctype="multipart/form-data" action="">
            <h2 style="color:#285EA4">Enter details to donate</h2>
            <p style="color:black">Cardholder Name</p>
            <input type="text" class="inputbox" name="name" required />
            <p style="color:black">Card Number</p>
            <input type="number" class="inputbox" name="card_number" id="card_number" required />

            <p style="color:black">Amount(R)</p>
			<input type="number" class="inputbox" name="amount" id="amount" required />
<div class="expcvv">


            <p class="expcvv_text" style="color:black">Expiry</p>
            <input type="date" class="inputbox" name="exp_date" id="exp_date" required />

            <p class="expcvv_text2" style="color:black">CVV</p>
            <input type="password" class="inputbox" name="cvv" id="cvv" required />
        </div>
            <p></p>
            <button type="submit" name="submit" class="button">Donate</button>
          </form>
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
    
