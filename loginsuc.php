<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta charset="UTF-8">
	<title>LoginSuccessful</title>
	</head>
	<body  style="background-color: #2E6280 ; color:black">
	<div class="container" style="left:40%;margin-top:60px; border: 1px solid black;background-color:white;  width: 30%;">
	<h1><b><center><u>Login Succcessfull</u></center></b></h1><br>

	<h4><u>Check out our latest review on Samsung Galaxy S8<u></h4>
	<div align="center" class="embed-responsive embed-responsive-16by9">
    <video autoplay loop class="embed-responsive-item" alt="S8 review video">
        <source src="s8.mp4" type="video/mp4">
    </video>

   </div>   <br>

				
				<center><div class="form-group input-field">
				<input class="btn btn-default btn-success" onclick="window.location.href='cart.php'" id="submit" type="submit" value="Go To Cart">
				</div></center>
				<center><div class="form-group input-field">
				<input class="btn btn-default btn-success" onclick="window.location.href='logout.php'" id="submit" type="submit" value="Logout">
				</div></center>
	
</body>
</html>