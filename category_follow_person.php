<?php
// Start the session
session_start();
?>

<?php
	$con=mysqli_connect("localhost", "root", "", "consult");
	$user_name=$_SESSION['username'];//"rifat";
	$c_id= $_GET['c_id'];
	$sql="INSERT INTO category_follow_person (user_name,c_id) VALUES('$user_name','$c_id')";
	if (mysqli_query($con, $sql)) {
			echo "Record updated successfully";
		} 
		else {
			echo "Error updating record: " . mysqli_error($con);
		}
	mysqli_close($con);
?>