<?php
// Start the session
session_start();


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
		<div class="jumbotron">
		<h2>Contact us</h2>
		<p>Average contact us page</p>
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