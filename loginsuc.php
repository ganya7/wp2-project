<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>Succesfully login</p>
	<button type="button"><a href="logout.php">Logout</a> </button>
	<?php
	print_r($_SESSION);
	$email = $_SESSION["email"];
	$pass = $_SESSION["password"];
	echo "<script>console.log('$email')</script>";
	echo "<script>console.log('$pass')</script>";
	?>
</body>
</html>