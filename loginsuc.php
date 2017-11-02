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
	<button type="button" onclick="load()">Logout</button>
	<?php
	//echo "<p>$_SESSION['email']</p>";
	print_r($_SESSION);
	//echo "<script>console.log('$_SESSION["email"]')</script>";
	//echo "<script>console.log('$_SESSION["password"]')</script>";
	?>
	<script type="text/javascript">
		function load(){
			<?php
			session_unset();
			session_destroy();
			?>
		}
	</script>
</body>
</html>