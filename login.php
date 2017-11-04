<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">


	<style type="text/css">

	h2{
		font-size: 35px;
		color: #2E6280;
	}

	body{

		background-color: #2E6280; 
	}

</style>

<?php

function checklogin(){
	if(empty($_SESSION["email"]) && empty($_SESSION["password"]))
		echo "<script>console.log('Cannot login')</script>";
	else{
		header("Location: loginsuc.php");
		exit();
	}
}

if(isset($_POST["submit"])){
	$email=$pass="";
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$con=mysqli_connect("localhost","root","","login");
	$sql = "select * from login where email='$email' and password='$pass'";
	if($con)
		echo "<script>console.log('Database connected')</script>";
	else
		echo "<script>console.log('Unable to connect to database')</script>";

	if(isset($email) && isset($pass)){
		$result = mysqli_query($con, $sql);
		$num_rows = mysqli_num_rows($result);
		if($num_rows > 0){
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["password"] = $_POST["pass"];
		}
		else{
			echo "<script>console.log('cannot login')</script>";
			header("Location: register.php");
			exit();
		}
    }//isset email and password
  }//isset submit
  checklogin();
?>

</head>

<body>

	<div class="container" style="left:40%;margin-top:60px; border: 3px solid black;background-color:white;  width: 30%;">

		<h2><center><u>Login Form</u></center></h2>
		<form class="col s12" action="#" method="post">           
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix"  style="font-size:30px">email</i>
					<input id="icon_prefix" name="email" type="text"  class="validate">
					<label for="icon_prefix">Email</label>
					<!-- <span><?php echo $emailE;?></span>-->
				</div>
			</div>  


			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix"  style="font-size:30px">lock</i>
					<input id="icon_prefix" name="pass" type="password"  class="validate">
					<label for="icon_prefix">Password</label>
					<!--<span><?php echo $passE;?></span>-->
				</div>
			</div>  


			<center><div class="form-group input-field">
				<input class="btn btn-default btn-success"  type="submit" name="submit" value="submit">
			</div></center><br>

			<center><b><u><a href="register.php">Click Here to Register</a></u></b> </center>



		</form>
	</div>

</body>
</html>