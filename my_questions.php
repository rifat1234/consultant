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
	<link href="css/home.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      	<?php
      		include 'leftbar.php';
      	?>
        
        <div class="col-md-6 col-md-offset-2 main">
          <div class=" container-fluid">

<?php 
                      $con=mysqli_connect("localhost", "root", "", "consult");
				      	//fetch question
						$count=0;
						$name=$_SESSION["username"];
						$sql = "SELECT  * FROM question WHERE username='$name' ORDER BY q_id DESC" ;
				      	$result = $con->query($sql);
						
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
								$count=$count+1;
								$valu = $row['username'];
								//fetch questioner of question
								$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
								$result2=$con->query($sql2);
								echo "<div class = \"jumbotron\" style=\"background-color:#e6ffe6;\"> ";
								if(mysqli_num_rows($result2) > 0){
									while($row2 = mysqli_fetch_assoc($result2)){
													$valu = $row2['image_url'].".jpg";
												
													//echo "<h3>".$valu."</h3>";
													echo "<div class=\"row\">";
													echo "<img class = \"col-md-4 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:80px;height:50px;\" >";
													echo "<p class = \"col-md-6\" >".$row2['first_name']." ".$row2['last_name']."</p>";
													echo "</div><hr>";
									}
								}    
								//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
						        
						        echo "<h2>". $row["question"]."</h2><hr>";
						        echo "<div class = \"row\">";
								//echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
								echo "<button class=\"glyphicon glyphicon-pencil ans\"> Answer </button>";
								echo "</div><hr>";
								
								echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["q_id"].">";
								//fetch answer
								$sql1 = "SELECT  * FROM answer WHERE q_id=".$row['q_id'];
								$result1 = $con->query($sql1);
								if(mysqli_num_rows($result1) > 0){
									while($row1 = mysqli_fetch_assoc($result1)){
										$valu = $row1['username'];
										//fetch answerer of question
										$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
										$result2=$con->query($sql2);
										if(mysqli_num_rows($result2) > 0){
											while($row2 = mysqli_fetch_assoc($result2)){
												$valu = $row2['image_url'].".jpg";
											
												//echo "<h3>".$valu."</h3>";
												echo "<div class=\"row\">";
												echo "<img class = \"col-md-4 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:80px;height:50px;\" >";
												echo "<p class = \"col-md-6\" >".$row2['first_name']." ".$row2['last_name']."</p>";
												echo "</div><hr>";
											}
										}
										//echo "<h3>".$row1['username']."</h3>";
										echo "<p>".$row1['answer']."</p>";
										echo "<hr>";
										echo "<div class = \"row\">";
										echo "<button class=\"glyphicon glyphicon-thumbs-up upv\"> Upvote </button>";
										//echo "<button class=\"glyphicon glyphicon-pencil\"> Answer </button>";
										echo "</div><hr>";
								 }
								}
								
						        echo "</div><hr>";
						    }
						} 
						mysqli_close($con);

						echo "<h2>Your Total Questions: ".$count."</h2>";
						
						?>
						
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