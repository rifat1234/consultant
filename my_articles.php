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

<?php 
                        $con=mysqli_connect("localhost", "root", "", "consult");
						$email=$_SESSION["username"];
						$sql="SELECT * FROM article WHERE username='$email' ORDER BY art_id DESC";
						$count=0;
						$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {
							echo "<div class = \"jumbotron\"> ";
								$count=$count+1;
						        echo "<h3>Title : ". $row["title"]."</h3>";
						        //echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["art_id"].">";
								$link="article.php?q=".$row["art_id"];
								$string = strip_tags($row["article"]);

								if (strlen($string) > 50) {
								$stringCut = substr($string, 0, 50);
								$string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href=".$link.">Read More</a>"; 
								}
						        echo "<p class=\"text-left\">".$string."</p>";
						        echo "<hr>";
						        echo "<div class = \"row\">";
								echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
								echo "<hr>";
								echo "</div>";
						        echo "</div>";
							}
						}
						echo "<h2>Your Total Articles: ".$count."</h2>";
						
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