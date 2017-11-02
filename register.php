<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">

	<?php
	$fname = $lname = $g = $email = $pass = $contact = "";
	$fnameE = $lnameE = $emailE = $passE = $numE = "";
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$link=$_SERVER["PHP_SELF"];
		$fname=$_SESSION["fname"]=$_POST["fname"];
		$lname=$_SESSION["lname"]=$_POST["lname"];
		$email=$_SESSION["email"]=$_POST["email"];
		$pass=$_SESSION["pass"]=$_POST["pass"];
		$contact=$_SESSION["contact"]=$_POST["contact"];

		if (empty($fname)) {
			$fnameE= "First Name is required";
		} else if(!preg_match("/^[a-zA-Z ]*$/",$fname)){ 
			$fnameE = "Only letters and white space allowed"; 
		}
		else {
			$fname = test_input($fname);}


			if (empty($lname)) {
				$lnameE= "Last Name is required";

			} else if (!preg_match("/^[a-zA-Z ]*$/",$lname)){
				$lnameE = "Only letters and white space allowed";
			} 
			else {
				$lname = test_input($lname);}


				if (empty($email)) {
					$emailE = "Email is required";
				} else {
					$email = test_input($email);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
						$emailE = "Invalid email format"; 
				}

				if (empty($pass)) {
					$passE = "Password is required";
				} else if (!preg_match("/^[a-zA-Z]+\d*$/",$pass)){ 
					$passE ="Password should contain characters and numbers";}
					else {
						$pass = test_input($pass);
					}

					if (empty($contact)) {
						$numE = "Phone Number is required";
					} else if (strlen($contact)<10 || strlen($contact)>10){
						$numE = "Only 10 numbers allowed"; }

						else {
							$contact = test_input($contact);
						} 

						if($fnameE=="" && $lnameE=="" && $emailE=="" && $passE=="" && $numE=="")
						{
							$con=mysqli_connect("localhost","root","","login");
							if($con)
							{
								echo "Database connected";
							}
							else
							{
								echo "Connection unsuccessfully";
							}
							$sql = "insert into login(fname,lname,phone,email,password) values ('$fname','$lname','$contact','$email','$pass');";

							$result= mysqli_query($con,$sql);

							if($result)
							{

								
								echo "<script>console.log('Data added successfully')</script>";
								//header("Location: http://localhost/1514119/login.php"); /* Redirect browser */
								header("Location: login.php");
								exit();


							}

							else

						/*	{
								?>
								<br>
								<h2><u>INVALID REGISTRATION </u></h2><br>
								REGISTER AGAIN
								<?php 
							}*/
							{
								echo "<br><h2>Invalid registration. Please try again</h2>";
							}

						} 

					}
					?>

					<style type="text/css">

					h2{
						font-size: 35px;
						color: #2E6280;
					}

					body{

						background-color: #2E6280; 
					}

					span{
						color: red;

					}

				</style>
			</head>
			<body>

				<div class="container" style="left:40%;margin-top:60px; border: 3px solid black;background-color:white;  width: 30%;">

					<h2><center>Register Form</center></h2>
					<form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 



						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix" style="font-size:30px">account_circle</i>
								<input id="icon_prefix" name="fname" type="text" class="validate">
								<label for="icon_prefix">First Name</label>
								<span><?php echo $fnameE;?></span>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input id="icon_prefix" name="lname" type="text" class="validate">
								<label for="icon_prefix">Last Name</label>
								<span><?php echo $lnameE;?></span>
							</div>

						</div>
						<div class="row">       
							<div class="input-field col s12">
								<i class="material-icons prefix" style="font-size:30px">phone</i>
								<input id="icon_telephone" name="contact" type="tel" class="validate" >
								<label for="icon_telephone">Contact</label>
								<span><?php echo $numE;?></span>
							</div>       
						</div>

						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix"  style="font-size:30px">email</i>
								<input id="icon_prefix" name="email" type="text"  class="validate">
								<label for="icon_prefix">Email</label>
								<span><?php echo $emailE;?></span>
							</div>
						</div>  

						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix"  style="font-size:30px">lock</i>
								<input id="icon_prefix" name="pass" type="password"  class="validate">
								<label for="icon_prefix">Password</label>
								<span><?php echo $passE;?></span>
							</div>
						</div>  


						<center><div class="form-group input-field">
							<input class="btn btn-default btn-success"  type="submit" name="submit" value="submit">
						</div></center>



					</form>
				</div>
			</body>
			</html>