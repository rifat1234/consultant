<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:index.php');	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultant</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="jquery.js"></script>
<style>
.intro{
    background-color: lightgray;
	font-family: Arial, Helvetica, sans-serif;
	font-size:25px;
	text-align:center;
}


.cap{
	font-size:20px;
	font-family: Verdana, Helvetica, sans-serif;
	text-align:center;
}

.title{
	font-family: Verdana, Helvetica, sans-serif;
	font-size: 35px;
	color:red;
	
}
</style>

  </head>
  <body>

	<?php
		include 'menubar_after_login.php';
	?>	  
    <div class="container-fluid">
      <div class="row">
      	<?php
      		include 'leftbar.php';
      	?>
        <div class="col-md-6 col-md-offset-2 main">
          <div class=" container-fluid">
			  <ul class=" nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home">My Profile</a></li>
			    <li><a data-toggle="tab" href="#menu1">Followers</a></li>
			    <li><a data-toggle="tab" href="#menu2">Following</a></li>
				<li><a data-toggle="tab" href="#menu3">My Posts</a></li>
			  </ul>
			   <br>
			  <div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
			     	
			      <?php

$con=mysqli_connect("localhost", "root", "", "consult");
$val2 = $_SESSION['username'];
//$val2="rifat@gmail.com";

if(!empty($_GET['id'])){
	$val2=$_GET['id'];
}


$sql = "SELECT * FROM login WHERE username='$val2'" ;
$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) {
	echo '<img src='.$row['image_url'].'.jpg class="center-block" alt="avatar" style="width:140px;height:140px;">';

	echo '<h4 class="cap"><br>Full Name:</h4>';
	echo '<p class="intro">'. $row ['first_name'].' ' .$row['last_name'].'</p>';
	echo '<h4 class="cap" ><br>Address:</h4>';
	echo '<p class="intro">'. $row['address'].'</p>';
	echo '<h4 class="cap"><br>Email Address:</h4>';
	echo '<p class="intro">'.$row['username'].'</p>';
	
}
/*
$sql2 = "SELECT * FROM user_profile WHERE email='$val2'" ;
$result2=mysqli_query($con,$sql2);
while($row2 = mysqli_fetch_assoc($result2)) {
	echo '<h4 class="cap"><br>Total Posts:</h4>';
	echo '<p class="intro">'. $row2 ['posts'].'</p>';
	echo '<h4 class="cap"><br>Total Upvotes:</h4>';
	echo '<p class="intro">'. $row2 ['upvotes'].'</p>';
	echo '<h4 class="cap"><br>Total Comments:</h4>';
	echo '<p class="intro">'. $row2 ['comments'].'</p>';

	}
	*/

if(empty($_GET['id'])){
	echo '<h4 class="cap"><a href="update_profile.php">Edit Profile</a></h4>';

}

?>
			    </div>
			    <div id="menu1" class="tab-pane fade">
			    <?php 
					$sql="SELECT * FROM follow WHERE user_name='$val2'";
					$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {
								echo "<div class =\"row\">";
	          			echo "<div class=\"col-md-3\" >";
						echo "<img src=uploads/".$row["follower"].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
	          			echo "</div>";
	          			echo "<div class=\"col-md-9\" >";
						$tmp=$row["follower"];
						$sql1="SELECT * FROM login WHERE username='$tmp'";
						$result1 = $con->query($sql1);
						$row1 = mysqli_fetch_assoc($result1);
						echo "<p>". $row1["first_name"]." ".$row1["last_name"]."<p>";
						echo "<p>". $row["follower"]."<p>";
	          			echo "</div>";
	          			echo "</div>";	
						echo "<hr></hr>";
							}
						}
						mysqli_close($con);
				?>
				</div>
			    <div id="menu2" class="tab-pane fade">
			      <?php 
				  $con=mysqli_connect("localhost", "root", "", "consult");

					$sql="SELECT * FROM follow WHERE follower='$val2'";
					$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {
								echo "<div class =\"row\">";
	          			echo "<div class=\"col-md-3\" >";
						echo "<img src=uploads/".$row["user_name"].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
	          			echo "</div>";
	          			echo "<div class=\"col-md-9\" >";
						$tmp=$row["user_name"];
						$sql1="SELECT * FROM login WHERE username='$tmp'";
						$result1 = $con->query($sql1);
						$row1 = mysqli_fetch_assoc($result1);
						echo "<p>". $row1["first_name"]." ".$row1["last_name"]."<p>";
						echo "<p>". $row["user_name"]."<p>";
	          			echo "</div>";
	          			echo "</div>";	
						echo "<hr></hr>";
							}
						}
						mysqli_close($con);
					?>
			    </div>
				
				<div id="menu3" class="tab-pane fade">
				<h2><a href="my_articles.php">Click here to see your articles</a></h2>
				<br><br>
				<h2><a href="my_questions.php">Click here to see your questions</a></h2>

			</div>
			 
			  </div>
			</div>
			
			


        </div>
					   
        <br>
        <?php
        	include 'rightbar_after_login.php';
        ?>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src ="js/home.js"></script>
  </body>
</html>