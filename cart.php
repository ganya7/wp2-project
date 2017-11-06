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
<script type="text/javascript">
 $(document).ready(function() {
    $('select').material_select();
  });
            

</script>

<!-- !DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buy mobile</title>
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head> -->
<body style="background-color: #2E6280">
	<?php
if(empty($_SESSION)){
	header("Location: login.php");
	exit();
}
$email = $_SESSION["email"];
$pass = $_SESSION["password"];
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
		header("Location: price.php");
		exit();
	}
	else{
		echo "Stock not available. Please try again";
	}

}
?>


	<div class="container" style="left:40%;margin-top:60px; border: 3px solid black;background-color:white;  width: 30%;">

	<h2><center>Purchase</center></h2>
	<form class="col s12"  method="post" action="price.php"> 



	<!-- <div class="input-field col s12">
	    <select name="brand" id="brand">
	      <option>Choose your option</option>
	      <option value="Samsung">Samsung</option>
	      <option value="Apple">Apple</option>
	      <option value="OnePlus">OnePlus</option>
	      <option value="HTC">HTC</option>
	    </select>
	    <label>Brand</label>
	  </div><br>
	
	 -->
    <div class="input-field col s12">
    <select name="model" id="model">
    <option value="" disabled selected>Choose your option</option>
      <optgroup label="Samsung">
        <option value="Samsung Galaxy S8">Samsung Galaxy S8</option>
        <option value="Samsung Galaxy S8+">Samsung Galaxy S8+</option>
      </optgroup>
      <optgroup label="Apple">
        <option value="Iphone 7">Iphone 7</option>
        <option value="Iphone X">Iphone X</option>
      </optgroup>
       <optgroup label="OnePlus">
        <option value="OnePlus 5">OnePlus 5</option>
        <option value="OnePlus 5T">OnePlus 5T</option>
      </optgroup>
       <optgroup label="HTC">
        <option value="HTC U11+">HTC U11+</option>
        <option value="HTC U11 Life">HTC U11 Life</option>
      </optgroup>
    </select>
    <label>Model</label>
  </div><br>

   <div class="input-field col s6">
    <select name="color" id="color">
      <option value="" disabled selected>Choose your option</option>
      <option value="Ash">Ash</option>
      <option value="White Smoke">White Smoke</option>
      <option value="Gold">Gold</option>
    </select>
    <label>Color</label>
  </div> <br>

  <div class="input-field col s6">
    <select name="ram" id="RAM">
      <option value="" disabled selected>Choose your option</option>
      <option value="3GB">3GB</option>
      <option value="4GB">4GB</option>
    </select>
    <label>RAM</label>
  </div> <br>

  <div class="input-field col s6">
    <select name="storage" id="storage">
      <option value="" disabled selected>Choose your option</option>
      <option value="64GB">64 GB</option>
      <option value="128GB">128 GB</option>
    </select>
    <label>Storage</label>
  </div>
	
	

			<center><div class="form-group input-field">
			<input class="btn btn-default btn-success" id="submit" type="submit" value="Get Price">
			</div></center>

	</form>

<!-- 
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
 -->

</body>
</html>
