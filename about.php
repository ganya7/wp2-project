<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

*{
	z-index: 1;
}
header{
	padding: 1em;
    color: white;
    text-align: left;

}


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    clear: both;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 15px 99px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

.container{
  height:auto;
  background-color:white;
  margin-top:0px;
  clear:both;
  position: relative;
}

footer {
position:fixed;
background-color: black;
color:white;
width: 100%; 
bottom:0px;
margin: 15px auto;
text-align: center;
clear: both;
 }
 footer:hover{
opacity:0.2;
 }
 .block{
  height:20px;
  width:100%;
  background-color: darkred;
  clear: both;
}
#id3{
  font-family:Times New Roman;
  margin-left: 200px;
  color: red;
  font-size: 30px;
  font-weight: bold;
  margin-bottom: 0px;
  padding:3.4%;
  text-shadow: 0 0 3px black;
}
#id4{
  padding:3.4%;
}
#about{
  height:750px;
  width:70%;
  margin-left: 16%;
  background-color: lightgrey;
  border:1px solid red;
  cursor: pointer;
}
#error{
  color:red;
}
h1,h2{
  background-color: red;
  color: white;
}
</style>

<?php 
// define variables and set to empty values

$name=$email=$comments="";
$nameE=$emailE=$commentsE="";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$link=$_SERVER["PHP_SELF"];
$name=$_POST["name"];
$email=$_POST["email"];
$comments=$_POST["comments"];

 if (empty($name)) {
    $nameE= "First Name is required";
  } else if(!preg_match("/^[a-zA-Z ]*$/",$name)){ 
      $nameE = "Only letters and white space allowed"; 
  }
    else {
    $name = test_input($name);}
  

  if (empty($email)) {
    $emailE = "Email is required";
  } else {
    $email = test_input($email);
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      $emailE = "Invalid email format"; 
  }

  
    if (empty($comments)) {
    $commentsE = "Specify your queries";
  } 
   else {
    $comments = test_input($comments);
  } 




if($nameE=="" && $emailE=="" && $commentsE=="")
{
    $db=mysqli_connect("localhost","root","","wp2project");
    if($db)
    {
      echo "Database connected";
    }
    else
    {
      echo "Connection unsuccessfully";
    }
$order= "insert into queries values('$name','$email','$comments');";

$result= mysqli_query($db,$order);

if($result)
{

  header("Location: about.php"); /* Redirect browser */
    exit();
  
  
}



} 

}
 ?>
</head>
<body>
 <div class="container" style="margin:0px;padding:0px;">
  <img src="logos1.png" height="135px" width="12%" align="left">
   <a target="_blank" title="Follow us on Twitter" href="http://www.twitter.com/PLACEHOLDER">
  <img id="id4"alt="Follow us on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" align="right"></a>
  <a target="_blank" title="Follow us on Youtube" href="http://www.youtube.com/PLACEHOLDER">
  <img id="id4" alt="Follow us on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png" align="right"></a>
  <a target="_blank" title="Follow us on Instagram" href="http://www.instagram.com/PLACEHOLDER">
  <img id="id4"alt="Follow us on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" align="right"></a>
  <a target="_blank" title="Follow us on Google Plus" href="https://plus.google.com/PLACEHOLDER">
  <img id="id4"alt="Follow us on Google Plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus30x30.png" align="right"></a>
  <a target="_blank" title="Follow us on Facebook" href="http://www.facebook.com/PLACEHOLDER">
  <img id="id4"alt="Follow us on Facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" align="right"></a>

  <p id="id3">Mobile Reviews,News,Updates And More</p>
  </div>
<div class="block"></div>
<nav>
<ul>
   <li><a  href="mobarena.html">Home</a></li>
  <li><a href="news.html">News</a></li>
  <li><a href="reviews.html">Reviews</a></li>
  <li><a href="top10.html">Top 10</a></li>
  <li><a href="login.php">Login/Register</a></li>
    <li><a href="about.php">About</a></li>
</ul>
</ul>
</nav>
</header><br><br>
<div id="about">
  <h1>About Us</h1>
  <p>We're a group of dedicated mobile technology maniacs who've been working with consumer mobile gadgets since the days of the Apple Newton.</p> 
  <p>This website will guide you towards specifications of different smartphones.</p>
  <p>While the most expensive units offer the most features, we understand that our readers have all sorts of budgets and hence we review models in all price ranges and will never tell you that you've got to buy the most expensive model out there.</p>
  <p>We also know that some of you are super-techies while others are novices, so we provide detailed reviews that are written in an accessible fashion.</p>
  <p>We deliver the latest news from the world of cell phones on a daily basis. An average of 10 news are written each day.</p>
  <p>We are not owned by a parent corporation and we are not paid by any of the manufacturers whose products we review. We like it this way: it insures that our site will offer you unbiased reviews and opinions of the products you're considering purchasing. </p>
  
  <p></p>

    <h2>We Do Appreciate Your Feedback</h2>
    <p>We will be glad to hear from you if:</p>
     <p>-You have found a mistake in our phone specifications.</p>
     <p>-You have info about a phone which we don't have in our database.</p>
     <p>-You have found a broken link.</p>
     <p>-You have a suggestion for improving MobileArena.com or you want to request a feature.</p>  
    <h2>Before Sending Us An Email, Please Keep In Mind:</h2>
     <p>-We do not sell mobile phones.</p>
     <p>-We do not know the price of any mobile phone in your country.</p>
     <p>-We don't answer any "unlocking" related questions.</p>
     <p>-We don't answer any "Which mobile should I buy?" questions.</p>   
  </div>

  <div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Mumbai,Maharashtra</p>
      <p><span class="glyphicon glyphicon-phone"></span>9224005025</p>
      <p><span class="glyphicon glyphicon-envelope"></span> parththakkar43@gmail.com</p>
    </div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" >
          <span id="error"><?php echo $nameE;?></span>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" >
          <span id="error"><?php echo $emailE;?></span>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <span id="error"><?php echo $commentsE;?></span>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>

</body>
</html>