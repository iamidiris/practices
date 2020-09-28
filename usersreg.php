<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
 include ("template/header.php"); ?>
<html>
<body>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 2% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}


</style>
<?php
include('dbconfig.php');
if(isset($_POST['signup']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$type=$_POST['type'];
	$enc_password=$password;

$msg=mysqli_query($con,"insert into users(username,email,password,phone,type) values('$username','$email','$enc_password','$phone','$type')");
if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
 else{
	 echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
}
}
?>


<div class="login-page">
					<div class="form">
					
					
							<form name="registration" class="login-form" method="post" action="" enctype="multipart/form-data">
								<label>User Name </label>
								<input type="text"  value=""  name="username" required >
								<label>Email Address </label>
								<input type="text" value="" name="email"  >
								<label>Password </label>
								<input type="password" value="" name="password" required>
										<label>Phone No. </label>
								<input type="text" value="" name="phone"  required>
								<label>ROLE. </label>
								<select id="type" name="type" required>
                                       <option></option>
                                        <option>user</option>
                                         <option>admin</option>
                                                </select><br><br>
								<div>
									
									<button input type="submit" name="signup"  value="Sign Up">SIGN UP</button>
								<br><br>
									<button input type="reset" value="Reset"> RESET </button> 
									<div > </div>
								</div>
							</form>

					</div>
					</div>


</body>
</html>