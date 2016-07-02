<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:index.php');	
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultant</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<link href="css/pure-min.css" rel="stylesheet prefetch">
	
	

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
<?php
$con=mysqli_connect("localhost", "root", "", "consult");
$val2 = $_SESSION['username'];
//$val2="rifat@gmail.com";

$sql = "SELECT * FROM login WHERE username='$val2'" ;
$result=mysqli_query($con,$sql);
echo '<h1 class="title">My Profile</h1>';


while($row = mysqli_fetch_assoc($result)) {
	echo '<img src='.$row['image_url'].'.jpg class="center-block" alt="avatar" style="width:140px;height:140px;">';

	$name=$row['first_name'];
	$address=$row['address'];
	$email=$row['username'];
	$pass=$row['pass'];
	
}
	

?>

<form class="form-horizontal" role="form" action="update_profile_pic.php" method="post" enctype="multipart/form-data">
    <br></br>
    <div class="form-group">
	<label class="col-lg-3 control-label">Select a Photo</label>
	<div class="col-lg-8">
	<input type="file" name="fileToUpload" id="fileToUpload">
	</div></div>
	<div class="form-group">
	<label class="col-lg-3 control-label">Click to upload:</label>
	<div class="col-lg-8">
    <input type="submit" value="Upload Image" name="submit"></div></div>
</form>
<form class="form-horizontal" role="form"  data-fv-framework="bootstrap"
    data-fv-icon-valid="glyphicon glyphicon-ok"
    data-fv-icon-invalid="glyphicon glyphicon-remove"
    data-fv-icon-validating="glyphicon glyphicon-refresh" action="update.php" method ="get">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="name" name="name" required  type="text" value =<?php echo $name;?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" id="address" name="address" required type="text" value=<?php echo $address;?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
			<input  name = "email" class="form-control" disabled value=<?php echo $email;?>>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="pass" id="password" required type="password" value=<?php echo $pass;?>>
            </div>
          </div>
			<div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input type="password" class="form-control" id="confirm_password" name="confirmPassword" value=<?php echo $pass;?> required >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
			  <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
          </div>
        </form>
			<script src="pass_match.js"></script>
			</div>
		
<br>
        <?php
        	include 'rightbar_after_login.php';
        ?>
  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src ="js/home.js"></script>  

</body>
</html>