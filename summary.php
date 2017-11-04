<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order summary</title>
</head>
<body>
	<?php 
	$con=mysqli_connect("localhost","root","","login");
	$email = $_SESSION["email"];
	$pass = $_SESSION["password"];

	$sql = "select * from login where email='$email' and password='$pass'";
	if($con)
		echo "<script>console.log('Database connected')</script>";
	else
		echo "<script>console.log('Unable to connect to database')</script>";
	$result = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "Name: ".$row["fname"]." ".$row["lname"]."<br>";
		echo "Email: ".$row["email"]."<br>";
		echo "Contact number: ".$row["phone"]."<br>";
		echo "Brand: ".$_SESSION["brand"]."<br>";
		echo "Model: ".$_SESSION["model"]."<br>";
		echo "Color: ".$_SESSION["color"]."<br>";
		echo "Storage: ".$_SESSION["storage"]."<br>";
		echo "Price: ".$_SESSION["price"]."<br>";
	}
	?>
</body>
</html>