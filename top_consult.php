<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:signin.php');	
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
			  <h2>Top Consultants</h2>
			  <?php
				      	$con=mysqli_connect("localhost", "root", "", "consult");
						$sql = "SELECT  * FROM login";
						$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {
								$email=$row["username"];
							$sq="SELECT * FROM follow WHERE user_name='$email'";
							$count=0;
							$check=0;
							$res=$con->query($sq);
							if(mysqli_num_rows($res)>0){
								while($r=mysqli_fetch_assoc($res)){
									$count=$count+1;
								}
							}
						echo "<div class =\"row\">";
	          			echo "<div class=\"col-md-3\" >";
						echo "<img src=".$row["image_url"].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
	          			echo "</div>";
	          			echo "<div class=\"col-md-9\" >";
						echo "<p><strong>". $row["first_name"]." ".$row["last_name"]."</strong><br> <i><small>Total Followers: ".$count."</i></small><p>";
	          			echo "</div>";
	          			echo "</div>";	
						echo "<hr></hr>";
						    }
						} 
						mysqli_close($con);
					?>
			</div>

        </div>
        <br>
        <?php
        	include "rightbar_after_login.php";
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