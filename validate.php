<!DOCTYPE html>
<html>
<body>
<?php 

$email=$_POST["email"];
$pass=$_POST["pass"];

 $db=mysqli_connect("localhost","root","","exp7");
    if($db)
    {
      echo "Database connected";
    }
    else
    {
      echo "Connection unsuccessfully";
    }

$sql="select * from wp where EmailID='$email' and Password='$pass';";

$result=mysqli_query($db,$sql);

$num_rows = mysqli_num_rows($result);

//if($row=mysqli_fetch_array($result)!=NULL)
echo "<script>console.log('$num_rows Rows')</script>";
// if($result)
if($num_rows ==0)

{
  ?>
  <br>
  <h2><u>INVALID LOGIN </u></h2><br>
  <h4>Try again</h4>
        <b><u><a href="login.php">Click Here to Login Again</a></u></b> 
  <?php 
  // header("Location: http://localhost/wp2/home.php"); /* Redirect browser */
    //exit();
} 
else
{
  ?>
  <br>
  <h2><u>LOGIN COMPLETE </u></h2><br>

  <?php
     //header("Location: http://localhost/wp2/login.php"); /* Redirect browser */
    //exit();
}

 ?>
 </body>
 </html>
