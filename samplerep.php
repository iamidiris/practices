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


<center> <form name="form" class="right" action="search.php" method="get">
 <input  type="text" name="keywords" autocomplete="off" placeholder="search" autofocus /> 
  <input type="submit" name="Submit"  value="Search"  /> </center>
</form><br>

	<?php 
// establishing the MySQLi connection


  
  
// getting regyearone form the table 

	
	
	echo "<table width='100%' border='1' bgcolor=white>
			<tr align='center'>
				<th>Serial Number:</th>
				<th>First Name:</th>
				<th>Mothers Name:</th>
				<th>Last Name:</th>
				<th>Phone Number:</th>
				<th>Context:</th>
				<th>Date:</th>
				<th>IMAGE:</th>
				<th>DOCUMENT:</th>
				<th>DELETE:</th>
				<th>EDIT:</th>
				<th>SELECT:</th>
			</tr>	
	";
	
	$sel_sample = "select * from sample order by 1 DESC";
	
	$run_sample = mysqli_query($con, $sel_sample); 
	
	while($row=mysqli_fetch_array($run_sample)){
		$id = $row['id'];
		$sn = $row['sn'];
		$fname = $row['fname'];
		$mname = $row['mname'];
		$lname = $row['lname'];
		$pn = $row['pn'];
		$context = $row['context'];
		$date = $row['date'];
		$file = $row['file'];
		$image = $row['image'];
	
	echo "
			<tr align='center'>
				<td>$sn</td>
				<td>$fname</td>
				<td>$mname</td>
				<td>$lname</td>
				<td>$pn</td>
				<td>$context</td>
				<td>$date</td>
				<td><a href='../uploads/".$row['image']."' target='_blank'><img src='../uploads/".$row['image']."' height=50px width=50px border=1 green solid ></a></td>
				<td><a href='../uploads/".$row['file']."' target='_blank'>view file</a></td>
				<td><a href='samplerep.php?del=$id'>Delete</a></td>
				<td><a href='samplerep.php?edit=$id'>Edit</a></td>
				<td><a href='samplerep.php?select=$id'>Select</a></td>
			</tr>
	
	";
	}
	echo "</table>";
	
	
//deleting a repbaone from the table 

	if(isset($_GET['del'])){
		
		$del_id = $_GET['del'];
		
		$delete_sample = "delete from sample where id='$del_id'";
		
		$run_delete = mysqli_query($con, $delete_sample); 
		
		if($run_delete){
			
			echo "<script>alert('A sample has been deleted!')</script>";
			echo "<script>window.open('samplerep.php?view','_self')</script>";
		}
	
	
	}
	
	

if(isset($_GET['select'])){

	$select_id = $_GET['select'];
	
	$get_sample = "select * from sample where id='$select_id'";
	
	$run_sample = mysqli_query($con, $get_sample); 
	
	$row_sample = mysqli_fetch_array($run_sample);
	
		$id = $row_sample['id'];
		$sn = $row_sample['sn'];
		$fname = $row_sample['fname'];
		$mname = $row_sample['mname'];
		$lname = $row_sample['lname'];
		$pn = $row_sample['pn'];
		$context = $row_sample['context'];
		$date = $row_sample['date'];
		$image = $row_sample['image'];
		$file = $row_sample['file'];
		
		echo "
<center>		<td><a href='../uploads/".$row_sample['image']."' target='_blank'><img src='../uploads/".$row_sample['image']."' height=100px width=100px border=1 green solid ></a></td><br>
	<h3>serial number : 	<td>$sn</td> </h3>  
			<h3> first name :	<td>$fname</td>  </h3>
			<h3> mothers name :	<td>$mname</td> </h3> 
			<h3> fathers name :	<td>$fname</td> </h3> 
			<h3> phone number :	<td>$pn</td>  </h3> 
			<h3> context :	<td>$context</td>  </h3> 
			<h3> Date :	<td>$date</td>  </h3> 
			<h3> file :	<td><a href='../uploads/".$row_sample['file']."' target='_blank'>view file</a></td>  </h3>    </center>
				
			
		
		";
}	
	
	

	
//Script for Editing the baone

if(isset($_GET['edit'])){

	$edit_id = $_GET['edit'];
	
	$get_sample = "select * from sample where id='$edit_id'";
	
	$run_sample = mysqli_query($con, $get_sample); 
	
	$row_sample = mysqli_fetch_array($run_sample);
		$id = $row_sample['id'];
		$sn = $row_sample['sn'];
		$fname = $row_sample['fname'];
		$mname = $row_sample['mname'];
		$lname = $row_sample['lname'];
		$pn = $row_sample['pn'];
		$context = $row_sample['context'];
		$date = $row_sample['date'];

		
		echo "
		<form method='post' action=''>
<center>		    <b>id:</b><input type='text' name='id' value='$id'/><br>
			<b>serial number:</b><input type='text' name='sn' value='$sn'/><br>
			<b>first name:</b><input type='text' name='fname' value='$fname'/> <br>
		    <b>mother name:</b><input type='text' name='mname' value='$mname'/> <br>
		    <b>last name:</b><input type='text' name='lname' value='$lname'/> <br>
		    <b>phone number:</b><input type='text' name='pn' value='$pn'/> <br>
			<b>Context:</b><input type='text' name='context' value='$context'/> <br>
			<b>Date:</b><input type='date' name='date' value='$date'/> <br>
			<input type='submit' name='update' value='Update'/> </center><br>
		
		
		</form>
		
		
		
		";
}
//Updating data code
	if(isset($_POST['update']))
	{
		$update_id = $id;
		$sn = $_POST['sn'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$pn = $_POST['pn'];
		$context = $_POST['context'];
		$date = $_POST['date'];		
			
			$update_sample = "update sample set fname='$fname',mname='$mname',sn='$sn',id='$id',pn='$pn',lname='$lname',context='$context',date='$date' where id='$update_id'";
			
			$run_update = mysqli_query($con,$update_sample);
			
			if($run_update)
			{
			echo "<script>alert('A record has been Updated!')</script>";
			echo "<script>window.open('samplerep.php?view','_self')</script>";	
			}
	}
?>
	<BR><BR><BR>  	<BR><BR><BR>   
<?php include('template/footer.php'); ?>
</body> 
</html>
