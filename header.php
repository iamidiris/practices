<html>
<body class="color">
<head>
<style>

/* Add a black background color to the top navigation */
.color {
  background-color: #76b852;
}
/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Add an active class to highlight the current page */
.active {
  background-color: BLACK;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
/* Left nav */
.leftnav {
  float: right;
  overflow: hidden;
}

/* leftbtn*/
.leftnav .leftbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}


</style>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">HOME</a>
  


  <a href="aboutus.php">ABOUT US</a>
  <a href="contactus.php">CONTACT US</a>

  

</div>


<script>

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>	

</head>

			</body>
</html>			