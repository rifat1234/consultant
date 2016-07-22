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
	<link href="css/index.css" rel="stylesheet">

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
	    <ul class="nav navbar-nav navbar-right ">
	      <li><a href="upload.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav>
	  
    <div class="container-fluid">
      <div class="row">
      	
      	<!---code of the leftbar(followed & trending topics)-->
      	<?php
      		include 'leftbar.php';
      		include 'main_QA.php';
        	include 'rightbar_index.php';
        ?>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>