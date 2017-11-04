<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy mobile</title>
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
	<form method="post" action="#">
		Brand:
		<select name="brand" id="brand">
			<option >Select brand</option>
			<option value="samsung">Samsung</option>
			<option value="apple">Apple</option>
			<option value="oneplus">Oneplus</option>
			<option value="htc">Htc</option>
		</select>
		<br>
		Model:
		<select name="model" id="model">
			<option>Select a model</option>
		</select>
		<br>
		Color:
		<select name="color" id="color">
			<option>Select color</option>
			<option value="ash">Ash</option>
			<option value="whitesmoke">White Smoke</option>
		</select><br>
		Storage:
		<select name="storage" id="storage">
			<option>Select storage</option>
			<option value="64gb">64 GB</option>
			<option value="128gb">128 GB</option>
		</select><br>
		Price: 
		<span id="price" name="price"></span><br>
		<input type="submit" id="submit" name="buy"><br>

	</form>
	<?php

	$mobileJSON = '[
		{"brand": "samsung",
	"model": ["s8","note8"],
	"storage": ["64GB","128GB"],
	"price": [50000,60000]},

	{"brand": "apple",
	"model": ["6","7+"],
	"storage": ["64GB","128GB"],
	"price": [70000,80000]},
	
	{"brand": "oneplus",
	"model": ["3","5"],
	"storage": ["64GB","128GB"],
	"price": [30000,40000]},
	
	{"brand": "htc",
	"model": "u11",
	"storage": ["64GB","128GB"],
	"price": [40000,50000]}

]';

$somearray = json_decode($mobileJSON, true); //print_r($somearray);
echo $somearray[0]["price"][0];

	?>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#brand").change(function(){
				 var val = $(this).val();
				if (val == "samsung") {
            $("#model").html("<option value='s8'>Galaxy S8</option><option value='note8'>Note 8</option>");
        } else if (val == "apple") {
            $("#model").html("<option value='6'>iPhone 6</option><option value='7+'>iPhone 7 Plus</option>");
        } else if (val == "oneplus") {
            $("#model").html("<option value='3'>Oneplus Two</option><option value='5'>Oneplus Five</option>");
        } else if (val == "htc") {
            $("#model").html("<option value='u11'>U11</option>");
        }
			});
			
			$("#storage").change(function(){
				// document.getElementById("price").innerHTML = "<?php $somearray[0]["price"][0] ?>";
				document.getElementById("price").innerHTML = "hello";
			}); //end of change
		}); //end of ready*/
	</script>

	<?php
if(empty($_SESSION)){
	header("Location: login.php");
	exit();
}
$email = $_SESSION["email"];
$pass = $_SESSION["password"];
echo $email;
$con = mysqli_connect("localhost","root","","mobile");
if($con)
	echo "<script>console.log('Database connected')</script>";
else
	echo "<script>console.log('Unable to connect to database')</script>";

if(isset($_POST["buy"])){
	echo $_POST["model"];
	$sql = "select available from stock where model='".$_POST["model"]."'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	echo "no of rows: ".$row["available"];
	if($row["available"] > 0){
		$_SESSION["brand"] = $_POST["brand"];
		$_SESSION["model"] = $_POST["model"];
		$_SESSION["color"] = $_POST["color"];
		$_SESSION["storage"] = $_POST["storage"];
		//$_SESSION["price"] = $_POST["price"];
		header("Location: summary.php");
		exit();
	}

}
?>
</body>
</html>
