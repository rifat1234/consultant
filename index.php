<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]=="ok"){

	header('Location:home.php');	
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
	  <link href="css/index.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

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
        <a class="navbar-brand" href="index.php" style="color:#800000;font-size: 30px;margin-right:54px;">Consultant</a>
      </div>
	    <ul class="nav navbar-nav" >
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
         <li ><div style="display:block;"><input type="text" class="form-control input-lg " placeholder="Search Consultant " style="height:30px;width:580px;margin:10px;padding:7px;" /></div></li>
        
      </ul>
	    <ul class="nav navbar-nav navbar-right ">  
	      <li><a href="upload.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	       <li><a type="button" data-toggle="modal" href="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
	    </ul>
	  </div>
	</nav>
    <div class="container-fluid">
      <div class="row">
      	<!---code of the leftbar(followed & trending topics)-->
      	<?php
      		include 'leftbar.php';
      		include 'main_index.php';
        	include 'rightbar_index.php';
          //<a href="#head"><img src="http://placehold.it/200x100" id="fixedbutton"></a>
        ?>
        <button type="button" id="fixedbutton" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-plus"></i></button>
        

        <!--login pop up starts-->
       <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Login to Your Account</h1>
          <br>
          <form action="signin.php" method ="get">
          <input type="email" id="email" name ="email"  placeholder="Email address" required="" autofocus="">
          <input type="password" id="pass" name="pass"  placeholder="Password" required="" autofocus="">
          <input type="submit" name="login" class="login loginmodal-submit" value="Login">
          </form>
          
          <div class="login-help">
          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" style="float: right;" >Close</button>
          <a href="upload.html">Register</a> - <a href="#">Forgot Password</a>
          </div>
        </div>
      </div>
      </div>
      <!--login popup ends -->

      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>