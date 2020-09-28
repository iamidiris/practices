<html>
<body>
	<title>SAMPLE</title> 

<?php 
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
 include('template/header.php'); ?>
<center>
<h1>WELCOME</h1>
<h1>SOO DHAWOOW </h1>
</center>




	<BR><BR><BR> 
<?php  include('template/footer.php'); ?>
</body>
</html>