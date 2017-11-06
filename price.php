<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body  style="background-color: #2E6280 ; color:black">
	<div class="container" style="left:40%;margin-top:60px; border: 1px solid black;background-color:white;  width: 30%;">
	<h1 style="color:red"><b><center><u>Order Details</u></center></b></h1>
	<?php
	$model=$_POST['model'];
	$color=$_POST['color'];
	$ram=$_POST['ram'];
	$storage=$_POST['storage'];
	$price=0;
	
       
	function calculateprice($model,$color,$ram,$storage)
	{

		if ($model == "Samsung Galaxy S8") {
			if ($storage== "64GB") 
				$price = 50000;
			else
				$price = 60000;
					} //end model
					else if($model == "Samsung Galaxy S8+"){
						if ($storage == "64GB") 
							$price = 55000;
						else
							$price = 65000;
					}
					else if ($model == "Iphone 7") {
						if ($storage== "64GB") 
							$price = 60000;
						else
							$price = 70000;
					} //end model
					else if($model == "Iphone X"){
						if ($storage == "64GB") 
							$price = 70000;
						else
							$price = 80000;
					}
					else if ($model == "OnePlus 5") {
						if ($storage== "64GB") 
							$price = 30000;
						else
							$price = 35000;
					} //end model
					else if($model == "OnePlus 5T"){
						if ($storage == "64GB") 
							$price = 40000;
						else
							$price = 45000;
					}
					else if ($model=="HTC U11+") {
						if ($storage== "64GB") 
							$price = 45000;
						else
							$price = 50000;
					} //end model
					else if($model == "HTC U11 Life"){
						if ($storage == "64GB") 
							$price = 50000;
						else
							$price = 55000;
					}
					$gst=$price*0.18;
					$total=$price+$gst;
					echo "<center><table border='2' style='border-color: black;'>
					<tr><td><b>Model</b></td><td>".$model."</td></tr>
					<tr><td><b>Color</b></td><td>".$color."</td></tr>
					<tr><td><b>RAM</b></td><td>".$ram."</td></tr>
					<tr><td><b>Storage</b></td><td>".$storage."</td></tr>
					<tr><td><b>Base Price</b></td><td>Rs.".$price."</td></tr>
					<tr><td><b>GST</b></td><td>Rs.".$gst."</td></tr>
					<tr><td><b>Net Amount</b></td><td>Rs.".$total."</td></tr></table>";
					/*echo "<center><table>Model: ".$model."<br><br>";
					echo "Color: ".$color."<br><br>";
					echo "Storage: ".$storage."<br><br>";
					echo "BASE PRICE:  ".$price."<br><br>";
					echo "GST:         ".$gst."<br><br>";
					echo "TOTAL PRICE: ".$total."<br><br>";
					echo "YOUR ORDER IS CONFIRMED</center>";*/
					$con = mysqli_connect("localhost","root","","order");
					$sql = "insert into usercart values('$model','$color','$ram','$storage','$total')";
					$result = mysqli_query($con,$sql);
				}
				calculateprice($model,$color,$ram,$storage);

				?>
				<br>
				<center><div class="form-group input-field">
				<input class="btn btn-default btn-success" onclick="window.location.href='http://localhost/wp2/cart.php'" id="submit" type="submit" value="Back To Purchase">
				</div></center>
				<div class="form-group input-field">
				<input class="btn btn-default btn-success" id="submit1" type="submit" value="Confirm Order" onclick="myfunction()" name="submit1">
				</div>
				<script type="text/javascript">
					function myfunction(){
						alert("Your order has been confirmed!");
						window.location.href="mobarena.html";
					}
				</script>
				<?php 
					

				 ?>
			</body>
			</html>
