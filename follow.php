<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:index.php');	
}

?>

<?php
	$con=mysqli_connect("localhost", "root", "", "consult");
	$person=$_GET['user'];//"rifat";
	$follower= $_SESSION["username"];//$_GET['fol'];//"tamim";
	//$person=$_SESSION["username"];
	$sql="INSERT INTO follow (user_name,follower) VALUES('$person','$follower')";
	if (mysqli_query($con, $sql)) {
			echo "Record updated successfully";
		} 
		else {
			echo "Error updating record: " . mysqli_error($con);
		}
	mysqli_close($con);
?>