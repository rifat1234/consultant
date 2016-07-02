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

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php" style="color:#800000;font-size: 30px;">Consultant</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li><a href="question.html">Ask a Question</a></li>
	      <li><a href="be_a_consultant.php">Be a Consultant</a></li>
	      <li><a href="top_consult.php">Top Consultants</a></li>
		  <li><a href="contact.php">Contact Us</a></li>

	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="view_profile.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
	      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
	    </ul>
	  </div>
	</nav>
	  
    <div class="container-fluid">
      <div class="row">
      	<div class = "leftbar">
        <div class="col-md-2 sidebar">
          <h4>Feeds</h4><hr>
          
          <ul class="nav-sidebar">
          	
            <li><a href="">Top Catagory 1</a></li>
            <li><a href="">Top Catagory 2</a></li>
            <li><a href="">Top Catagory 3</a></li>
            <li><a href="">Top Catagory 4</a></li>
            <li><a href="">Top Catagory 5</a></li>
          	
          </ul>
          <h4>Trending</h4><hr>
          
          <ul class=" nav-sidebar">
          	
            <li><a href="">Trending Catagory 1</a></li>
            <li><a href="">Trending Catagory 2</a></li>
            <li><a href="">Trending Catagory 3</a></li>
            <li><a href="">Trending Catagory 4</a></li>
            <li><a href="">Trending Catagory 5</a></li>
          	
          </ul>
         
        </div>
        </div>
        <div class="col-md-6 col-md-offset-2 main">
			<div class=" container-fluid">
			 <?php 
			 if(!empty($_GET['q']))
				{
					$q=$_GET['q'];
				$con=mysqli_connect("localhost", "root", "", "consult");
					$sql = "SELECT  * FROM article WHERE art_id='$q'" ;
					$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
						        echo "<div class = \"jumbotron\"> ";
						        echo "<h3><i><strong>". $row["title"]."</strong></i></h3>";
						        //echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["art_id"].">";
						        echo "<p class=\"text-left\">".$row["article"]."</p>";
						        echo "<div class = \"row\">";
								echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
						        echo "<hr>";
								echo "</div>";
						        echo "</div>";
						    }
						} 
						mysqli_close($con);
				}
			?>
			</div>
        </div>
        <br>
        <div class = "rightbar">
	        <div class="col-md-3 ">
	        	<ul class = "nav-sidebar">
	          		<h4>Consultants </h4>
	          		<hr>
	          		<?php
				      	$con=mysqli_connect("localhost", "root", "", "consult");
				      	$sql = "SELECT  * FROM login WHERE 1" ;

						$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
							$cnt = 3;
						    while(($row = mysqli_fetch_assoc($result)) && $cnt>0) {
								
								if($row['username']==$_SESSION['username'])continue;
								
								$val1=$_SESSION['username'];
								$val2 = $row['username'];
								
							 $sql1 = "SELECT  * FROM follow WHERE user_name='$val2' AND follower = '$val1'";
							 $result1 = $con->query($sql1);
							
							 if(mysqli_num_rows($result1)>0)continue;
							  $cnt=$cnt-1;
						      echo "<div class = fol>";
							  echo "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['username']. ">";
							  echo "<li><div class =\"row\"><div class=\"col-md-3\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
							  echo "</div>
	          			<div class=\"col-md-9\" >
	          				<p><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"glyphicon glyphicon-plus fol_but\"> Follow </button>
	          			</div>
	          			</div></li></div>";
						    }
						} 
						mysqli_close($con);

			      ?>

	          	</ul>
	          	<br>
	          	<ul class = "nav-sidebar">
	          		<h4>Topics </h4>
	          		<hr>
	          		<li>
	          			<div class ="row">
	          			<div class="col-md-3" >
	          				<img src="images/pro_pic.jpg" alt="The Mountain Himself" style ="width:50px;height:60px">
	          			</div>
	          			<div class="col-md-9" >
	          				<p><a href ="#">Topic</a></p>
	          				<button class="glyphicon glyphicon-plus"> Follow </button>
	          			</div>
	          			</div>
	          		</li>


	          		<li>
	          			<div class ="row">
	          			<div class="col-md-3" >
	          				<img src="images/pro_pic.jpg" alt="The Mountain Himself" style ="width:50px;height:60px">
	          			</div>
	          			<div class="col-md-9" >
	          				<p><a href ="#">Topic</a></p>
	          				<button class="glyphicon glyphicon-plus"> Follow </button>
	          			</div>
	          			</div>
	          		</li>
	          			<li>
	          			<div class ="row">
	          			<div class="col-md-3" >
	          				<img src="images/pro_pic.jpg" alt="The Mountain Himself" style ="width:50px;height:60px">
	          			</div>
	          			<div class="col-md-9" >
	          				<p><a href ="#">Topic</a></p>
	          				<button class="glyphicon glyphicon-plus"> Follow </button>
	          			</div>
	          			</div>
	          		</li>

	          	</ul>
	        </div>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src ="js/home.js"></script>
  </body>
</html>