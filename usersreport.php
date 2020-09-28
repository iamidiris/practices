<!DOCTYPE html> 
<html>
<?php 
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
include('dbconfig.php');
include('template/header.php');

 ?>

	<head>
		<title>SAMPLE</title> 
	</head>	
	
	<BR><BR>
	 <title>Search</title>


<center> <form name="form" class="right" action="search1.php" method="get">
 <input  type="text" name="keywords" autocomplete="off" placeholder="search" autofocus /> 
  <input type="submit" name="Submit"  value="Search"  /> </center>
</form><br>

	<?php 
// establishing the MySQLi connection


  
  
// getting regyearone form the table 

	
	
	echo "<table width='100%' border='1' bgcolor=white>
			<tr align='center'>
				<th>USER NAME:</th>
				<th>PASSWORD:</th>
				<th>EMAIL:</th>
				<th>PHONE:</th>
				<th>TYPE:</th>
				<th>DELETE:</th>
				<th>EDIT:</th>
				<th>SELECT:</th>
			</tr>	
	";
	
	$sel_sample = "select * from users order by 1 DESC";
	
	$run_sample = mysqli_query($con, $sel_sample); 
	
	while($row=mysqli_fetch_array($run_sample)){
		$id = $row['id'];
		$username = $row['username'];
		$password = $row['password'];
		$email = $row['email'];
		$phone = $row['phone'];
		$type = $row['type'];
	
	echo "
			<tr align='center'>
				<td>$username</td>
				<td>$password</td>
				<td>$email</td>
				<td>$phone</td>
				<td>$type</td>
				<td><a href='usersreport.php?del=$id'>Delete</a></td>
				<td><a href='usersreport.php?edit=$id'>Edit</a></td>
				<td><a href='usersreport.php?select=$id'>Select</a></td>
			</tr>
	
	";
	}
	echo "</table>";
	
	
//deleting a repbaone from the table 

	if(isset($_GET['del'])){
		
		$del_id = $_GET['del'];
		
		$delete_sample = "delete from users where id='$del_id'";
		
		$run_delete = mysqli_query($con, $delete_sample); 
		
		if($run_delete){
			
			echo "<script>alert('A sample has been deleted!')</script>";
			echo "<script>window.open('usersreport.php?view','_self')</script>";
		}
	
	
	}
	
	

if(isset($_GET['select'])){

	$select_id = $_GET['select'];
	
	$get_sample = "select * from users where id='$select_id'";
	
	$run_sample = mysqli_query($con, $get_sample); 
	
	$row_sample = mysqli_fetch_array($run_sample);
	
		$id = $row_sample['id'];
		$username = $row_sample['username'];
		$password = $row_sample['password'];
		$email = $row_sample['email'];
		$phone = $row_sample['phone'];
		$type = $row_sample['type'];
		
		echo "
<center>		<td><a href='../uploads/".$row_sample['image']."' target='_blank'><img src='../uploads/".$row_sample['image']."' height=100px width=100px border=1 green solid ></a></td><br>
	<h3>username : 	<td>$username</td> </h3>  
			<h3> password :	<td>$password</td>  </h3>
			<h3> email :	<td>$email</td> </h3> 
			<h3> phone :	<td>$phone</td> </h3> 
			<h3> type :	<td>$type</td>  </h3>     </center>
				
			
		
		";
}	
	
	

	
//Script for Editing the baone

if(isset($_GET['edit'])){

	$edit_id = $_GET['edit'];
	
	$get_sample = "select * from users where id='$edit_id'";
	
	$run_sample = mysqli_query($con, $get_sample); 
	
	$row_sample = mysqli_fetch_array($run_sample);
		$id = $row_sample['id'];
		$username = $row_sample['username'];
		$password = $row_sample['password'];
		$email = $row_sample['email'];
		$phone = $row_sample['phone'];
		$type = $row_sample['type'];

		
		echo "
		<form method='post' action=''>
<center>		    <b>id:</b><input type='text' name='id' value='$id'/><br>
			<b>user name:</b><input type='text' name='username' value='$username'/><br>
			<b>password:</b><input type='text' name='password' value='$password'/> <br>
		    <b>email:</b><input type='text' name='email' value='$email'/> <br>
		    <b>phone:</b><input type='text' name='phone' value='$phone'/> <br>
		    <b>type:</b><input type='text' name='type' value='$type'/> <br>
			<input type='submit' name='update' value='Update'/> </center><br>
		
		
		</form>
		
		
		
		";
}
//Updating data code
	if(isset($_POST['update']))
	{
		$update_id = $id;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$type = $_POST['type'];
			
			$update_sample = "update users set username='$username',password='$password',email='$email',id='$id',phone='$phone',type='$type' where id='$update_id'";
			
			$run_update = mysqli_query($con,$update_sample);
			
			if($run_update)
			{
			echo "<script>alert('A record has been Updated!')</script>";
			echo "<script>window.open('usersreport.php?view','_self')</script>";	
			}
	}
?>
	<BR><BR><BR>  	<BR><BR><BR>   
<?php include('template/footer.php'); ?>
</body> 
</html>
