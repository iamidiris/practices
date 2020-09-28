<html>
<body><?php
include ("template/header.php");
include ("dbconfig.php");

if(isset($_POST['send']))
{
$email=$_POST['email'];

$row1=mysqli_query($con,"select email,password from users where email='$email'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}


?>
<br><br><center>
<form name="login" action="" method="post">
								<input type="text" class="text" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
									
										<div class="submit three">
											<input type="submit" name="send" onClick="myFunction()" value="Send Email" >
										</div>
									</form></center>
<?php include ("template/footer.php");  ?>
</body>
</html>									