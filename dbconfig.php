 <?php  
 
 $con = mysqli_connect("localhost","root","","sample"); 
if (mysqli_connect_errno())
  {
  echo "MySQLi Connection was not established: " . mysqli_connect_error();
  }
 ?>