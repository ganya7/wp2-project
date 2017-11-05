<html>
<body  style="background-color: #2E6280 ; color:white">
	<?php
	$model=$_POST['model'];
	$color=$_POST['color'];
	$storage=$_POST['storage'];
	$price=0;
	

	function calculateprice($model,$color,$storage)
	{

		if ($model == "S8") {
			if ($storage== "64GB") 
				$price = 50000;
			else
				$price = 60000;
					} //end model
					else if($model == "S8+"){
						if ($storage == "64GB") 
							$price = 55000;
						else
							$price = 65000;
					}
					else if ($model == "7") {
						if ($storage== "64GB") 
							$price = 60000;
						else
							$price = 70000;
					} //end model
					else if($model == "X"){
						if ($storage == "64GB") 
							$price = 70000;
						else
							$price = 80000;
					}
					else if ($model == "5") {
						if ($storage== "64GB") 
							$price = 30000;
						else
							$price = 35000;
					} //end model
					else if($model == "5T"){
						if ($storage == "64GB") 
							$price = 40000;
						else
							$price = 45000;
					}
					else if ($model=="11") {
						if ($storage== "64GB") 
							$price = 45000;
						else
							$price = 50000;
					} //end model
					else if($model == "Life"){
						if ($storage == "64GB") 
							$price = 50000;
						else
							$price = 55000;
					}
					$gst=$price*0.18;
					$total=$price+$gst;
					echo "<center><table border='1' style='border-color: yellow;'><tr><td>Model</td><td>".$model."</td></tr>
					<tr><td>Color</td><td>".$color."</td></tr>
					<tr><td>Storage</td><td>".$storage."</td></tr>
					<tr><td>Base price</td><td>".$price."</td></tr>
					<tr><td>GST</td><td>".$gst."</td></tr>
					<tr><td>Net amount</td><td>".$total."</td></tr></table>";
					/*echo "<center><table>Model: ".$model."<br><br>";
					echo "Color: ".$color."<br><br>";
					echo "Storage: ".$storage."<br><br>";
					echo "BASE PRICE:  ".$price."<br><br>";
					echo "GST:         ".$gst."<br><br>";
					echo "TOTAL PRICE: ".$total."<br><br>";
					echo "YOUR ORDER IS CONFIRMED</center>";*/
				}
				calculateprice($model,$color,$storage);

				?>
			</body>
			</html>