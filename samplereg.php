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
?>
<?php include('template/header.php'); ?>
	<title>SAMPLE</title> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>

        <form action="samplereg.php" method="post" enctype="multipart/form-data">
<br><br>
            <center>     
			
                            <lable align="right">serial number:</lable>
                            <input type="text" name="sn" required/><br><br>
							<lable align="right">first Name:</lable>
                            <input type="text" name="fname" required/><br><br>
							<lable align="right">mothers name:</lable>
                            <input type="text" name="mname" required/><br><br>
                            <lable align="right">last name:</lable>
                            <input type="text" name="lname" /><br><br> 
							<lable align="right">phone number</lable>
                            <input type="text" name="pn" required/><br> <br>
							<lable align="right">context</lable>
                            <input type="text" name="context" /> 	<br><br>
                           
                           <lable align="right">date</lable>	
                            <input type="date" name="date" required/><br><br>	
<lable align="right">DOCUMENT:</lable>  <br>
<input type="file" name="file"  /><br>

							<lable align="right">Image:</lable>  <br>                          
                            <input type="file" name="image" id="profile-img" /><br>
                                    <img src="" id="profile-img-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function(){
                                            readURL(this);
                                        });
                                    </script><br>
                            <input type="submit" name="sample" value="submit" />
                                     

        </form>
	
<?php 
// establishing the MySQLi connection



 



//Inserting data into table 


    if(isset($_POST['sample']))
    {
		$sn = $_POST['sn'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$pn = $_POST['pn'];
		$context = $_POST['context'];
		$date = $_POST['date'];		
		$image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp,"../uploads/$image");
		
		$file = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        move_uploaded_file($file_tmp,"../uploads/$file");



        $query = "insert into sample (sn,fname,mname,lname,pn,context,date,image,file)values('$sn','$fname','$mname','$lname','$pn','$context','$date','$image','$file')";

        $result = mysqli_query($con, $query);

        if($result==1)
        {       

        echo "<script>alert('A record has been registered!')</script>";
        
        }
        else {       

        echo "<script>alert('insertion failed!')</script>";

             }
    }
?>

	<BR><BR><BR> 	

<?php include('template/footer.php'); ?>
</body> 
</html>